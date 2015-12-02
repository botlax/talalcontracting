<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ApplicationRequest extends Request
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
            'resume' => 'required|mimes:pdf|max:2000',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'country' => 'required',
            'email' => 'required|email',
            'mobile' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'resume.required' => 'Please upload your resume',
            'resume.mimes' => 'Please upload a pdf file',
            'resume.size' => 'Your file is too big (max 2mb)',
            'firstname.required' => 'Please enter your firstname',
            'firstname.alpha' => 'This field cannot contain a number',
            'lastname.required' => 'Please enter you lastname',
            'lastname.alpha' => 'This field cannot contain a number',
            'country.required' => 'Please select your country',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Incorrect email format (email_id@yourdomain.com)',
            'mobile.numeric' => 'This field can only contain numbers'
        ];
    }
}
