@extends('admin.layouts.app')
@section('title') Password Update @endsection
@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Password Update - <span class="text-primary">{{auth()->guard('admin')->user()->name}}</span></h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Password Update</li>
    </ul>
</div>

<div class="row gy-4 pt-5">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Password Update</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.change.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="col-md-12">
                        <label class="form-label">Current Password</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="*******"
                                required>
                            @error('current_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">New Password</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="*******"
                                required>
                            @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Confirm Password</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="*******"
                                required>

                            @error('new_password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>



                    <div class="col-md-12 text-end">
                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:edit"></iconify-icon>
                            </span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection