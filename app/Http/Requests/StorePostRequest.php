<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Title' => 'required|string|min:4',
            'Body' => ['required', 'string', 'min:2']
        ];
    }
    public function messages()
    {
        return [
            'Title.required' => 'Title is required.',
            'Title.string' => 'Title must be valid string',
            'Title.min' => 'Title must be at least :min characters',
        ];
    }
}
