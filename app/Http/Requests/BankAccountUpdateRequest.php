<?php

namespace CodeLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CodeLaravelVue\Http\Requests\BankAccountCreateRequest;

class BankAccountUpdateRequest extends BankAccountCreateRequest
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
        ];
    }
}
