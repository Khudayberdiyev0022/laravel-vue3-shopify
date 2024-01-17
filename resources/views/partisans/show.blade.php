@extends('layouts.app')
@section('content')

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="title">{{ __('main.info') }}</h4>
      <form action="{{ route('partisans.delete', $partisan->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('are_you_sure')">
          <i class="fas fa-trash"></i>
          {{ __('main.delete') }}
        </button>
      </form>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>{{ __('main.name') }}</th>
            <td> {{ $partisan->title }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
