<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function AdminDashboard()
    {
        $this->adminAuthCheck();
        return view('admin.dashboard.index');
    }

    public function logout(){
        Session::flush();
         Auth::logout();

        return redirect()->route('admin.login')->with('message', 'You have been logged out successfully.');
    }

    public function adminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if (!$admin_id) {
            return redirect()->route('admin.login')->send();
        }
    }
}
