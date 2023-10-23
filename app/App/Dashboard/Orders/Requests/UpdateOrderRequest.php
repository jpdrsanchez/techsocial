<?php

namespace App\App\Dashboard\Orders\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['sometimes', 'string', 'min:1'],
            'quantity' => ['sometimes', 'integer'],
            'price' => ['sometimes', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
