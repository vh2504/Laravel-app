@if(session('success'))
<div id="hide-alert" class="alert alert-dismissible fade show text-center mb-0 py-4" role="alert">
    <span class="font-weight-bold">{{ session('success') }}</span>
</div>
@endif
