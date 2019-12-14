<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RequestUserRegister;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RequestUserRegister $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->id)
        {
            return redirect()->route('get.login')->with('success','Đăng kí thành công');
        }

        return redirect()->back()->with('danger','Đăng kí thất bại');
    }


}
