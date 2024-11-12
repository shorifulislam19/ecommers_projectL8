<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin_login');
    }

    public function show_dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = Admin::where('admin_email', $admin_email)
                       ->where('admin_password', $admin_password)
                       ->first();

        if ($result) {
             Session::put('admin_id', $result->id);
            Session::put('admin_name', $result->admin_name);

            return redirect()->route('admin.dashboard');
        } else {
            Session::put('message', 'Email or Password invalid');
            return redirect()->route('admin.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
