<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $users =  User::all();
            return view('home')->with('users', $users);
        } catch (Exception $e) {
            return 'false';
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth'=> ['required', 'string', 'max:255'],
            'gender'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact_number'=> ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function update($id)
    {
        $user=User::find($id);
        return view('update')->with('userdata', $user);
    }
    public function updateuser(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'date_of_birth'=> ['required', 'string', 'max:255'],
            'gender'=> ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact_number'=> ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::where('id', $request->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back();
    }
}
