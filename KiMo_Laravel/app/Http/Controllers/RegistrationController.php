<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class RegistrationController extends Controller
{
    //
    public function create()
    {
        return view('registration.create');

    }
    public function store()
    {
        //Validate the form

        $this->validate( request(),[

            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);


        //Store the user
        //dd((request(['name','email',Hash::make('password')])));
        $name=request('name');
        $email=request('email');
        $password=bcrypt(request('password'));
        $user=User::create(['name'=>$name,'email'=>$email,'password'=>$password]);
       auth()->login($user);

        //Redirect to home page
        return redirect("/main");
    }

}
