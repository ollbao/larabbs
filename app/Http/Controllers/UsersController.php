<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserPut;

class UsersController extends Controller
{
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserPut $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('sucsess', '个人资料更新成功');
    }
    
}
