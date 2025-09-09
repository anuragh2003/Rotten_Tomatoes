<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // You can return the users or pass them to a view
        return view('index',compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->route('login')->with('success','User Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'Failed to delete user. Please try again.');
    }
    }
public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to login user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to dashboard (or any protected page)
            return redirect()->intended('/')->with('success','User Logined successfully!');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // logs out the user

    // Invalidate the session
        $request->session()->invalidate();

    // Regenerate CSRF token
        $request->session()->regenerateToken();

    // Redirect to home (or login) with success message
        return redirect('/')->with('success', 'User logged out successfully!');
    }
}
