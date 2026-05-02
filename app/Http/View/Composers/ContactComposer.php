<?php

namespace App\Http\View\Composers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactComposer
{
    /**
     * Привязка данных к представлению.
     */
    public function compose(View $view): void
    {
  
        $view->with('contactInfo', Contact::first());
    }
}