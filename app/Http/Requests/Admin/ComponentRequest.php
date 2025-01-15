<?php

namespace App\Http\Requests\Admin;

use App\Rules\FileExists;
use App\Rules\IsVueFile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ComponentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'path' => ['required', 'string', new IsVueFile(), new FileExists()],
            'name' => ['required', 'string', new isVueFile()],
            'description' => ['required', 'string']
        ];
    }
}
