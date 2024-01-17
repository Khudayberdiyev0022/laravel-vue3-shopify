<div class="card-body">
  <table class="table table-bordered">
    <tbody>
    <tr>
      <th>#</th>
      <th>{{ __('main.groups') }}</th>
      <th>{{ __('main.key') }}</th>
      <th>{{ __('main.actions') }}</th>
    </tr>
    @foreach($translations as $translation)
      <tr>
        <td>{{ $translation->id }}</td>
        <td>{{ $translation->group }}</td>
        <td>{{ $translation->key }}</td>
        <td class="d-flex">
          <a href="{{ route('translations.show', $translation->id) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-eye"></i></a>
          <a href="{{ route('translations.edit', $translation->id) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-pencil-alt"></i></a>
          <form action="{{ route('translations.destroy', $translation->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@if($translations->hasPages())
  <div class="card-footer">
    {{ $translations->appends(request()->all())->links() }}
  </div>
@endif
