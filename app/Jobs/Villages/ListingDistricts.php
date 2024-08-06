<?php

namespace App\Jobs\Villages;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ListingDistricts implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $districts = District::with('region', 'province', 'regency')->get();
        foreach ($districts as $district) {
            FetchVillages::dispatch($district);
        }
    }
}
