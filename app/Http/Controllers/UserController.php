<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUpdateUser(UserRequest $request)
    {
        $request->validated();

        User::updateOrCreate([
            'id' => $request->user_id
        ],
        [
            'branch,' => $request->branch,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['status' => JsonResponse::HTTP_OK, 'message' => 'User records saved successfully']);
    }

    public function getUsers()
    {
        $users = User::all();
        return view('pages.users.view-users', ['users' => $users]);
    }

}
