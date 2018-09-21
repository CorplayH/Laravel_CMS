<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth ()->check ();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
			'icon'=>'required'
        ];
    }
    public function messages ()
	{
		return [
			'title.required'=>'请输入栏目名称',
			'icon.required'=>'请选择图标',
		];
	}
}
