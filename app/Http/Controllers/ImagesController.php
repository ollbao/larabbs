<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreImagePost;
use App\Handlers\FileUploadHandler;

class ImagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(StoreImagePost $request)
    {
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        $image = FileUploadHandler::store($request->file('image'));
        if($image){
            $data['file_path'] = $image['url'];
            $data['msg']       = "上传成功!";
            $data['success']   = true;
        }
        
        return $data;
    }

    





}
