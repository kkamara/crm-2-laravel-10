<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{    
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request) 
    {
        return abort(404, 'Page not found');
    }
}
