<?php

namespace App\Jobs\Villages;

use App\Models\Province;
use App\Models\Village;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Throwable;

class WriteVillage implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private Province $province,
        private $regency_id,
        private $district_id,
        private $code,
        private $name
    ) {
    }

    public function handle(): void
    {
        DB::transaction(function () {
            try {
                Village::firstOrCreate([
                    'region_id' => $this->province->region_id,
                    'province_id' => $this->province,
                    'regency_id' => $this->regency_id,
                    'district_id' => $this->district_id,
                    "code" => $this->code,
                    "name" => $this->name
                ]);
            } catch (Throwable $exception) {
                DB::rollBack();
                throw $exception;
            }
        });
    }
}