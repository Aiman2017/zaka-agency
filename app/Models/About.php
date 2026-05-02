<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        // Section 1: Who We Are
        'who_label',
        'who_title',
        'who_description_1',
        'who_description_2',
        'check1_text',
        'check2_text',
        'check3_text',
        'check4_text',

        // Section 2: Our Story
        'story_title',
        'story_description',
        'story_stat1_value',
        'story_stat1_label',
        'story_stat2_value',
        'story_stat2_label',
        'story_stat3_value',
        'story_stat3_label',

        // Section 3: Mission & Vision
        'mission_section_label',
        'mission_label',
        'mission_title',
        'mission_text',
        'mission_item1',
        'mission_item2',
        'mission_item3',
        'vision_title',
        'vision_text',
        'vision_item1',
        'vision_item2',
        'vision_item3',

        'stat1_number',
        'stat1_suffix',
        'stat1_text',
        'stat2_number',
        'stat2_suffix',
        'stat2_text',
        'stat3_number',
        'stat3_suffix',
        'stat3_text',
        'stat4_number',
        'stat4_suffix',
        'stat4_text',
    ];
}
