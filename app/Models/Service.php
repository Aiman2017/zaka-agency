<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        // ADMISSION
        'admission_label',
        'admission_title',
        'admission_description',
        'admission_feature1_title',
        'admission_feature1_text',
        'admission_feature2_title',
        'admission_feature2_text',
        'admission_feature3_title',
        'admission_feature3_text',
        'admission_button_text',
        'admission_button_link',
        'admission_step1_title',
        'admission_step1_text',
        'admission_step2_title',
        'admission_step2_text',
        'admission_step3_title',
        'admission_step3_text',

        // AIRPORT
        'airport_label',
        'airport_title',
        'airport_description',
        'airport_feature1_title',
        'airport_feature1_text',
        'airport_feature2_title',
        'airport_feature2_text',
        'airport_feature3_title',
        'airport_feature3_text',
        'airport_button_text',
        'airport_button_link',
        'airport_included1_icon',
        'airport_included1_text',
        'airport_included2_icon',
        'airport_included2_text',
        'airport_included3_icon',
        'airport_included3_text',
        'airport_included4_icon',
        'airport_included4_text',

        // ACCOMMODATION
        'accommodation_label',
        'accommodation_title',
        'accommodation_description',
        'accommodation_feature1_title',
        'accommodation_feature1_text',
        'accommodation_feature2_title',
        'accommodation_feature2_text',
        'accommodation_feature3_title',
        'accommodation_feature3_text',
        'accommodation_button_text',
        'accommodation_button_link',
        'housing_option1_icon',
        'housing_option1_title',
        'housing_option1_subtitle',
        'housing_option1_popular',
        'housing_option2_icon',
        'housing_option2_title',
        'housing_option2_subtitle',
        'housing_option2_popular',
        'housing_option3_icon',
        'housing_option3_title',
        'housing_option3_subtitle',
        'housing_option3_popular',
        'housing_option4_icon',
        'housing_option4_title',
        'housing_option4_subtitle',
        'housing_option4_popular',

        // CONSULTATION
        'consultation_label',
        'consultation_title',
        'consultation_subtitle',
        'consultation_card1_icon',
        'consultation_card1_title',
        'consultation_card1_text',
        'consultation_card2_icon',
        'consultation_card2_title',
        'consultation_card2_text',
        'consultation_card3_icon',
        'consultation_card3_title',
        'consultation_card3_text',
        'consultation_card4_icon',
        'consultation_card4_title',
        'consultation_card4_text',

        // CTA
        'cta_title',
        'cta_subtitle',
        'cta_button_text',
        'cta_button_link',
    ];

    protected $casts = [
        'housing_option1_popular' => 'boolean',
        'housing_option2_popular' => 'boolean',
        'housing_option3_popular' => 'boolean',
        'housing_option4_popular' => 'boolean',
    ];

  
}
