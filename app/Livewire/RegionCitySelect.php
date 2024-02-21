<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\District;
use App\Models\Region;
use Illuminate\View\View;
use Livewire\Component;

class RegionCitySelect extends Component
{
  public mixed $regions, $cities;
  public string          $selectedRegion = '';
  public string          $selectedCity = '';

  public function mount(): void
  {
    $this->regions = Region::all();
    $this->cities   = collect();
  }

  public function render(): View
  {
    return view('livewire.region-city-select');
  }

  public function updatedSelectedRegion($region): void
  {
    if (!is_null($region)) {
      $this->cities = City::query()->with('region')->where('region_id', $region)->get();
    }
  }
//  public function updatedSelectedCity($city): void
//  {
//    if (!is_null($city)) {
//      $this->districts = District::query()->with('city')->where('city_id', $city)->get();
//    }
//  }
}
