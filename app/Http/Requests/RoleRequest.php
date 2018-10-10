<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $role = $this->route('role');
        return [
            'title' => 'required|unique:roles,title,'.$role['id'],
            'name'  => 'required|unique:roles,name,'.$role['id'],
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => '角色中文标识 不能为空',
            'title.unique'   => '该角色中文名称已使用',
            'name.required'  => '角色英文标识 不能为空',
            'name.unique'    => '该角色英文名称已使用',
        ];
    }
}
