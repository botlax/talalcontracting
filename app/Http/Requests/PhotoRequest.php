<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class PhotoRequest extends Request
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
        $rules = [
        'featured' => 'required|image',
        'project_id' => 'required'
        ];

        $nbr = count(Input::file('photo')) - 1;
        foreach(range(0, $nbr) as $index) {
            $rules['photo.' . $index] = 'required|image';
        }

        return $rules;
    }
}
