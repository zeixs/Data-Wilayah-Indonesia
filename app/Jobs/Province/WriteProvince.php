<?php

namespace App\Jobs\Province;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Throwable;

class WriteProvince implements ShouldQueue
{
    use Queueable;

    public function __construct(private $code, private $name)
    {
    }

    public function handle(): void
    {
        DB::transaction(function () {
            try {
                $code = $this->code;
                if ($code >= 10 && $code < 20) {
                    $region = Region::where('code', 10)->first();
                }
                if ($code >= 20 && $code < 30) {
                    $region = Region::where('code', 20)->first();
                }
                if ($code >= 30 && $code < 40) {
                    $region = Region::where('code', 30)->first();
                }
                if ($code >= 50 && $code < 60) {
                    $region = Region::where('code', 50)->first();
                }
                if ($code >= 60 && $code < 70) {
                    $region = Region::where('code', 60)->first();
                }
                if ($code >= 70 && $code < 80) {
                    $region = Region::where('code', 70)->first();
                }
                if ($code >= 80 && $code < 90) {
                    $region = Region::where('code', 80)->first();
                }
                if ($code >= 90 && $code < 100) {
                    $region = Region::where('code', 90)->first();
                }

                Province::firstOrCreate([
                    'region_id' => $region->id,
                    'code' => $this->code,
                    'name' => $this->name
                ]);
            } catch (Throwable $exception) {
                DB::rollBack();
                throw $exception;
            }
        });
    }
}
