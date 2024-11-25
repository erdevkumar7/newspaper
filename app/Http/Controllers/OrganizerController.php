<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
    public function organizerHome()
    {
        return view('organizer.home');
    }
    public function organizerRegForm()
    {
        return view('organizer.register');
    }

    public function organizerRegisterSubmit(Request $request)
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
            'email' => 'required|string|email:rfc,dns|max:70|unique:organizers',
            'phone_number' => [
                'required',
                'regex:/^[6-9]\d{9}$/',
            ],
            'role' => 'required|string|max:30',
            'gender' => 'required',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required',
        ], [
            'first_name.regex' => 'Name field must contain only letters and spaces',
            'last_name.regex' => 'Name field must contain only letters and spaces',
            'phone_number.regex' => 'The Contact number must be a valid number.',
        ]);

        try {
            // Hash the password and add it to the validated data
            $validatedData['original_password'] = $validatedData['password'];
            $validatedData['password'] = Hash::make($validatedData['password']);

            $organizer = Organizer::create($validatedData);

            return redirect()->route('organizer.login')->with('success', 'Your Registration Successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }

    public function showLoginForm()
    {
        return view('organizer.login');
    }

    // public function loginSubmit(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('organizer')->attempt($credentials)) {
    //         return redirect()->route('organizer.dashboard')->with('success', 'Logged in successfully!');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Invalid email or password.',
    //     ]);
    // }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        $organizer = Organizer::where('email', $credentials['email'])->first();

        if (!$organizer) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }

        if ($organizer->status == 0) {
            return back()->withErrors([
                'email' => 'Your account is not verified. Please contact the admin.',
            ]);
        }

        if (Auth::guard('organizer')->attempt($credentials)) {
            return redirect()->route('organizer.QrScan')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }


    public function dashboard()
    {
        $organizer = Organizer::find(Auth::guard('organizer')->user()->id);
        if (!$organizer) {
            return redirect()->back()->with('error', 'No Organizer Found!');
        }
        return view('organizer.dashboard', compact('organizer'));
    }

    public function QrScan()
    {
        $organizer = Organizer::find(Auth::guard('organizer')->user()->id);
        if (!$organizer) {
            return redirect()->back()->with('error', 'No Organizer Found!');
        }
        return view('organizer.qr-scan', compact('organizer'));
    }

    public function logout()
    {
        Auth::guard('organizer')->logout();
        return redirect()->route('organizer.login')->with('success', 'Logged out successfully!');
    }

    public function allOrganizer()
    {
        $allorganizer = DB::table('organizers')->orderBy('created_at', 'desc')->get();
        return view('admin-organizer-manage.all-organizer', compact('allorganizer'));
    }

    public function updateOrganizerStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:organizers,id',
            'status' => 'required|boolean'
        ]);
        $user = Organizer::find($request->user_id);
        if ($user) {
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'User not found!']);
    }

    public function deleteOrganizer(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:organizers,id'
        ]);
        $user = Organizer::find($request->user_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Organizer deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Organizer not found.']);
    }


    public function showUserProfile($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No Allumni Found!');
        }
        return view('organizer.view-user', compact('user'));
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
}
