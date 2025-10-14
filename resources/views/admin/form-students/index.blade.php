@extends('admin.layouts.app')

@section('title') Form Students @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title text-primary mb-0">Form Students Lists</h6>
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
                                School
                            </th>
                            <th>Name</th>

                            <th>Email</th>

                            <th>Phone</th>

                            <th>Total Amount</th>
                            <th>Paid Amount</th>

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
                                {{  $item->selected_school }}
                            </td>

                            <td>
                                {{ $item->title }} {{ $item->fname }} {{ $item->lname }}
                            </td>

                            <td>
                                {{ $item->email}}
                            </td>

                            <td>
                                {{ $item->mobile_number}}
                            </td>

                            <td>
                                @if($item->total_amount)
                                £{{ $item->total_amount}}
                                @else
                                <span>N/A</span>
                                @endif
                            </td>

                            <td>
                                @if($item->paid_amount)
                                £{{ $item->paid_amount}}
                                @else
                                <span>N/A</span>
                                @endif
                            </td>

                            <td>
                                @if($item->status=='paid')
                                <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                                @else
                                <span class="bg-danger-focus text-light-main px-24 py-4 rounded-pill fw-medium text-sm">In Progress</span>
                                @endif
                            </td>

                            <td>
                                @can('view coursefee')
                                <a href="{{ route('admin.form-students.edit', $item->id) }}"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                @endcan
                                @can('edit coursefee')
                                <a href="{{ route('admin.form-students.edit', $item->id) }}"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                @endcan
                                @can('delete coursefee')
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.form-students.destroy', $item->id) }}" method="POST" style="display: none;">
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