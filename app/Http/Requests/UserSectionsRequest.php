<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSectionsRequest extends FormRequest
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
            'name'         =>'required',
            'status_is'    =>'required'
        ];
    }


    public  function messages() // those are to display custom messages
    {
        return [
            'name.required'=>'Please Insert a Section Name.',
            'status_is.required'=>'Please Select s Status.'

        ];
    }


}
