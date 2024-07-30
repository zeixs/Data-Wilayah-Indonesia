<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class BpsApiHelper
{
    public static function get_all_provinces($year = null)
    {
        $params = [
            'lvl' => 10,
            'thn' => !is_null($year) ? $year : now()->year
        ];
        $request = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_pro', $params);
        return $request->object();
    }
    public static function get_regencies($province_code, $year = null)
    {
        $params = [
            'lvl' => 10,
            'pro' => $province_code,
            'thn' => !is_null($year) ? $year : now()->year
        ];
        $request = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_kab', $params);
        return $request->object();
    }
    public static function get_districts($province_code, $regency_code, $year = null)
    {
        $params = [
            'lvl' => 10,
            'pro' => $province_code,
            'kab' => $regency_code,
            'thn' => !is_null($year) ? $year : now()->year
        ];
        $request = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_kec', $params);
        return $request->object();
    }
    public static function get_villages($province_code, $regency_code, $district_code, $year = null)
    {
        $params = [
            'lvl' => 13,
            'lv2' => 14,
            'pro' => $province_code,
            'kab' => $regency_code,
            'kec' => $district_code,
            'thn' => !is_null($year) ? $year : now()->year
        ];
        $request = Http::get('https://sipedas.pertanian.go.id/api/wilayah/list_wilayah', $params);
        return $request->object();
    }
}