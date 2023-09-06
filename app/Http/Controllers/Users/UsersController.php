<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return view('backend.users.users')->with('users', $users);
    }
    public function getUserAdd()
    {
        return view('backend.users.user-add');
    }
    public function postUserAdd(Request $request)
    {
        return view('backend.users.user-add');
    }
    public function getUserEdit($id)
    {
        $user = User::find($id);
        return view('backend.users.user-edit')->with('user', $user);
    }
    public function postUserEdit(Request $request, $id)
    {
        return view('backend.users.user-edit');
    }
}
