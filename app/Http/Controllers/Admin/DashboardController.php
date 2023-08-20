<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['index']);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request) {
        return view('admin/dashboard');
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function redirectAdminPath(Request $request) {
        return redirect()->route('adminLogin');
    }
}
