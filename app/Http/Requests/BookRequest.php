<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50',
            'publication' => 'required',
            'genre' => 'required|max:10|min:5'
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'Il titolo deve essere inserito',
            'title.max' => 'Il titolo deve avere massimo 50 caratteri',
            'genre.required' => 'La categoria deve essere inserita',
            'genre.max' => 'La categoria deve avere massimo 20 caratteri'
        ];
    }
}
