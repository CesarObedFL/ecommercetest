<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all(); 
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
        return response()->json(['user' => $user, 'message' => __('user.created')], 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
        return response()->json(['user' => $user, 'message' => __('user.edited')], 200);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
