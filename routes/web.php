<?php

use App\Helpers\BpsApiHelper;
use App\Jobs\Districts\ListingRegencies;
use App\Jobs\Province\FetchProvinces;
use App\Jobs\Regencies\ListingProvinces;
use App\Jobs\Villages\ListingDistricts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('provinces', function () {
    FetchProvinces::dispatch();
    // $provinces = BpsApiHelper::get_all_provinces();
    // foreach ($provinces as $code => $name) {
    //     if ($code >= 90 && $code < 100) {
    //         $region = Region::where('code', 90)->first();
    //         dd([
    //             'code' => $code,
    //             'province' => $name,
    //             'region' => $region->name
    //         ]);
    //     }
    // }
});

Route::get('regencies', function () {
    ListingProvinces::dispatch();
});

Route::get('districts', function () {
    ListingRegencies::dispatch();
});

Route::get('villages', function () {
    ListingDistricts::dispatch();
});