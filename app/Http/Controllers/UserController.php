<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function addUserIndex()
    {
        return view('user.addUser');
    }

    public function createUser(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return "Email already exists";
        }
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'type' => $request->type
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateUser(Request $request)
    {

        if ($request->name == "" || $request->email == "") {
            return "Name and Email field can't be empty";
        }
        if ($request->password == "") {
            try {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);


            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            try {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }


        return "success";
    }


    public function deleteUser(Request $request){
        try{
            User::where('id',$request->id)->delete();
            return "success";
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function updateInformation(){

    }



}













