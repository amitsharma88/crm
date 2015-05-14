<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Models\User;
use DB;
use Input;
use Auth;
use Session;
use Redirect;

class AdminUserController extends Controller {

    /**
     * Display Login screen
     *
     * @return Response
     */
    public function index() {
        $error = '';
        return view('admin.login.login', compact('error'));
    }

    /**
     * function name : user_login
     * Autheticate the user with email and password
     * Author : Amit
     * Date : 13-5-15
     */
    function user_login() {
        $email = Input::get('email');
        $password = Input::get('password');
        if ($email && $password) {
            $user = User::where('email', $email)->first();
            $userData = array(
                'email' => $email,
                'password' => $password,
            );
            if (Auth::attempt($userData)) {
                Session::put('admin_email', $email);
                Session::put('admin_user_id', $user->id);
                Session::put('admin_name', $user->first_name);
                Session::put('admin_user_pic', $user->profile_pic);
                Session::put('admin_user_group', $user->user_group);
                Session::put('admin_group_name', $user->group_name);
                return Redirect::to('dashboard');
            } else {
                $error = 'Invalid Email/Password';
                return view('admin.login.login', compact('error'));
            }
        } else {
            $error = 'Invalid Email/Password';
            return view('admin.login.login', compact('error'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
