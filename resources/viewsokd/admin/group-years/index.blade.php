@extends('admin.layouts.app')

@section('title') Group Year List @endsection

@section('content')

<div class="col-12">
    <div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Group-Years Lists</h6>
        @can('create group-years')
        <a href="{{ route('admin.group-years.create') }}" class="btn btn-primary btn-sm">+ Add</a>
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
                        <th scope="col">List</th>
                        <th scope="col">Year</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    @can('view group')
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
                            <ul class="ms-2" style="list-style-type: disc;">
                                @if($item->list1)
                                <li>{{$item->list1}}</li>
                                @endif
                                @if($item->list2)
                                <li>{{$item->list2}}</li>
                                @endif
                                @if($item->list3)
                                <li>{{$item->list3}}</li>
                                @endif
                                @if($item->list4)
                                <li>{{$item->list4}}</li>
                                @endif
                            </ul>
                            
                        </td>

                        <td>
                            <ul class="ms-2" style="list-style-type: disc;">
                                @if($item->year1)
                                <li>{{$item->year1}}</li>
                                @endif
                                @if($item->year2)
                                <li>{{$item->year2}}</li>
                                @endif
                                @if($item->year3)
                                <li>{{$item->year3}}</li>
                                @endif
                                @if($item->year4)
                                <li>{{$item->year4}}</li>
                                @endif
                                @if($item->year5)
                                <li>{{$item->year5}}</li>
                                @endif
                                @if($item->year6)
                                <li>{{$item->year6}}</li>
                                @endif
                                @if($item->year7)
                                <li>{{$item->year7}}</li>
                                @endif
                                @if($item->year8)
                                <li>{{$item->year8}}</li>
                                @endif
                            </ul>
                            
                        </td>

                        <td>
                            @if($item->status==1)
                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                            @else
                            <span class="bg-danger-focus text-light-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                            @endif
                        </td>

                        <td>
                            @can('view group-years')
                            <a href="{{ route('admin.group-years.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                            @endcan
                            @can('edit group-years')
                            <a href="{{ route('admin.group-years.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            @endcan
                            @can('delete group-years')
                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.group-years.destroy', $item->id) }}" method="POST" style="display: none;">
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