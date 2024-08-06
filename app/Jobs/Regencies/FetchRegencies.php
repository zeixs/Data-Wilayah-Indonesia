<?php

namespace App\Jobs\Regencies;

use App\Helpers\BpsApiHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchRegencies implements ShouldQueue
{
    use Queueable;

    public function __construct(private $province)
    {
    }

    public function handle(): void
    {
        $province = $this->province;
        $regencies = BpsApiHelper::get_regencies($province->code);
        foreach ($regencies as $code => $name) {
            WriteRegency::dispatch($province, $code, $name);
        }
        sleep(1);
    }
}
