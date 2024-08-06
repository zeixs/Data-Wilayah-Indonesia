<?php

namespace App\Jobs\Regencies;

use App\Models\Regency;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Throwable;

class WriteRegency implements ShouldQueue
{
    use Queueable;

    public function __construct(private $province, private $code, private $name)
    {
    }

    public function handle(): void
    {
        DB::transaction(function () {
            try {
                Regency::firstOrCreate([
                    'region_id' => $this->province->region_id,
                    'province_id' => $this->province->id,
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