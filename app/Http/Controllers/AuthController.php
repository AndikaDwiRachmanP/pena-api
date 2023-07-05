<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('clientside.login');
    }
    function registrasi()
    {
        return view('registrasi');
    }
    function prosesregistrasi()
    {
        $user = new User();
        $user->nama = request('nama');
        $user->username = request('username');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect('login')->with('success', 'Registrasi berhasil');
    }
    function beranda()
    {
        return view('serverside/master');
    }
    

    //post login
    // public function postlogin()
    // { 

    //  if (Auth::guard('admin')->attempt(['nama' => request('nama'), 'password' => request('password')])) {
    //         //check if password is correct
    //        //return redirect('sudah');
    //        dd("berhasil");
    //     }
    //     else {
    //         //if user not exist, redirect to login
    //         return back()->with('error', 'Username tidak ditemukan');
            
    //     }
    // }

    function postlogin(Request $request)
    {
        //validate form
        $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);
        //get data from model user
        $user['admin'] = User::where('nama', request('nama'))->first();
        //check if user exist
        if ($user) {
            //check if password is correct
            if (Auth::attempt(['nama' => request('nama'), 'password' => request('password')])) {
                //if password is correct, redirect to beranda
                return redirect('serverside/master');
            } else {
                //if password is incorrect, redirect to login
                return redirect('login')->with('error', 'Password salah');
            }
        } else {
            //if user not exist, redirect to login
            return back()->with('error', 'Username tidak ditemukan');
            
        }
    }


    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
