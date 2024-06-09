<form action="{{ route('users.update.status') }}" method="POST" class="status-form" id="statusForm{{ $user->id }}">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <input type="hidden" name="status" value="{{ $user->status }}">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="hidden" name="status_hidden" value="{{ $user->status }}">
        <input type="checkbox" class="custom-control-input status-checkbox" id="customSwitch{{ $user->id }}" {{ $user->status == '1' ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch{{ $user->id }}"></label>
    </div>
</form>

<form action="{{ route('users.destroy', $user) }}" method="POST">
    <a href="{{ route('users.show', $user) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
</form>

