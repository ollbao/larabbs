<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserPut;
use App\Handlers\FileUploadHandler;

class UsersController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(User $user)
    {
        $topics = $user->topics()->recent()->paginate(10);
        return view('users.show', compact('user','topics'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserPut $request, User $user)
    {
        $this->authorize('update', $user);
        $user->fill($request->all());
        if($request->avatar){
            $avatar = FileUploadHandler::store($request->file('avatar'), 362);
            $user->avatar = $avatar['url'];
        }

        $user->save();
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功');
    }
    
}
