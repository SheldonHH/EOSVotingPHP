<?php

namespace eosvoting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eosvotingRequest extends FormRequest
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
            'producer_name' => 'required',
            'organization_name' => 'required',
            'domain' => 'required',
            'location' => 'required',
            'http_port' => 'required',
            'p2p_port' => 'required',
            'website' => 'required',
            'public_key' => 'required'
        ];
    }
}
