<?php

namespace App\Jobs\Province;

use App\Helpers\BpsApiHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchProvinces implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $provinces = BpsApiHelper::get_all_provinces();
        foreach ($provinces as $code => $province) {
            WriteProvince::dispatch($code, $province);
        }
    }
}
