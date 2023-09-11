<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->only(['logout']);
    }

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
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:30|exists:users,email',
            'password' => 'required|max:30',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        $rememberToken = false;
        if ($request->has('rememberToken')) {
            $rememberToken = true;
        }
        $username = htmlspecialchars($request->get('username'));
        $password = $request->get('password');
        $auth = Auth::attempt([
            'email' => $username,
            'password' => $password,
        ], $rememberToken);
        if (!$auth) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['username' => 'Invalid email & password combination']);
        }
        return redirect()->to('admin/dashboard', 301);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->to('admin/dashboard', 301);
    }
}
