<?php

use App\Console\Commands\CheckQuantityCommand;
use App\Console\Commands\ReorderAutomatic;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::command(CheckQuantityCommand::class)->everyMinute();
Schedule::command(ReorderAutomatic::class)->everyMinute();
