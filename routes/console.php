<?php

use App\Models\PhilanthropyItem;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Synchroniser statut/active des pages philanthropy dont la date de clôture est dépassée (quotidien à 00:05)
Schedule::call(function () {
    PhilanthropyItem::syncClosingDates();
})->dailyAt('00:05')->name('philanthropy:sync-closing-dates');
