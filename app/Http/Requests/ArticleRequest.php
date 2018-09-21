<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'=>'required|max:60',
            'content'=>'required'
        ];
    }
    public function messages ()
    {
        return [
            'title.required'=>'请输入文章标题',
            'title.max'=>'文章标题不得超过60字符',
            'content.required'=>'请输入文章内容',
        ];
    }
}
