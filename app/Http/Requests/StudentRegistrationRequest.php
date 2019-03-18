<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRegistrationRequest extends FormRequest
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
     * Customized error messages
     *
     */
    public function messages()
    {
        return [
            'class_room_id.required'              => "The Class field is required.",
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_name'              => 'required|max:50',
            'class_room_id'              => 'required',
            
            'user_name'             => 'required|unique:users,user_name,status|max:145',
            'password'              => 'required|min:6|max:25|confirmed',
            'email'                 => 'nullable|email|unique:users|max:145',
        ];
    }
}
