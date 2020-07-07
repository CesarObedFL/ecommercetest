<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        return view('users.index-users', compact('users'));
    }

    public function create()
    {
        return view('users.create-user');
    }

    public function store(UserRequest $request)
    {
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        return redirect()->action('UserController@index')->with('success',__('user.created'));
    }

    public function show($user_name)
    {
        $user = User::where('name', $user_name)->get()->first();
        return view('users.details-user', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        return redirect()->action('UserController@show', $request->name)->with('edit', __('user.edited'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->action('UserController@index')->with('delete', __('user.deleted'));

    }
}
