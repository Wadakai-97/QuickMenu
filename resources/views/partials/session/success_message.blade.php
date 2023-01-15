@if (session('success_message'))
    <div class="alert alert-success text-center">
        {{ session('success_message') }}
    </div>
@endif
