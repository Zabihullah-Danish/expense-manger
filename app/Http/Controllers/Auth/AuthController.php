<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    
    public function login(){
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request){
        // $user = User::where('email',$request->email)->first();
        // dd($user);
        $credentials = $request->validate([
            'email' => ['required','email','max:255'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('message','email or password incorrect');
    }

    public function register(){
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function registeration(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'email' => ['required','string','max:255','unique:users,email'],
            'password' => ['required','confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
       
        if($user){
            $request->session()->regenerate();
            Auth::login($user);
            return redirect()->route('dashboard');
        }
        

    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function profile(){

        return view('profile.updateProfile');
    }

    public function updateProfile(Request $request,$id){

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->lastname= $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province = $request->province;
        // if($request->has('photo')){
 
        //     $extension = $request->photo->extension();
        //     $filename = now() . rand(10000,1000000) . "." . $extension;
        //     $request->file('photo')->storeAs('photo', $filename,'public');
        //     $user->photo = $filename;
        // }
        if($request->has('photo')){
            Storage::delete('public/'. $user->photo);
            $location = $request->file('photo')->store('profile', 'public');
            // dd($location);
            $user->photo = $location;
          }
        
        $user->save();

        return back()->with('message','Profile updated');


        // $user = User::update([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'province' => $request->province,
        //     'photo' => $filename,
        // ]);
    }
}
