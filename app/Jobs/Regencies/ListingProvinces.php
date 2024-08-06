<?php

namespace App\Jobs\Regencies;

use App\Helpers\BpsApiHelper;
use App\Models\Province;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ListingProvinces implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $provinces = Province::get();
        foreach ($provinces as $province) {
            FetchRegencies::dispatch($province);
        }
    }
}
