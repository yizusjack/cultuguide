<?php

use Illuminate\Foundation\Inspiring;
use App\Console\Commands\SendReminder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\SendModiNotification;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(SendModiNotification::class)->twiceMonthly(1, 16, '08:00');

Schedule::command(SendReminder::class)->daily();	
