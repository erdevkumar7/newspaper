<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }


    public function registerSubmit(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:30',
                'regex:/^[\pL\s]+$/u',
            ],
            'last_name' => [
                'required',
                'string',
                'max:30',
                'regex:/^[\pL\s]+$/u',
            ],
            'email' => 'required|string|email:rfc,dns|max:70|unique:users',
            'phone_number' => [
                'required',
                'regex:/^[6-9]\d{9}$/',
            ],
            'city' => 'required|string',
            'gender' => 'required',
            'state' => 'required|string',
            'district' => 'required|string',
            'passout_batch' => 'required|string',
            'profession' => 'required|string',
            'profession_specification' => 'nullable|string|max:100',
            'password' => 'required|string|min:6',
        ], [
            'first_name.regex' => 'Name field must contain only letters and spaces',
            'last_name.regex' => 'Name field must contain only letters and spaces',
            'phone_number.regex' => 'The Contact number must be a valid number.',
        ]);

        try {
            // Hash the password and add it to the validated data
            $validatedData['original_password'] = $validatedData['password'];
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Create the user
            $user = User::create($validatedData);
            $url = route('user.profile', ['user_id' => $user->id]);

            // Generate the QR code
            $qrCodeImage = time() . '_' . $user->id . '_qrcode.svg';
            $qrCodeFileName = 'qrcodes/' . $qrCodeImage;
            QrCode::size(250)->generate($url, public_path($qrCodeFileName));

            // Save the QR code image path in the user table
            $user->qr_code_image = $qrCodeImage;
            $user->save();

            return redirect()->route('user.viewQR', $user->id)->with('sucess', 'Your Registration Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }

    public function viewQR($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }
        return view('user.view-qr', compact('user'));
    }

    public function showProfile($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }
        return view('user.profile', compact('user'));
    }


    public function login()
    {
        return view('user.login');
    }

    public function loginSubmit(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credential)) { // Using 'web' guard for users
            return redirect()->route('user.dashboard'); // Redirect to the user dashboard
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function dashboard()
    {
        $page = Page::where('title', 'Home')->first();
        return view('user.dashboard', compact('page'));
    }

    public function showForgotPasswordForm()
    {
        return view('user.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email')
        );
        // 
        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('user.login')->with('success', 'A reset link has been sent to your email')
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('user.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->original_password = $password;
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login')->with('success', 'Logged out successfully!');
    }
}
