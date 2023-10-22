<?php

namespace App\App\Dashboard\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:2'],
            'document' => ['required', 'numeric', 'unique:users,document', 'digits:11'],
            'email' => ['required', 'email:rfc', 'unique:users,email', 'max:254'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,11'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
