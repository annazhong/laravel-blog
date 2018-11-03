<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Library\Services\Contracts\NotificationServiceInterface;

class SessionsController extends Controller
{

	public function __construct()
	{

		// Only guest will do the following progress.
		$this->middleware('guest', ['except' => 'destory']);

	}

    public function create()
    {

    	return view('sessions.create');

    }

//Instance interface from provider binding, need to 'use' interface first.
// public function store(NotificationServiceInterface $NotificationForUserInstance)
public function store()
    {

    	if (!auth()->attempt(request(['name', 'password']))) {

    		return back()->withErrors([
    			'message' => "Please check your credientials and try again."
    		]);

    	}

        // Get notice from session('notice') in template.
        // return redirect()->home()->with('notice' , $NotificationForUserInstance->printNotice());     
         return redirect()->home()->with('notice' , app('notification.forUser')->printNotice());
 
    }

    public function destory()
    {

    	auth()->logout();
    	return redirect('/');

    }
}
