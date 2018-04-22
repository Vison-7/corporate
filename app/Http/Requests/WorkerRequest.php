<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       /* if(\Auth::check() ) */return true;
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
            'name' => 'required|max:255',
            'position_id' => 'required|integer',
            'department_id' => 'required|integer',
            'chief_id' => 'sometimes|required|integer',
            'since_date' => 'required',
            'search' => 'sometimes|min:3'
        ];
       
    }
}
