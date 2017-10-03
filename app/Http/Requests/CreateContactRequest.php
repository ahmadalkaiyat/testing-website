<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'contact_person'=>'required',
            'email_address'=>'required|email',
            'sms'=>'required',
            'registration_name'=>'required',
            'phone_number'=>'required|min:11|numeric',
            'about_shop'=>'required'
        ];
    }

    public  function messages() // those are to display custom messages
    {
        return [
            'name.contact_person'=>'Please Insert a Contact Person name.',
            'email_address.required'=>'Please Insert anEmail Address.',
            'sms.required'=>'Please Insert an sms Number.',
            'registration_name.required'=>'Please Insert Registration Name.',
            'phone_number.required'=>'Please insert Office Phone Number.',
            'about_shop.required'=>'Please Fill About Shop.'
        ];
    }
}
