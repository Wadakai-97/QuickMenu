@if (session('failed_message'))
    <div class="alert alert-danger text-center">
        {{ session('failed_message') }}
    </div>
@endif
