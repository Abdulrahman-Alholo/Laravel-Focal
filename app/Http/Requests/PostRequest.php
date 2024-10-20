<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        'title' => [
            'required',            // Ensure the field is present and not empty
            'string',              // Ensure it is a string
            'max:255',             // Limit the length of the title to 255 characters
            'unique:posts,title',  // Ensure the title is unique in the posts table
        ],
        'body' => [
            'required',            // Ensure the field is present and not empty
            'string',              // Ensure the body is a string
            'min:10',              // Minimum length for the body (you can adjust)
        ]
        ];
    }
}
