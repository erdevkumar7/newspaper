<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
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

            return redirect()->route('user.register')->with('success', 'Your Registration Successful!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }
}
