@if(session()->has('success'))
    <div class="alert  my-3 alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert  my-3 alert-warning">
        {{ session()->get('warning') }}
    </div>
@endif

@if(session()->has('danger'))
    <div class="alert  my-3 alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

@if(session()->has('info'))
    <div class="alert  my-3 alert-info">
        {{ session()->get('info') }}
    </div>
@endif

@if(session()->has('dark'))
    <div class="alert  my-3 alert-dark">
        {{ session()->get('dark') }}
    </div>
@endif

