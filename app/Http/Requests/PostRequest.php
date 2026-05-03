<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $postId = $this->route('post')?->id;

        return [
            'title'        => 'required|string|max:255',
            'slug'         => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')->ignore($postId)],
            'excerpt'      => 'nullable|string|max:600',
            'body'         => 'required|string|min:10',
            'image'        => 'nullable|image|max:4096',
            'category'     => 'nullable|string|max:100',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
