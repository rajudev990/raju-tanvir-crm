@extends('admin.layouts.app')

@section('title') User List @endsection

@section('content')


<div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">User Lists</h6>
        @can('create user')
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        @endcan
    </div>

    <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check style-check d-flex align-items-center">
                           
                            <label class="form-check-label">
                                S.L
                            </label>
                        </div>
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @can('view user')
                <tr>
                    <td>
                        <div class="form-check style-check d-flex align-items-center">
                           
                            <label class="form-check-label">
                                {{ $loop->iteration }}
                            </label>
                        </div>
                    </td>
                    <td><a href="javascript:void(0)" class="text-primary-600">{{ $user->name }}</a></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admni/') }}/assets/images/user-list/user-list1.png" alt=""
                                class="flex-shrink-0 me-12 radius-8">
                            <h6 class="text-md mb-0 fw-medium flex-grow-1">{{ $user->email }}</h6>
                        </div>
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                        <span class="badge bg-info me-1">{{ $role->name }}</span>
                        @endforeach
                    </td>

                    <td>
                        @can('view user')
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>
                        @endcan
                        @can('edit user')
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        @endcan
                        @can('delete user')
                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                        <a href="javascript:void(0)" data-id="{{ $user->id }}"
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