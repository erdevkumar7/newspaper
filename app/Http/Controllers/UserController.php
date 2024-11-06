<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function indexPage()
    {
        $allbanner = DB::table('banners')
            ->orderBy("updated_at", "desc")
            ->get();

        return view('user.index', compact('allbanner'));
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerSubmit(Request $request)
    {
        $validateData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'address' => 'required|string|max:100',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|numeric',

            'billing_name' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'billing_address' => 'required|string|max:100',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip_code' => 'required|numeric',

            'email' => 'required|string|email:rfc,dns|max:150|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.regex' => 'Name field must contain only letters and spaces',
            'billing_name.regex' => 'Name field must contain only letters and spaces',
        ]);

        $validateData['original_password'] = $validateData['password'];
        $validateData['password'] = Hash::make($validateData['password']);
        $user = User::create($validateData);

        if ($user) {
            return redirect()->route('user.login')->with('success', 'Registration Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add User. Please try again.');
        }
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
