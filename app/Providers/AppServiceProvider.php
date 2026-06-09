<?php

namespace App\Providers;

 
use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('back.layouts.sidebar', function ($view) {
            $view->with('sidebarUnread', ContactMessage::where('is_read', false)->count());
        });
    }
}
