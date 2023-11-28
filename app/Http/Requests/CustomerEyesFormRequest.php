<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerEyesFormRequest extends FormRequest
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
            'customer_id' =>[
                'required',
                'integer'
            ],
            'sph' =>[
                'required',
                'string'
            ],
            'cyl' =>[
                'required',
                'string'
            ],
            'axis' =>[
                'nullable',
                'string'
            ],
            'prism' =>[
                'nullable',
                'string'
            ],
            'add' =>[
                'nullable',
                'string'
            ]
        ];
    }
}
