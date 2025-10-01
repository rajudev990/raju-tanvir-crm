@extends('admin.layouts.app')
@section('title') Profile Settings @endsection
@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Profile Update - <span class="text-primary">{{auth()->guard('admin')->user()->name}}</span></h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Profile Update</li>
    </ul>
</div>

<div class="row gy-4 pt-5">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Profile Update</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.profile.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label class="form-label">Name</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="f7:person"></iconify-icon>
                            </span>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                required value="{{ auth('admin')->user()->name }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <div class="icon-field has-validation">
                            <span class="icon">
                                <iconify-icon icon="mage:email"></iconify-icon>
                            </span>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth('admin')->user()->email }}"
                                required>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Profile</label>
                        <input class="form-control p-1" type="file" name="image" id="image" accept="image/*">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mt-2">
                            <img id="preview-image"
                                src="{{ auth('admin')->user()->image ? Storage::url(auth('admin')->user()->image) : '#' }}"
                                alt="Profile Image Preview"
                                width="120" height="120"
                                style="object-fit: cover; border-radius: 8px; display: {{ auth('admin')->user()->image ? 'block' : 'none' }};">
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
@section('script')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection
@endsection