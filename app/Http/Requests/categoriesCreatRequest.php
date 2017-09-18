<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoriesCreatRequest extends FormRequest
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
            'name'         =>'required',
            'photo_id'    =>'required|image|max:1000'
        ];
    }

    public  function messages() // those are to display custom messages
    {
        return [
            'name.required'=>'Please Insert a Category Name.',
            'photo_id.required'=>'Please Select an Image for the Category.',
            'photo_id.image'=>'Please select a valid Image type .',

        ];
    }


}
