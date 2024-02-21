<div>
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label class="required" for="region_id">{{ __('main.regions') }}</label>
        <select wire:model.live="selectedRegion" class="form-control custom-select @error("region_id") is-invalid @enderror" name="region_id" id="region_id">
          <option value="" selected>-- {{ __('main.choose_region') }} --</option>
          @foreach($regions as $region)
            <option value="{{ $region->id }}" >{{ $region->title }}</option>
          @endforeach
        </select>
        @error("region_id")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="col-6">
      @if (!is_null($selectedRegion))
        <div class="form-group">
          <label class="required" for="city_id">{{ __('main.city') }}</label>
          <select class="form-control custom-select  @error("city_id") is-invalid @enderror" name="city_id" id="city_id">
            <option value="" selected>-- {{ __('main.choose_city') }} --</option>
            @foreach($cities as $city)
              <option value="{{ $city->id }}"  >{{ $city->title }}</option>
            @endforeach
          </select>
          @error("city_id")
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      @endif
    </div>
{{--    <div class="col-4">--}}
{{--      @if (!is_null($selectedCity))--}}
{{--        <div class="form-group">--}}
{{--          <label for="district_id">{{ __('main.districts') }}</label>--}}
{{--          <select class="form-control custom-select" name="district_id" id="district_id">--}}
{{--            <option value="" selected>-- {{ __('main.choose_district') }} --</option>--}}
{{--            @foreach($districts as $district)--}}
{{--              <option value="{{ $district->id }}"  >{{ $district->title }}</option>--}}
{{--            @endforeach--}}
{{--          </select>--}}
{{--        </div>--}}
{{--      @endif--}}
{{--    </div>--}}
  </div>
</div>
