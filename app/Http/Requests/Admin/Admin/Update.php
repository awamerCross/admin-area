<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
        
            'name'      => 'required|max:191',
            'phone'     => 'required|numeric|unique:users,phone,'.auth()->id(),
            'email'     => 'required|email|max:191|unique:users,email,'.auth()->id(),
            'password'  => 'required|max:191',
            'avatar'    => 'nullable|image',
            'role_id'   => 'required|exists:roles,id',
            'active'    => 'nullable|in:1,0',
        ];
    }
}
