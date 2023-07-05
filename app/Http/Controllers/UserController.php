<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
  

    // add data
    public function store(Request $request)
    {
       

        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        $user = user::create($request->all());
        //make new resource
        return new UserResource($user);
    }

}
