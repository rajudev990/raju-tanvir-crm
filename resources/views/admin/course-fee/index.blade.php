@extends('admin.layouts.app')

@section('title') Course Fees @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Course Fees Lists</h6>
        @can('create coursefee')
        <a href="{{ route('admin.course-fees.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        @endcan
    </div>
        <div class="card-body">
            <div class="table-responsive">
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

                            <th>
                                Group
                            </th>
                            <th>Qualification</th>

                            <th>Contract</th>

                            <th>Course</th>

                            <th>Status</th>

                            <th>
                                Action
                            </th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        @can('view coursefee')
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    
                                    <label class="form-check-label">
                                        {{ $loop->iteration }}
                                    </label>
                                </div>
                            </td>

                            <td>
                                {{ $item->groupyear?->name }}
                            </td>

                            <td>
                                {{ $item->qualification?->name }}
                            </td>

                            <td>
                                <p>
                                    @if($item->contract==1)
                                    <span>Annually - 1 Payments</span>
                                    @elseif($item->contract==2)
                                    <span>Termly - 3 Payments</span>
                                    @else
                                    <span>Monthly - 10 Payments</span>
                                    @endif
                                </p>
                                <p>
                                    Contact Year : {{ $item->contract_year }}
                                </p>
                            </td>


                            <td>
                                <p>Course Fees : {{ $item->course_fee }}</p>
                                <p>Application Process Fees : {{ $item->application_process_fee }}</p>
                                <p>Deposit Fees : {{ $item->deposit_fee }}</p>
                                <p>Admission Fees : {{ $item->admission_fee }}</p>
                                <p>Saving (%) : {{ $item->saving }}</p>
                            </td>
                           

                            <td>
                                @if($item->status==1)
                                <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                @else
                                <span class="bg-danger-focus text-light-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                                @endif
                            </td>

                            <td>
                                @can('view coursefee')
                                <a href="{{ route('admin.course-fees.edit', $item->id) }}"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                @endcan
                                @can('edit coursefee')
                                <a href="{{ route('admin.course-fees.edit', $item->id) }}"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                @endcan
                                @can('delete coursefee')
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.course-fees.destroy', $item->id) }}" method="POST" style="display: none;">
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