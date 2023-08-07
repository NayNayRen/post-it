<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // register a new user
    public function createUser(Request $request)
    {
        // get register form values
        $registerFormInputs = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:5']
        ]);
        // capitalize first and last name
        $registerFormInputs['first_name'] = ucfirst($registerFormInputs['first_name']);
        $registerFormInputs['last_name'] = ucfirst($registerFormInputs['last_name']);
        // hash password
        $registerFormInputs['password'] = bcrypt($registerFormInputs['password']);
        // create new user
        $user = User::create($registerFormInputs);
        Mail::to($request->email)->send(new NewUser($user));
        return redirect(route('user.showLoginForm'))->with('flash-message', 'Greetings ' . $user->first_name . '<br>You are now registered.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    // log user in
    public function loginUser(Request $request)
    {
        // get login form values
        $loginFormInputs = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            if (auth()->attempt($loginFormInputs)) {
                $request->session()->regenerate();
                return redirect(route('user.index'))->with('flash-message', 'Welcome back<br>' . ucfirst(auth()->user()->first_name) . '<br>You have logged in.');
            }
        }
        if (!$checkUser) {
            return back()->withErrors([
                'email' => 'Email Does Not Exist',
                'password' => ''
            ]);
        } else {
            return back()->withErrors([
                'email' => 'Invalid Credentials'
            ])->onlyInput('email');
        }
    }

    // log user out
    public function logoutUser(Request $request)
    {
        // removes authentication from the users session
        auth()->logout();
        // recomended to invalidate the users session
        $request->session()->invalidate();
        // and regen their @csrf token
        $request->session()->regenerateToken();
        return redirect(route('user.index'))->with('flash-message', 'You have now logged out.');
    }

    // delete user
    public function deleteUser(Request $request, User $user)
    {
        // dd($user);
        $deletionEmail = $request->deletion_email;
        if ($deletionEmail === auth()->user()->email) {
            $user->delete();
            return redirect(route('user.index'))->with('flash-message', 'Sorry to see you go...');
        } else {
            return back()->withErrors(['deletion_email' => 'That is not the correct email.']);
        }
    }
}
