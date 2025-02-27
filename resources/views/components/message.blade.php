<!-- It's for success and error message -->
@if ('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ('error')
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
