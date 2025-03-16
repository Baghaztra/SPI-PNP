@extends('layouts.siwas')

@section('title', 'My Profile')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
</div>

<div class="row">
    <div class="col-xl-4">
        <!-- Profile Picture Card -->
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=ff6b2b&color=fff" 
                     class="rounded-circle img-thumbnail mb-3" 
                     style="width: 150px; height: 150px;">
                
                <h5 class="mb-0">John Doe</h5>
                <p class="text-muted">Administrator</p>
                
                <button class="btn btn-primary btn-sm mt-2">
                    <i class="fas fa-camera me-2"></i>Change Photo
                </button>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <!-- Profile Details Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="John Doe" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="john@example.com" required>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h6 class="mb-3 font-weight-bold text-primary">Change Password</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 