<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserPut;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {echo storage_path('app/public');
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserPut $request, User $user)
    {
        $sData = $request->all();

        if($request->avatar){
            $fileStorePath = $request->file('avatar')->store('avatars', 'public');
            //裁剪图像
            Image::make(storage_path('app/public').'/'.$fileStorePath)->resize(362, null, function($constraint){
                $constraint->aspectRatio();  //设定宽度是 $max_width，高度等比例双方缩放
                $constraint->upsize();       //防止裁图时图片尺寸变大
            })->save();
            $sData['avatar'] = asset('storage/'.$fileStorePath);
        }

        $user->update($sData);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功');
    }
    
}
