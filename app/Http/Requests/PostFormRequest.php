<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostFormRequest extends FormRequest
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
            'title' => ['required', 'min:4', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'slug' => ['required', 'min:4', 'regex:/^[0-9a-z\-]+$/'],
            'content' => ['required', 'min:8'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags_id' => ['required', 'array', 'exists:tags,id']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}