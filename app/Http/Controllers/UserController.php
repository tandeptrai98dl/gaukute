<?php

namespace App\Http\Controllers;

use App\User;

class UserController
{
    public function index(){
        $users = User::all();
        return view('admin.user_dashboard',compact('users'));
    }

    public function edit($id){
        $res   = User::where('id',$id)->delete();
        if($res){
            return redirect()->action('UserController@index')
                ->with('message', trans('Delete successfully!'));
        }
        return redirect()->action('UserController@index')
            ->with('error', trans('Failed to delete!'));
    }
}