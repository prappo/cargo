<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addUserIndex()
    {
        if (Auth::user()->type == "admin" || Auth::user()->type == "reseller") {
            return view('user.addUser');
        } else {
            return "Permission denied";
        }


    }

    public function createUser(Request $request)
    {
        if ($request->name == "") {
            return "You must enter email Name";
        }
        if ($request->email == "") {
            return "You must enter email address";
        }
        if ($request->password == "") {
            return "You must enter password";
        }


        if (User::where('email', $request->email)->exists()) {
            return "Email already exists";
        }


        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->country = $request->country;
            $user->nationality = $request->nationality;
            $user->city = $request->city;
            $user->phone = $request->phone;
            $user->companyName = $request->companyName;
            $user->companyAddress = $request->companyAddress;
            $user->type = $request->type;
            $user->ref = Auth::user()->id;
            $user->save();

            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateProfile(Request $request)
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


    public function deleteUser(Request $request)
    {
        if (User::where('id', $request->id)->value('type') == "admin") {
            return "You can't delete Admin account";
        }

        if ($request->id == Auth::user()->id) {
            return "You can't delete your own account";
        }

        try {
            User::where('id', $request->id)->delete();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateInformationIndex($userId)
    {
        return view('user.updateUser', compact('userId'));
    }

    public function updateInformation(Request $request)
    {

        try {
            if ($request->password == "") {
                User::where('id', $request->userId)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'nationality' => $request->nationality,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'companyName' => $request->companyName,
                    'companyAddress' => $request->companyAddress,
                    'type' => $request->type
                ]);
                return "success";
            } else {
                User::where('id', $request->userId)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'country' => $request->country,
                    'nationality' => $request->nationality,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'companyName' => $request->companyName,
                    'companyAddress' => $request->companyAddress,
                    'type' => $request->type
                ]);
                return "success";
            }


        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    public function profile()
    {
        $userId = Auth::user()->id;
        return view('user.profile', compact('userId'));
    }

    public function userList()
    {
        if (Auth::user()->type == "admin") {
            $data = User::all();

        } elseif (Auth::user()->type == "reseller") {
            $data = User::where('ref', Auth::user()->id)->get();
        } else {
            return "Access denied";
        }

        return view('user.userList', compact('data'));
    }


}













