@extends('admin.layouts.app')

@section('title') Language List @endsection

@section('content')


<div class="card basic-data-table">
<div class="col-12">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Language Lists</h6>
        @can('create languages')
        <a href="{{ route('admin.languages.create') }}" class="btn btn-primary btn-sm">+ Add</a>
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
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    @can('view languages')
                    <tr>
                        <td>
                            <div class="form-check style-check d-flex align-items-center">
                                
                                <label class="form-check-label">
                                    {{ $loop->iteration }}
                                </label>
                            </div>
                        </td>
                        <td><a href="javascript:void(0)" class="text-primary-600">{{ $item->name }}</a></td>
                        
                        <td>
                            @if($item->status==1)
                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                            @else
                            <span class="bg-danger-focus text-light-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                            @endif
                        </td>

                        <td>
                            @can('view languages')
                            <a href="{{ route('admin.languages.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            @endcan
                            @can('edit languages')
                            <a href="{{ route('admin.languages.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            @endcan
                            @can('delete languages')
                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.languages.destroy', $item->id) }}" method="POST" style="display: none;">
                                @csrf @method('DELETE')
                            </form>
                            <a href="javascript:void(0)" data-id="{{ $item->id }}"
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