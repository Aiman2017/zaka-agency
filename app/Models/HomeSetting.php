<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_desc',
        'hero_cta1_text',
        'hero_cta1_link',
        'hero_cta2_text',
        'hero_cta2_link',
        'hero_visual_title',
        'hero_visual_item1',
        'hero_visual_item2',
        'hero_visual_item3',
        'hero_visual_item4',
        'services_label',
        'services_title',
        'services_subtitle',
        'whyus_label',
        'whyus_title',
        'whyus_description',
        'whyus_feature1_icon',
        'whyus_feature1_title',
        'whyus_feature1_subtitle',
        'whyus_feature2_icon',
        'whyus_feature2_title',
        'whyus_feature2_subtitle',
        'whyus_feature3_icon',
        'whyus_feature3_title',
        'whyus_feature3_subtitle',
        'stat1_value',
        'stat1_label',
        'stat2_value',
        'stat2_label',
        'stat3_value',
        'stat3_label',
        'stat4_value',
        'stat4_label',
        'testimonials_label',
        'testimonials_title',
        'faq_label',
        'faq_title',
        'cta_title',
        'cta_subtitle',
        'cta_button1_text',
        'cta_button1_link',
        'cta_button2_text',
        'cta_button2_link',
    ];

}
