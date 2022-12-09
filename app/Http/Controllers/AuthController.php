<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth ;

class AuthController extends Controller
{
    public function register(){
        
        return view('auth.files.register');
    }

    public function save(Request $request){

        // dd($request->input());
        $request->validate([
            'name' => 'max:255',
            'pseudo' => 'required|max:255|unique:users',
            'email' => 'max:255|unique:users',
            'phone' => 'required',
            'city' => 'required|max:255',
            'work' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|min:8|same:password|',
        ]);
        $user = User::create([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'work' => $request->work,
            'birth' => $request->birth,
            'sex' => $request->sex,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success','Inscription réalisé avec succès');
    }

    public function login(){
        
        return view('auth.files.login');
    }

    public function check(Request $request){
        $validated = $request->validate([
            'pseudo' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('pseudo', 'password',);

        $exist = User::where('pseudo',$request->pseudo)->first();
        if(!$exist->is_active)
            return back()->with(['danger' => 'Votre compte a été bloqué']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->update(['online' => true]);
            Auth::login($user);
            if(Auth::user()->role == 'admin')
                return redirect()->route('admin.dashboard');
            else
                return redirect()->route('user.home');
        }

        return back()->with(['danger' => 'Mauvais Pseudo ou mot de passe' ]);

    }

    public function logout(){

        $user = User::find(auth()->user()->id);
        $user->update(['online' => false]);
        Auth::logout();

        return redirect()->route('login');
    }
}
