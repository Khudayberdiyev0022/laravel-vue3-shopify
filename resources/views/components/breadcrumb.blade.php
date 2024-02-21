<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6 pl-0">
        <h1 class="m-0">{{ $active }}</h1>
      </div>
      <div class="col-sm-6 pr-0">
        <ol class="breadcrumb float-sm-right">
          @if(!request()->routeIs('home'))
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('main.home') }}</a></li>
          @endif
          @if('parent') @stack('parent') @endif
          <li class="breadcrumb-item active">{{ $active ?? '' }}</li>
        </ol>
      </div>
    </div>
</div>
