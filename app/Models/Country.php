<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'sort_order',
        'flag',
        'tab_name',
        'title',
        'desc_1',
        'desc_2',
        'universities',
        'fact_1_value',
        'fact_1_label',
        'fact_2_value',
        'fact_2_label',
        'fact_3_value',
        'fact_3_label',
        'services',
        'apply_btn_text',
        'is_active',
    ];

    protected $casts = [
        'services'  => 'array',
        'is_active' => 'boolean',
    ];

    public function universitiesList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->universities ?? ''))));
    }
}
