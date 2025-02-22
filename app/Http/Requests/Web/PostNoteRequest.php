<?php

namespace App\Http\Requests\Web;

use App\Enums\NoteColors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
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
            'content' => 'required|string|min:1|max:99999',
            'color' => ['required', 'string', 'min:1', 'max:99', Rule::enum(NoteColors::class)]
        ];
    }
}
