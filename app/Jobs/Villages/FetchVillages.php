<?php

namespace App\Jobs\Villages;

use App\Helpers\BpsApiHelper;
use App\Models\District;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FetchVillages implements ShouldQueue
{
    use Queueable;

    public function __construct(private District $district)
    {
    }

    public function handle(): void
    {
        $district = $this->district;
        $regency = $district->regency;
        $province = $district->province;
        $villages = BpsApiHelper::get_villages($province->code, $regency->code, $district->code);
        foreach ($villages as $code => $name) {
            WriteVillage::dispatch($province, $regency->id, $district->id, $code, $name);
        }
        sleep(1);
    }
}
