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
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function register()
    {
        $jsonPath = public_path('jnv_schools.json');
        $jnvSchools = json_decode(File::get($jsonPath), true);

        return view('user.register', compact('jnvSchools'));
    }


    public function registerSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => [
                'required',
                'string',
                'min:3',
                'max:30',
                'regex:/^[\pL\s]+$/u',
            ],
            'last_name' => [
                'required',
                'string',
                'min:3',
                'max:30',
                'regex:/^[\pL\s]+$/u',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:70',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                function ($attribute, $value, $fail) {
                    $invalidDomains = ['abc.com', 'example.com', 'test.com'];
                    $domain = substr(strrchr($value, "@"), 1);
                    if (in_array($domain, $invalidDomains)) {
                        $fail("The $attribute domain is not allowed.");
                    }
                }
            ],
            'phone_number' => [
                'required',
                'regex:/^(?!.*(\d)\1{5})[6-9]\d{9}$/',
                'unique:users,phone_number',
            ],
            'city' => 'required|string|max:30',
            'gender' => 'required',
            'state' => 'required|string',
            'contribute' => 'required|string',
            't_shirt' => 'required|string',
            'district' => 'required|string',
            'passout_batch' => 'required|string',
            'profession' => 'required|string|max:25',
            'password' => 'required|string|min:6',
        ], [
            'first_name.regex' => 'Name field must contain only letters and spaces',
            'last_name.regex' => 'Name field must contain only letters and spaces',
            'phone_number.regex' => 'The Contact number must be a valid number.',
            'phone_number.unique' => 'The Contact number is already in use.',

            'email.regex' => 'The email address format is invalid.',
            'email.unique' => 'This email address is already registered.',
            'email.email' => 'The email address must be valid.',
            'email.custom' => 'The email domain is not allowed.',
            't_shirt.required' => 'Please select T-Shirt options'

        ]);

        try {
            // Hash the password and add it to the validated data
            $validatedData['original_password'] = $validatedData['password'];
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Create the user
            $user = User::create($validatedData);
            $url = route('organizer.showUserProfile', ['user_id' => $user->id]);

            // Generate the QR code
            $qrCodeImage = time() . '_' . $user->id . '_qrcode.svg';
            $svgPath  = public_path('qrcodes/' . $qrCodeImage);

            QrCode::size(250)
                ->margin(5)
                ->generate($url, $svgPath);
            // Convert the SVG to JPG
            $jpgFileName = time() . '_' . $user->id . '_qrcode.jpg';
            $jpgPath = public_path('qrcodes/' . $jpgFileName);

            $imagick = new \Imagick();
            $imagick->readImage($svgPath);
            $imagick->setImageFormat('jpeg');
            $imagick->writeImage($jpgPath);

            // Save the QR code image path in the user table
            $user->qr_code_image = $jpgFileName;
            $user->save();
            // Optionally, delete the temporary SVG file
            unlink($svgPath);
            // Log in the user
            Auth::login($user);

            return redirect()->route('user.viewQR')->with('success', 'Your Registration Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }

    public function viewQR()
    {
        $user = User::find(auth()->user()->id);
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

    public function downloadQRCode($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }

        $qrCodePath = public_path('qrcodes/' . $user->qr_code_image);

        // Check if the file exists
        if (file_exists($qrCodePath)) {
            return response()->download($qrCodePath, $user->first_name . '_QRCode.jpg', [
                'Content-Type' => 'image/jpeg',
            ]);
        }

        return redirect()->back()->with('error', 'QR Code not found.');
    }


    public function login()
    {
        return view('user.login');
    }

    public function loginSubmit(Request $request)
    {
        // Validate input
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'phone_number' => 'required|regex:/^[6-9]\d{9}$/', // Validate phone number format
        ], [
            'phone_number.regex' => 'The Contact number must be a valid mobile number.',
        ]);

        // Check if the user exists and matches the given phone number
        $user = User::where('email', $request->email)
            ->where('phone_number', $request->phone_number)
            ->first();

        if ($user && Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.viewQR')->with('success', 'Logged in successfully!'); // Redirect to the user dashboard
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records!',
        ])->withInput();
    }


    public function dashboard()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }
        return view('user.dashboard', compact('user'));
    }

    public function showEditUser()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }
        $jsonPath = public_path('jnv_schools.json');
        $jnvSchools = json_decode(File::get($jsonPath), true);

        return view('user.edit-details', compact('user', 'jnvSchools'));
    }

    public function updateUser(Request $request)
    {
        $user = User::find(auth()->id()); // Use auth()->id() to get the currently authenticated user ID
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

        // Validate request data
        $validatedData = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:30',
                'regex:/^[\pL\s]+$/u', // Allows letters and spaces
            ],
            'last_name' => [
                'required',
                'string',
                'max:30',
                'regex:/^[\pL\s]+$/u',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:70',
                Rule::unique('users')->ignore($user->id), // Ignore current user's email for uniqueness check
            ],
            'phone_number' => [
                'required',
                'regex:/^[6-9]\d{9}$/', // Validate phone number format
                Rule::unique('users', 'phone_number')->ignore($user->id), // Ignore current user's phone number
            ],
            'city' => 'required|string|max:30',
            'gender' => 'required|string',
            'state' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'passout_batch' => 'required|string|max:10',
            'profession' => 'required|string|max:25',
        ], [
            'first_name.regex' => 'The first name must contain only letters and spaces.',
            'last_name.regex' => 'The last name must contain only letters and spaces.',
            'phone_number.regex' => 'The phone number must be a valid 10-digit number.',
            'phone_number.unique' => 'The phone number is already in use.',
        ]);

        try {
            // Update user details
            $user->update($validatedData);

            return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            // Handle errors during update
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
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
