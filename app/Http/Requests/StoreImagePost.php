<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreImagePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'bail|required|mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200|max:50'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => '用户头像图片格式:jpeg,bmp,png,gif',
            'image.dimensions' => '图片太小',
            'image.max' => '图片不得大于1M'
        ];
    }

    /**
     * 配置验证器实例。
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            exit(json_encode([
                'success' => false,
                'msg' => $validator->errors()->first(),
                'file_path' => ''
            ]));
        }
    }




}
