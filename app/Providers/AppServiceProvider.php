<?php

namespace App\Providers;

use App\Models\DocumentVersion; // 🚀 Importante
use App\Observers\DocumentVersionObserver; // 🚀 Importante
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 🔥 Vinculación obligatoria del Modelo con su Observer
        DocumentVersion::observe(DocumentVersionObserver::class);
    }
}