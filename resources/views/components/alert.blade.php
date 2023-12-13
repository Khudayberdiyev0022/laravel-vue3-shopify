@if(session('message'))
  <div class="alert alert-info alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('message') }}
    </div>
  </div>
@endif
@if(session('success'))
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('success') }}
    </div>
  </div>
@endif
@if(session('updated'))
  <div class="alert alert-primary alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('updated') }}
    </div>
  </div>
@endif
@if(session('deleted'))
  <div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('deleted') }}
    </div>
  </div>
@endif
