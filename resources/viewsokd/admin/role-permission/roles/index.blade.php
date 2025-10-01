@extends('admin.layouts.app')

@section('title') Roles List @endsection

@section('content')


<div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Roles Lists</h6>
        @can('create role')
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        @endcan
    </div>


    <div class="card-body">
        <table class="table bordered-table mb-0" data-page-length='10'>
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                S.L
                            </label>
                        </div>
                    </th>
                    <th scope="col">Role</th>
                    <th scope="col" style="width: 300px;">Permissions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                @can('view role')
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td><a href="javascript:void(0)" class="text-primary-600">{{ $role->name }}</a></td>
                    <td>
                        @foreach($role->permissions as $permission)
                        <span class="badge bg-primary me-1">{{ $permission->name }}</span>
                        @endforeach
                    </td>

                    <td>
                        @can('view role')
                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                            class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>
                        @endcan
                        @can('edit role')
                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        @endcan
                        @can('delete role')
                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                        <a href="javascript:void(0)" data-id="{{ $role->id }}"
                            class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                        @endcan
                    </td>
                </tr>
                @endcan
                @endforeach



            </tbody>
        </table>
    </div>
</div>
@section('script')
<script>
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this item?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-' + id).submit();
            }
        });
    });
</script>
@endsection
@endsection