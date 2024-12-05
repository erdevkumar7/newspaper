<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:70',
                'regex:/^[\pL\s]+$/u',
            ],
            'email' => 'required|string|email:rfc,dns|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.regex' => 'Name field must contain only letters and spaces',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Registration Successfully!');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin.dashboard');
        }
        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function dashboard()
    {
        $totalUsers = DB::table('users')->count();
        $totalOrgamizers = DB::table('organizers')->count();

        $state = 'Madhya Pradesh';

        // District-wise user count
        $districtStats = User::select('district', DB::raw('COUNT(*) as user_count'))
            ->where('state', $state)
            ->groupBy('district')
            ->orderBy('user_count', 'desc')
            ->get();

        // Total users in Madhya Pradesh
        $totalMPUsers = User::where('state', $state)->count();

        return view('admin.dashboard', compact('totalUsers', 'totalOrgamizers', 'districtStats', 'totalMPUsers'));
    }

    public function allUser()
    {
        $allusers = DB::table('users')->orderBy('created_at', 'desc')->get();
        return view('admin-user-manage.all-user', compact('allusers'));
    }

    public function jnvWiseUser($jnv_name)
    {
        $allusers = DB::table('users')
            ->where('district', $jnv_name)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin-user-manage.jnv-wise-user', compact('allusers', 'jnv_name'));
    }

    public function viewUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

        return view('admin-user-manage.view-user', compact('user'));
    }

    public function adduser()
    {
        $jsonPath = public_path('jnv_schools.json');
        $jnvSchools = json_decode(File::get($jsonPath), true);
        return view('admin-user-manage.add-user', compact('jnvSchools'));
    }

    public function adduserSubmit(Request $request)
    {
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
                'unique:users,phone_number',
            ],
            'city' => 'required|string|max:30',
            'gender' => 'required',
            'state' => 'required|string',
            'district' => 'required|string',
            'passout_batch' => 'required|string',
            'profession' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'first_name.regex' => 'Name field must contain only letters and spaces',
            'last_name.regex' => 'Name field must contain only letters and spaces',
            'phone_number.regex' => 'The Contact number must be a valid number.',
            'phone_number.unique' => 'The Contact number is already in use.',
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

            return redirect()->route('admin.alluser')->with('success', 'Alumni Added Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }

    //todo: admin edit_user_form
    public function editUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

        $jsonPath = public_path('jnv_schools.json');
        $jnvSchools = json_decode(File::get($jsonPath), true);
        return view('admin-user-manage.edit-user', compact('user', 'jnvSchools'));
    }

    public function editUserSubmit(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

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
            'profession' => 'required|string|max:50',
        ], [
            'first_name.regex' => 'The first name must contain only letters and spaces.',
            'last_name.regex' => 'The last name must contain only letters and spaces.',
            'phone_number.regex' => 'The phone number must be a valid 10-digit number.',
            'phone_number.unique' => 'The phone number is already in use.',
        ]);

        try {
            // Update user details
            $user->update($validatedData);

            return redirect()->route('admin.alluser')->with('success', 'Alumni updated successfully!');
        } catch (\Exception $e) {
            // Handle errors during update
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }

    public function updateUserStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean'
        ]);
        $user = User::find($request->user_id);
        if ($user) {
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'User not found!']);
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);
        $user = User::find($request->user_id);
        if ($user) {
            if ($user->qr_code_image) {
                $imagePath = public_path('qrcodes') . '/' . $user->qr_code_image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
