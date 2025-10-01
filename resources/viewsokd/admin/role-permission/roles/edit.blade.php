@extends('admin.layouts.app')

@section('title') Add Role @endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Update Roles</h5>

        @can('view role')
        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" value="{{ $role->name }}" novalidate action="{{ route('admin.roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="col-md-12">
                <label class="form-label">Name</label>
                <div class="has-validation">
                    <input type="text" value="{{ $role->name }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        required placeholder="Role Name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12">
                <label class="form-label">Permissions</label>
                <div class="row mt-2">
                    @foreach($permissions as $permission)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox"
                                class="form-check-input permission-checkbox mt-1"
                                id="permission_{{ $permission->id }}"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                            <label class="form-check-label ms-1" for="permission_{{ $permission->id }}">
                                {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

                @error('permissions')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>




            <div class="col-md-12 text-end">
                @can('view role')
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Update</button>
            </div>
        </form>
    </div>
</div>

@endsection