@extends('admin.layouts.app')

@section('title') Add User @endsection

@section('content')


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Add Users</h5>
        @can('view role')
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-12">
                <label class="form-label">Name</label>
                <div class="icon-field has-validation">
                    <span class="icon">
                        <iconify-icon icon="solar:user-circle-outline"></iconify-icon>
                    </span>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        required placeholder="Jhon Due">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">Email</label>
                <div class="icon-field has-validation">
                    <span class="icon">
                        <iconify-icon icon="solar:letter-outline"></iconify-icon>
                    </span>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        required placeholder="example@gmail.com">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Password</label>
                <div class="icon-field has-validation">
                    <span class="icon">
                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                    </span>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="*******"
                        required>
                    @error('password')
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
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="*******"
                        required>

                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold mb-2">Assign Roles</label>
                <div class="row g-2">
                    @foreach($roles as $role)
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input mt-1" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                id="role_{{ $role->id }}"
                                {{ isset($userRoles) && in_array($role->name, $userRoles) ? 'checked' : '' }}>
                            <label class="form-check-label ms-1" for="role_{{ $role->id }}">
                                {{ ucwords(str_replace('_', ' ', $role->name)) }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @error('roles')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>






            <div class="col-md-12 text-end">
                @can('view role')
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Save</button>
            </div>
        </form>
    </div>
</div>
@endsection