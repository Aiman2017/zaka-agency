<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active'   => $this->boolean('is_active'),
            'sort_order'  => (int) ($this->input('sort_order', 0)),
        ]);
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sort_order'    => 'integer|min:0',
            'flag'          => 'required|string|max:50',
            'tab_name'      => 'required|string|max:50',
            'title'         => 'required|string|max:255',
            'desc_1'        => 'required|string',
            'desc_2'        => 'sometimes|nullable|string',
            'universities'  => 'sometimes|nullable|string',
            'fact_1_value'  => 'sometimes|nullable|string|max:50',
            'fact_1_label'  => 'sometimes|nullable|string|max:100',
            'fact_2_value'  => 'sometimes|nullable|string|max:50',
            'fact_2_label'  => 'sometimes|nullable|string|max:100',
            'fact_3_value'  => 'sometimes|nullable|string|max:50',
            'fact_3_label'  => 'sometimes|nullable|string|max:100',
            'services'              => 'sometimes|nullable|array',
            'services.*.icon'       => ['sometimes', 'nullable', 'string', 'max:100', 'regex:/^bi-[a-z0-9\-]+$/'],
            'services.*.title'      => 'required_with:services.*|string|max:255',
            'services.*.desc'       => 'sometimes|nullable|string',
            'apply_btn_text'        => 'required|string|max:100',
            'is_active'             => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'required'                       => 'The :attribute field is required.',
            'max'                            => 'The :attribute may not exceed :max characters.',
            'services.*.title.required_with' => 'Each service must have a title.',
        ];
    }
}
