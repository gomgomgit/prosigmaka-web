<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about-proweb', function (): void {
    $this->info('ProSigmaka Laravel Filament landing page CMS.');
})->purpose('Show the ProWeb project note');
