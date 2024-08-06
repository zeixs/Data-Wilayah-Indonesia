<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('regions')->cascadeOnDelete();
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('regency_id')->constrained('regencies')->cascadeOnDelete();
            $table->string('code');
            $table->index('code');
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
