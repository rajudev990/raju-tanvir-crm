@extends('admin.layouts.app')

@section('title') Job Applications Form @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-cyan">
                <div class="card-header">
                    <h5 class="card-title text-primary mb-0">Job Applications Form</h5>
                </div>
                <div class="card-body">

                    {{-- Search Box --}}
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="text" id="tableSearch" class="form-control w-auto" placeholder="Search...">
                        <input type="hidden" id="allData" value='@json($allData)' />
                    </div>

                    <table class="table table-bordered mb-0" id="jobapplication">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Submission Date</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($data->items() as $index => $submission)
                            <tr>
                                <td style="width: 30%;">{{ $submission['name'] ?? '' }}</td>
                                <td>{{ $submission['email'] ?? '' }}</td>
                                <td>{{ $submission['created_at'] ?? '' }}</td>
                                <td>{{ $submission['field_a8c4c14'] ?? '' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.job.application.view', $submission['id']) }}" class="btn btn-sm btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination Links --}}
                    <div class="mt-3 d-flex justify-content-end">
                        <ul class="pagination">
                            {{-- Previous --}}
                            <li class="page-item {{ $data->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                            </li>

                            {{-- Page Numbers --}}
                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            {{-- Next --}}
                            <li class="page-item {{ $data->currentPage() == $data->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
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
        let filter = this.value.toLowerCase();

        if (filter === "") {
            // খালি থাকলে reload (paginate as usual)
            window.location.reload();
            return;
        }

        // ✅ সব data filter করবো
        let filtered = allData.filter(item => {
            return Object.values(item).join(" ").toLowerCase().includes(filter);
        });

        // ✅ পুরা table clear
        tbody.innerHTML = "";

        // ✅ filter করা data render করবো (paginate বাদ দিয়ে full দেখানো যাবে)
        filtered.forEach((submission, index) => {
            tbody.innerHTML += `
                <tr>
                    <td style="width: 30%;">${submission.name ?? ''}</td>
                    <td>${submission.email ?? ''}</td>
                    <td>${submission.created_at ?? ''}</td>
                    <td>${submission.field_a8c4c14 ?? ''}</td>
                    <td class="text-center">
                        <a href="/admin/job-applications/view/${submission.id}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            `;
        });
    });
</script>

@endsection