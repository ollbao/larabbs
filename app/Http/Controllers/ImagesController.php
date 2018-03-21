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
        
        $image = FileUploadHandler::store($request->file('image'));
        $data = [
            'success' => true,
            'msg'  => '上传成功!',
            'file_path' => $image['url']
        ];
        return $data;
    }

    





}
