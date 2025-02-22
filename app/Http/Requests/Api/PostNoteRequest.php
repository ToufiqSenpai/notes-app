<?php

namespace App\Http\Requests\Api;

use App\Enums\NoteColors;
use App\Http\Requests\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostNoteRequest extends FormRequest
{
    use FailedValidation;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:99|unique:note,title',
            'content' => 'required|string|min:1',
            'color' => ['required', Rule::enum(NoteColors::class)]
        ];
    }
}
