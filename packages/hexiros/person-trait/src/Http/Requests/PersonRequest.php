<?php

namespace Hexiros\PersonTrait\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'suffix'            => ['nullable', 'string'],
            'first_name'        => ['required', 'string'],
            'middle_name'       => ['nullable', 'string'],
            'last_name'         => ['required', 'string'],
            'gender'            => ['nullable', 'in:male,female'],
            'birth_date'        => ['nullable', 'date'],
            'birth_place'       => ['nullable', 'string'],
            'nationality'       => ['nullable', 'string'],
            'religion'          => ['nullable', 'string'],
            'contact_number'    => ['nullable', 'numeric'],
        ];
    }
}
