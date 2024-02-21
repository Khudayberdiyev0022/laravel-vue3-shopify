<div class="mt-2">
  @if(session()->has('message'))
    <div class="alert alert-info alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-bs-dismiss="alert">
          <span>×</span>
        </button>
        {{ session('message') }}
      </div>
    </div>
  @endif
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-bs-dismiss="alert">
          <span>×</span>
        </button>
        {{ session('success') }}
      </div>
    </div>
  @endif
  @if(session()->has('updated'))
    <div class="alert alert-primary alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-bs-dismiss="alert">
          <span>×</span>
        </button>
        {{ session('updated') }}
      </div>
    </div>
  @endif
  @if(session()->has('deleted'))
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-bs-dismiss="alert">
          <span>×</span>
        </button>
        {{ session('deleted') }}
      </div>
    </div>
  @endif
</div>
