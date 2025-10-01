@extends('admin.layouts.app')

@section('title') Open Event-Items List @endsection

@section('content')

<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0"> Open Event-Items Lists</h6>

            <a href="{{ route('admin.open-event-items.create') }}" class="btn btn-primary btn-sm">+ Add</a>

        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">
                             S.L
                        </th>
                        <th scope="col">Open Event</th>
                        <th scope="col">Title</th>
                        <!-- <th scope="col">Time</th> -->
                        <th scope="col">Years</th>
                        <th scope="col">Minutes</th>
                        <!-- <th scope="col">Image</th> -->
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)

                    <tr>
                        <td>
                             {{ $loop->iteration }}
                        </td>
                        <td>{{ $item->openevent?->name }}</td>
                        <td>{{ $item->title }}</td>
                        <!-- <td>{{ $item->time }}</td> -->
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->minutes }}</td>
                        <!-- <td>
                            @if($item->image)
                            <img src="{{Storage::url($item->image)}}" width="70px" height="70px">
                            @endif
                        </td> -->
                       
                        <td>
                            @if($item->status==1)
                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                            @else
                            <span class="bg-danger-focus text-light-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('admin.open-event-items.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>


                            <a href="{{ route('admin.open-event-items.edit', $item->id) }}"
                                class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>


                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.open-event-items.destroy', $item->id) }}" method="POST" style="display: none;">
                                @csrf @method('DELETE')
                            </form>
                            <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                            </a>

                        </td>
                    </tr>

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