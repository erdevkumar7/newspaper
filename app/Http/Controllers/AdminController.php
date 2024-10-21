<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
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
        return view('admin.dashboard');
    }

    public function adduser()
    {
        return view('admin-user-manage.add-user');
    }

    public function allUser()
    {
        $allusers = DB::table('users')->orderBy('created_at', 'desc')->get();
        return view('admin-user-manage.all-user', compact('allusers'));
    }

    public function adduserSubmit(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:70',
            'address' => 'required|string|max:100',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|numeric',

            'billing_name' => 'required|string|max:70',
            'billing_address' => 'required|string|max:100',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip_code' => 'required|numeric',

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::create($validateData);

        if ($user) {
            return redirect()->route('admin.alluser')->with('success', 'User Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add User. Please try again.');
        }
    }

    public function viewUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

        return view('admin-user-manage.view-user', compact('user'));
    }

    //todo: admin edit_user_form
    public function editUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }
        return view('admin-user-manage.edit-user', compact('user'));
    }


    public function editUserSubmit(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'No User Found!');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:70',
            'address' => 'required|string|max:100',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|numeric',

            'billing_name' => 'required|string|max:70',
            'billing_address' => 'required|string|max:100',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip_code' => 'required|numeric',

            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed', // Password is optional during updates
        ]);


        if ($request->filled('password')) {
            // $validatedData['original_password'] = $validatedData['password'];
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        if ($user) {
            return redirect()->route('admin.alluser')->with('success', 'User Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add User. Please try again.');
        }
    }

    public function deleteUser($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            return redirect()->route('admin.alluser')->with('success', 'User deleted successfully');
        };
        return redirect()->back()->with('error', 'user not Deleted');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
