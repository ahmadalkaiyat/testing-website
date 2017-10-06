<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'section_id'=>'required',
            'title'=>'required',
            'body'=>'required',
            'photo_id'=>'image|max:1000',
            'status_id'=>'required',
        ];
    }

    public  function messages() // those are to display custom messages
    {
        return [
            'section_id.required'=>'Please Select a Section',
            'title.required'=>'Please Insert a Title.',
            'body.required'=>'Please Insert a body Description.',
            'status_id.required'=>'Please Select A status.'
        ];
    }
}
