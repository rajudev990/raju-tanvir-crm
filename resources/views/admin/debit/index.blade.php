@extends('admin.layouts.app')

@section('title') Debit Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-primary mb-0">Debit Lists</h6>
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
                        <th scope="col">Forename</th>
                        <th scope="col">Surename</th>
                        <th scope="col">Country</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Debit Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    
                    <tr>
                        <td>
                            <div class="form-check style-check d-flex align-items-center">
                               
                                <label class="form-check-label">
                                    {{ $loop->iteration }}
                                </label>
                            </div>
                        </td>
                        <td>{{ $item->forename }}</td>
                        <td>{{ $item->surename }}</td>
                        <td>{{ $item->p_country }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->mobile_number }}</td>
                        <td>{{ $item->debit_date }}</td>
                
                        <td>
                           
                            <a href="{{ route('admin.debit-forms.show', $item->id) }}"
                                class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                            </a>
                          
                           
                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.debit-forms.destroy', $item->id) }}" method="POST" style="display: none;">
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