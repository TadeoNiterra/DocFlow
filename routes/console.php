<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('ad:recertificar')
    ->cron('0 6 1 1,4,7,10 *')
    ->withoutOverlapping()
    ->appendOutputTo(storage_path('logs/recertificacion_ad.log'));