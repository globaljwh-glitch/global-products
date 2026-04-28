<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerProfileDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function registerForm()
    {
        if (auth()->check() && auth()->user()->role == 2) {
            return redirect()->route('customer.account');
        }

        return view('frontend.auth.register');
    }



    public function loginForm()
    {
        if (auth()->check() && auth()->user()->role == 2) {
            return redirect()->route('customer.account');
        }

        return view('frontend.auth.login');
    }



    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
        ]);


        $user = User::create([
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);


        Auth::login($user);


        return redirect()
            ->route('customer.account')
            ->with('success', 'Account created successfully.');
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 2
        ];


        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()
                ->route('customer.account')
                ->with('success', 'Welcome back.');
        }


        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid email or password.'
            ]);
    }




    public function myAccount()
    {
        $user = auth()->user();

        $nameParts = explode(' ', $user->name);

        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';

        $profile = CustomerProfileDetail::firstOrCreate(
            [
                'customer_id' => $user->id
            ],
            [
                'country' => 'India',
                'newsletter' => 1,
                'sms_updates' => 1
            ]
        );

        return view(
            'frontend.account',
            compact(
                'user',
                'firstName',
                'lastName',
                'profile'
            )
        );
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'first_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|max:20'
        ]);


        /*
        Update users table
        */
        $fullName = trim(
            ($request->first_name ?? '') . ' ' .
            ($request->last_name ?? '')
        );

        $user->update([
            'name' => $fullName ?: $user->name,
            'email' => $request->email
        ]);


        /*
        Update profile details table
        */
        CustomerProfileDetail::updateOrCreate(
            [
                'customer_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'alternate_phone' => $request->alternate_phone,
                'gender' => $request->gender,
                'dob' => $request->dob,

                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'landmark' => $request->landmark,
                'pincode' => $request->pincode,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'address_type' => $request->address_type,

                'company_name' => $request->company_name,
                'gst_number' => $request->gst_number,

                'newsletter' => $request->newsletter ? 1 : 0,
                'sms_updates' => $request->sms_updates ? 1 : 0
            ]
        );

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        
        $user = auth()->user();

        if (!$user) {
            return redirect()
                ->route('customer.login')
                ->with('error', 'Please login first');
        }

        $profile = CustomerProfileDetail::firstOrCreate(
            [
                'customer_id' => $user->id
            ],
            [
                'country' => 'India',
                'newsletter' => 1,
                'sms_updates' => 1
            ]
        );

        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs(
                'uploads/profile-images',
                $filename,
                'public'
            );

            $profile->update([
                'profile_image' => 'storage/' . $path
            ]);
        }

        return back()->with(
            'success',
            'Profile image updated successfully.'
        );
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Logged out successfully.');
    }
}