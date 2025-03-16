@extends('layouts.siwas')

@section('title', 'Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Settings</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="Admin Dashboard" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="site_description" class="form-label">Site Description</label>
                            <input type="text" class="form-control" id="site_description" name="site_description" value="Admin Dashboard Description">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="primary_color" class="form-label">Primary Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color" id="primary_color" name="primary_color" value="#ff6b2b">
                                <input type="text" class="form-control" value="#ff6b2b">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="accent_color" class="form-label">Accent Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color" id="accent_color" name="accent_color" value="#4f46e5">
                                <input type="text" class="form-control" value="#4f46e5">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h6 class="mb-3 font-weight-bold text-primary">Contact Information</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" value="contact@example.com">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="contact_phone" class="form-label">Contact Phone</label>
                            <input type="tel" class="form-control" id="contact_phone" name="contact_phone" value="+1234567890">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">123 Street Name, City, Country</textarea>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.input-group').forEach(group => {
    const colorInput = group.querySelector('input[type="color"]');
    const textInput = group.querySelector('input[type="text"]');
    
    colorInput.addEventListener('input', (e) => {
        textInput.value = e.target.value;
    });
    
    textInput.addEventListener('input', (e) => {
        colorInput.value = e.target.value;
    });
});
</script>
@endpush 