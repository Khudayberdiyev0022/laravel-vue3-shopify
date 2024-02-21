<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallRegionsCommand extends Command
{

  protected $signature   = 'install:regions';
  protected $description = 'Установка регионов';

  public function handle(): void
  {
    $this->installRegions();
    $this->installCities();
//    $this->installDistricts();
    $this->info('Установка регионов...');
  }

  private function installRegions(): void
  {
    $filepath = public_path('files/csv/regions.csv');
    $regions  = csvToArray($filepath);
    $data     = [];
    foreach ($regions as $key => $region) {
      unset($region['name_oz']);
      $data['title'] = json_encode(["uz" => $region['name_uz'] ,"ru" => $region['name_ru']], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      $data['id'] = ++$key;

      \App\Models\Region::query()->upsert($data, 'id');
    }
  }
  private function installCities(): void
  {
    $filepath = public_path('files/csv/cities.csv');
    $cities   = csvToArray($filepath);
    $data     = [];
    foreach ($cities as $key => $city) {

      unset($city['name_oz']);
      $data['region_id'] = $city['region_id'];
      $data['title']     = json_encode(["uz" => $city['name_uz'], "ru" => $city['name_ru']], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      $data['id'] = ++$key;

      \App\Models\City::query()->upsert($data, 'id');
    }

  }
//  private function installDistricts(): void
//  {
//    $filename  = public_path('files/csv/districts.csv');
//    $districts = csvToArray($filename);
//    $data      = [];
//
//    if (is_array($districts)) {
//      foreach ($districts as $key => $district) {
//        unset($district['name_oz']);
//        $data['city_id'] = $district['city_id'];
//        $data['title']   = json_encode(["uz" => $district['name_uz'], "ru" => $district['name_ru']], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
//
//        \App\Models\District::query()->upsert($data, 'id');
//      }
//    }
//  }
}
