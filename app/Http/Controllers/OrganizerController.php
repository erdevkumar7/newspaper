<?php



namespace App\Http\Controllers;



use App\Models\Organizer;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\File;



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
                'unique:organizers,email',
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
                'unique:organizers,phone_number',
            ],

            'role' => 'required|string|max:30',
            'gender' => 'required',
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required',
        ], [

            'first_name.regex' => 'Name field must contain only letters and spaces',
            'last_name.regex' => 'Name field must contain only letters and spaces',
            'phone_number.regex' => 'The Contact number must be a valid number.',
            'phone_number.unique' => 'The Contact number is already in use.',
            'email.regex' => 'The email address format is invalid.',
            'email.unique' => 'This email address is already registered.',
            'email.email' => 'The email address must be valid.',
            'email.custom' => 'The email domain is not allowed.',

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



    public function viewOrganizer($org_id)

    {

        $organizer = Organizer::find($org_id);

        if (!$organizer) {

            return redirect()->back()->with('error', 'No Organizer Found!');

        }

        return view('admin-organizer-manage.view-organizer', compact('organizer'));

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



    public function showEditUser($user_id)

    {

        $user = User::find($user_id);

        if (!$user) {

            return redirect()->back()->with('error', 'No Allumni Found!');

        }

        $jsonPath = public_path('jnv_schools.json');

        $jnvSchools = json_decode(File::get($jsonPath), true);

        return view('organizer.edit-user', compact('user', 'jnvSchools'));

    }



    public function updateUser(Request $request, $user_id)

    {

        $user = User::find($user_id);

        if (!$user) {

            return redirect()->back()->with('error', 'No Allumni Found!');

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



            return redirect()->route('organizer.showUserProfile', $user->id)->with('success', 'Alumni updated successfully!');

        } catch (\Exception $e) {

            // Handle errors during update

            return redirect()->back()->with('error', 'Failed to update Alumni: ' . $e->getMessage());

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



    public function addOrganizer()

    {

        return view('admin-organizer-manage.add-organizer');

    }



    public function addOrganizerSubmit(Request $request)

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

                'unique:organizers,phone_number',

            ],

            'role' => 'required|string|max:30',

            'gender' => 'required',

            'password' => 'required|confirmed|string|min:6',

            'password_confirmation' => 'required',

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



            $organizer = Organizer::create($validatedData);



            return redirect()->route('admin.allOrganizer')->with('success', 'Organizer added Successful!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());

        }

    }



    public function AdminOrgUpdateForm(Request $request, $org_id)

    {

        $organizer = Organizer::find($org_id);

        if (!$organizer) {

            return redirect()->back()->with('error', 'No Organizer Found!');

        }

        return view('admin-organizer-manage.edit-organizer', compact('organizer'));

    }



    public function AdminOrgUpdateSubmit(Request $request, $org_id)

    {

        $organizer = Organizer::find($org_id);

        if (!$organizer) {

            return redirect()->back()->with('error', 'No Organizer Found!');

        }



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

            'email' => [

                'required',

                'string',

                'email:rfc,dns',

                'max:70',

                Rule::unique('organizers')->ignore($organizer->id),

            ],

            'phone_number' => [

                'required',

                'regex:/^[6-9]\d{9}$/',

                Rule::unique('organizers', 'phone_number')->ignore($organizer->id),

            ],

            'role' => 'required|string|max:30',

            'gender' => 'required',

            'password' => 'required|string|min:6',

        ], [

            'first_name.regex' => 'Name field must contain only letters and spaces',

            'last_name.regex' => 'Name field must contain only letters and spaces',

            'phone_number.regex' => 'The Contact number must be a valid number.',

            'phone_number.unique' => 'The Contact number is already in use.',

        ]);



        try {

            $validatedData['original_password'] = $validatedData['password'];

            $validatedData['password'] = Hash::make($validatedData['password']);



            $organizer->update($validatedData);

            return redirect()->route('admin.allOrganizer')->with('success', 'organizer Update Successful!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to update organizer: ' . $e->getMessage());

        }

    }

    //Organizer APIs --------------------------------------------------------------------------------

    public function loginApi(Request $request)

    {

        $request->validate([

            'email' => 'required|email',

            'password' => 'required|min:6',

        ]);



        $credentials = $request->only('email', 'password');

        $organizer = Organizer::where('email', $credentials['email'])->first();



        if (!$organizer) {

            return response()->json([

                'success' => false,

                'message' => 'Invalid email or password.',

            ], 401);

        }



        if ($organizer->status == 0) {

            return response()->json([

                'success' => false,

                'message' => 'Your account is not verified. Please contact the admin.',

            ], 403);

        }



        if (Auth::guard('organizer')->attempt($credentials)) {

            $token = $organizer->createToken('OrganizerToken')->plainTextToken;



            return response()->json([

                'success' => true,

                'message' => 'Logged in successfully!',

                'data' => [

                    'organizer' => $organizer,

                    'token' => $token,

                ],

            ]);

        }



        return response()->json([

            'success' => false,

            'message' => 'Invalid email or password.',

        ], 401);

    }



    public function getUserByIdOrPhoneNumber(Request $request)

    {

        $request->validate([

            'id' => 'nullable|integer',

            'phone_number' => 'nullable|regex:/^[6-9]\d{9}$/',

        ]);



        // Fetch user by ID or phone_number

        $user = User::when($request->filled('id'), function ($query) use ($request) {

            return $query->where('id', $request->id);

        })

            ->when($request->filled('phone_number'), function ($query) use ($request) {

                return $query->orWhere('phone_number', $request->phone_number);

            })

            ->first();



        // If no user is found, return a custom error response

        if (!$user) {

            return response()->json([

                'success' => false,

                'message' => 'User not found',

            ], 404);

        }



        // Return the user details if found

        return response()->json([

            'success' => true,

            'message' => 'User details retrieved successfully',

            'data' => $user,

        ], 200);

    }







    public function apiUpdateUserStatus(Request $request)

    {

        // Validate the input

        $validatedData = $request->validate([

            'id' => 'required|integer',

            'status' => 'required|integer|in:0,1',

        ]);

    

        try {           

            $user = User::find($validatedData['id']);

          

            if (!$user) {

                return response()->json([

                    'success' => false,

                    'message' => 'User not found',

                ], 404);

            }

    

            $user->status = $validatedData['status'];

            $user->save();

    

            return response()->json([

                'success' => true,

                'message' => 'Status updated successfully!',

                'data' => [

                    'id' => $user->id,

                    'status' => $user->status,

                ],

            ], 200);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => 'Failed to update user status',

                'error' => $e->getMessage(),

            ], 500);

        }

    }



    // public function getUserById(Request $request){

    //     return response()->json($request);

    // }

    

}

