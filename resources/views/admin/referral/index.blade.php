@extends('admin.layouts.app')

@section('title')Referral Form @endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-cyan">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-primary mb-0">Enquire Now Form</h5>
                </div>
                <div class="card-body">

                    {{-- Search Box --}}
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="text" id="tableSearch" class="form-control w-auto" placeholder="Search...">
                        <input type="hidden" id="allData" value='@json($allData)' />
                    </div>

                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date Submitted</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($paginatedData as $entry)
                            <tr>
                                <td>#Entry-{{ $entry->entry_id }}</td>
                                <td>{{ $entry->submission_date }}</td>
                                <td>{{ $entry->fname ?? '' }}</td>
                                <td>{{ $entry->lname ?? '' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.referrals.show', $entry->id) }}" class="btn btn-sm btn-primary">View</a>

                                    {{-- Delete Button --}}
                                    <a href="javascript:void(0);"
                                        data-id="{{ $entry->id }}"
                                        class="btn btn-sm btn-danger delete-btn">Delete</a>

                                    {{-- Hidden Form --}}
                                    <form id="delete-form-{{ $entry->id }}"
                                        action="{{ route('admin.referrals.destroy', $entry->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{-- Pagination Links --}}
                    <div class="mt-3 d-flex justify-content-end">
                        <ul class="pagination">
                            <li class="page-item {{ $paginatedData->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $paginatedData->previousPageUrl() }}">Previous</a>
                            </li>

                            @for ($i = 1; $i <= $paginatedData->lastPage(); $i++)
                                <li class="page-item {{ $paginatedData->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $paginatedData->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor

                                <li class="page-item {{ $paginatedData->currentPage() == $paginatedData->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $paginatedData->nextPageUrl() }}">Next</a>
                                </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
    const allData = JSON.parse(document.getElementById('allData').value);
    const tbody = document.getElementById('tableBody');
    const searchBox = document.getElementById('tableSearch');

    searchBox.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase().trim();

        if (!filter) {
            // খালি থাকলে আবার reload (pagination অনুযায়ী)
            window.location.reload();
            return;
        }

        const filtered = allData.filter(entry => {
            // search করার জন্য available fields একসাথে join করা হচ্ছে
            const searchable = `
                ${entry.entry_id ?? ''} 
                ${entry.submission_date ?? ''} 
                ${entry.fname ?? ''} 
                ${entry.lname ?? ''} 
                ${entry.email ?? ''} 
                ${entry.mobile_number ?? ''} 
                ${entry.address ?? ''} 
                ${entry.student_fname ?? ''} 
                ${entry.student_lname ?? ''} 
                ${entry.student_country ?? ''} 
                ${entry.details1 ?? ''} 
                ${entry.details2 ?? ''} 
                ${entry.details3 ?? ''} 
                ${entry.details4 ?? ''}
            `.toLowerCase();

            return searchable.includes(filter);
        });

        // টেবিল ক্লিয়ার
        tbody.innerHTML = '';

        if (filtered.length === 0) {
            tbody.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No records found</td></tr>`;
            return;
        }

        // ফিল্টার করা ডেটা টেবিলে দেখানো
        filtered.forEach(entry => {
            tbody.innerHTML += `
                <tr>
                    <td>#Entry-${entry.entry_id}</td>
                    <td>${entry.submission_date ?? ''}</td>
                    <td>${entry.fname ?? ''}</td>
                    <td>${entry.lname ?? ''}</td>
                    <td class="text-center">
                        <a href="/admin/referrals/${entry.id}" class="btn btn-sm btn-primary">View</a>
                        <a href="/admin/referrals/${entry.id}" data-id="${entry.id}" class="btn btn-sm btn-danger delete-btn">Delete</a>
                        <form id="delete-form-${entry.id}" 
                              action="/admin/referrals/${entry.id}" 
                              method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            `;
        });
    });

    // Delete confirmation
    $(document).on('click', '.delete-btn', function(e) {
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