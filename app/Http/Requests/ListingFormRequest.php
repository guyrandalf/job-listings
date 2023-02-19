<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListingFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [
            'title' => 'required' . $this->listing,
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'logo' => ['mimes:jpg,png,jpeg', 'max:5048'],
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ];

        if (in_array($this->method(), ['POST'])) {
            $rules['logo'] = ['required', 'mimes:jpg,png,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
