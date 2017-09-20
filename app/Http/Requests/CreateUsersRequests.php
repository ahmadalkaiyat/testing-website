<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersRequests extends FormRequest
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
            //
            'name'=>'required',
            'email'=>'required|email',
            'role_id'=>'required',
            'status_id'=>'required',
            'country_id'=>'required',
            'category_id'=>'required',
            'password'=>'required'
        ];
    }

    public  function messages() // those are to display custom messages
    {
        return [
            'name.required'=>'Please Insert a Name.',
            'email.required'=>'Please Insert an Email Address.',
            'role_id.required'=>'Please Select a Role.',
            'status_id.required'=>'Please Select a status.',
            'country_id.required'=>'Please Select A country.',
            'category_id.required'=>'Please Select A Category.',
            'password.required'=>'Please enter a Password.',

        ];
    }
}
