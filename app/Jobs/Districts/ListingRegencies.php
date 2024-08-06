<?php

namespace App\Jobs\Districts;

use App\Models\Province;
use App\Models\Regency;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ListingRegencies implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $regencies = Regency::get();
        foreach ($regencies as $regency) {
            FetchDistricts::dispatch($regency);
        }
    }
}
