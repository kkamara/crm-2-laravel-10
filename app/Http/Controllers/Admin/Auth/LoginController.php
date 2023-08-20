<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request) 
    {
        return view('admin/auth/login');
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function create(Request $request) 
    {
        return route('adminHome');
    }
}
