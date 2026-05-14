<?php 
namespace App\Services\Front;
use Illuminate\Support\Collection;

class HomeCardService
{
    public function toHomeCards($services): Collection
    {
        return collect([
            [
                'title'       => $services->admission_label       ?? 'University Admission',
                'description' => $services->admission_description ?? 'Complete guidance...',
                'icon'        => 'bi-bank2',
                'link'        => $services->admission_button_link ?? '#',
                'link_text'   => $services->admission_button_text ?? 'Learn more',
            ],
            [
                'title'       => $services->airport_label         ?? 'Airport Transfer',
                'description' => $services->airport_description   ?? 'Safe and reliable...',
                'icon'        => 'bi-airplane',
                'link'        => $services->airport_button_link   ?? '#',
                'link_text'   => $services->airport_button_text   ?? 'Learn more',
            ],
            [
                'title'       => $services->accommodation_label       ?? 'Accommodation',
                'description' => $services->accommodation_description ?? 'Find comfortable...',
                'icon'        => 'bi-house',
                'link'        => $services->accommodation_button_link ?? '#',
                'link_text'   => $services->accommodation_button_text ?? 'Learn more',
            ],
            [
                'title'       => $services->consultation_label    ?? 'Consultation',
                'description' => $services->consultation_subtitle ?? 'Expert advice...',
                'icon'        => 'bi-chat-dots',
                'link'        => '#',
                'link_text'   => 'Learn more',
            ],
        ]);
    }
}