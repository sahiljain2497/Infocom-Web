<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;

class BaseController extends Controller
{
    public function redirectTo()
    {   
        switch(Auth::user()->type)
        {
        	case User::ADMIN_TYPE :
        		return '/admin';
            default :
                return '/user';
        }

    }

}
