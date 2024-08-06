<?php

namespace App\Jobs\Districts;

use App\Models\District;
use App\Models\Province;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Throwable;

class WriteDistrict implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private Province $province,
        private $regency_id,
        private $code,
        private $name
    ) {
    }

    public function handle(): void
    {
        DB::transaction(function () {
            try {
                District::firstOrCreate([
                    'region_id' => $this->province->region_id,
                    'province_id' => $this->province->id,
                    'regency_id' => $this->regency_id,
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