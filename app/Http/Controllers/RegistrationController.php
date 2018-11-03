<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Mail\Welcome;

class RegistrationController extends Controller
{

    public function create() 
    {

    	return view('registration.create');

    }

    public function store() 
    {

    	request()->validate([
    		'username' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	$user = User::create([
			'name' => request('username'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
    	]);


    	// \Auth->login();

    	auth()->login($user);

        // Send Mail.
        // \Mail::to($user)->send(new Welcome($user));

    	// return redirect('/');
    	return redirect()->home();
    }

}
