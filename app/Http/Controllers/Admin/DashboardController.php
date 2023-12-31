<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request) {
        if (!Auth::check()) {
            return redirect()->to('admin/login', 301);
        }
        return view('admin/dashboard');
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function redirectAdminPath(Request $request) {
        return redirect()->to('admin/login', 301);
    }
}
