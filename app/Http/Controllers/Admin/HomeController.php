<?php

namespace App\Http\Controllers\Admin;

class HomeController extends BaseController
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.home');
    }
}
