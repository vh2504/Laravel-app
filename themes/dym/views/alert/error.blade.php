@if(session('error'))
<div class="col-12 text-center mb-4">
    <div class="form-text invalid-feedback d-block" role="alert">
        {{ session('error') }}
    </div>
</div>
@endif
