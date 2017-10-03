<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
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
            'address'=>'required',
            'phone'=>'required|min:11|numeric',
            'status_id'=>'required',
            'latitude'=>'required',
            'longitude'=>'required'
        ];
    }

    public  function messages() // those are to display custom messages
    {
        return [
            'name.required'=>'Please Insert a Name.',
            'address.required'=>'Please Insert Address.',
            'phone.required'=>'Please Insert Phone Number.',
            'status_id.required'=>'Please Select a status.',
            'country_id.latitude'=>'Please Insert latitude.',
            'category_id.longitude'=>'Please Insert longitude.',

        ];
    }
}
