@extends('layouts.app')
@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <h4>{{ $translation->key }}.{{ $translation->group }}</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbdoy>
            <tr>
              <th>ID</th>
              <td>{{ $translation->id }}</td>
            </tr>
            <tr>
              <th>Group</th>
              <td>{{ $translation->group }}</td>
            </tr>
            <tr>
              <th>Key</th>
              <td>{{ $translation->key }}</td>
            </tr>
            <tr>
              <th>Text</th>
              <td>
                @foreach($translation->text as $key => $text)
                  <strong>{{ strtoupper($key) }}</strong> : <p>{{ $text }}</p>
                @endforeach
              </td>
            </tr>
          </tbdoy>
        </table>
      </div>
    </div>
  </section>
@endsection
