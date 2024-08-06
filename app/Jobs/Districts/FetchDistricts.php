<?php

namespace App\Jobs\Districts;

use App\Helpers\BpsApiHelper;
use App\Models\Province;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchDistricts implements ShouldQueue
{
    use Queueable;

    public function __construct(private $regency)
    {
    }

    public function handle(): void
    {
        $regency = $this->regency;
        $province = Province::findOrFail($regency->province_id);
        $districts = BpsApiHelper::get_districts($province->code, $regency->code);
        foreach ($districts as $code => $name) {
            WriteDistrict::dispatch($province, $regency->id, $code, $name);
        }
        sleep(1);
    }
}
