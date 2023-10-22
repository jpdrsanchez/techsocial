<?php

namespace App\App\Dashboard\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateCustomerRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
	public function rules(): array {
        return [
            'first_name'        => [ 'nullable', 'string', 'min:3' ],
            'last_name'         => [ 'nullable', 'string', 'min:2' ],
            'document'          => [ 'nullable', 'numeric', Rule::unique('users', 'document')->ignore($this->customer->id), 'digits:11' ],
            'email'             => [ 'nullable', 'email:rfc', Rule::unique('users', 'email')->ignore($this->customer->id), 'max:254' ],
            'phone_number'      => [ 'nullable', 'numeric', 'digits_between:10,11' ],
            'birth_date'        => [ 'nullable', 'date_format:Y-m-d' ],
            'password'          => [ 'nullable', Password::min(8)->letters()->mixedCase()->numbers()->symbols() ],
        ];
	}

    /**
     * Determine if the user is authorized to make this request.
     */
	public function authorize(): bool {
		return true;
	}
}
