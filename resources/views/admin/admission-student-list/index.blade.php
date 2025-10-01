@extends('admin.layouts.app')

@section('title') Admission Student List @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Admission Student List</h6>
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

                            <th>Parents Info</th>
                            <!-- <th>Student Info</th> -->

                
                            <th>
                                Action
                            </th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)

                        @if($item->email)
                       
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    
                                    <label class="form-check-label">
                                        {{ $loop->iteration }}
                                    </label>
                                </div>
                            </td>

                            <td>
                                <p class="mb-0"><b>Name : </b>{{ $item->title }} {{ $item->first_name }} {{ $item->last_name }}</p>
                                <p class="mb-0"><b>Email : </b>{{ $item->email }}</p>
                                <p class="mb-0"><b>Phone : </b>{{ $item->contact_number_code }} {{ $item->contact_number}}</p>
                                <p class="mb-0"><b>Country : </b>{{ $item->country }}, City : {{ $item->city }}, Post : {{ $item->postal_code }}</p>
                                <p class="mb-0"><b>Address One : </b>{{ $item->address_one }}</p>
                                <p class="mb-0"><b>Address Two : </b>{{ $item->address_two }}</p>
                                <p class="mb-0"><b>Total Child : </b>{{ $item->total_students }}</p>
                                <p class="mb-0"><b>Time Table : </b>{{ $item->time_table }}</p>
                            </td>

                            {{--<td>
                                @foreach($item->students as $student)
                                <p class="mb-0"><b>Serial : </b>{{ $student->student_serial }}</p>
                                <p class="mb-0"><b>Name : </b>{{ $student->first_name }} {{ $student->last_name }}</p>
                                <p class="mb-0"><b>DOB : </b>{{ $student->dob }}</p>
                                <p class="mb-0"><b>Country : </b>{{ $student->country }}</p>
                                <p class="mb-0"><b>Start Date : </b>{{ $student->start_date }}</p>
                                <br>
                                @endforeach
                            </td>--}}

                           
                            <td>
                               
                                <a href="{{ route('admin.admission-student-list.show', $item->id) }}"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                               
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.admission-student-list.destroy', $item->id) }}" method="POST" style="display: none;">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                    class="delete-btn w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                                
                            </td>
                        </tr>
                        @endif
                       
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