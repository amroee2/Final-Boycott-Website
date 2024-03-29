<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{




    public function login() {
        // If user is already authenticated, redirect them to appropriate page
        if (auth()->check()) {
            return redirect('/home');
        }
    
        // User is not authenticated, show login page
        return view('login');
    }
    
    
    // public function all(){
    //     $users = User::all();
    //     return view('all',['users' => $users]);
    // }

    public function authenticate(Request $request){
        if (auth()->check()) {
            return redirect ('/home');
        }
        $data = $request->validate([
            'password' => 'required',
            'email' => ['required', 'email'],
        ]);
        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return redirect ('/home');

        }
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required','min:3'],
            'password' => 'required|min:6',
            'email' => ['required', 'email',Rule::unique('users','email')],
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['canDelete'] = 0;
        $user = User::create($data);
        return redirect('/home')->with('message','User created and logged in');
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        auth()->logout();

        return redirect('/');
    }
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required']
        ]);
    
        $id = $validatedData['id'];
    
        // Find the user by ID, or throw a ModelNotFoundException if not found
        $user = User::findOrFail($id);
    
        // Check if the authenticated user has permission to delete users
        if (auth()->user()->canDelete == 0 || $user->id == auth()->user()->id) {
            return redirect('/home');
        }
    
        // Delete the user
        $user->delete();
    
        return redirect('/home');
    }
    
}
