@extends('admin.layouts.app')

@section('title') Apply Now Form @endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-cyan">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-primary mb-0">Apply Now Entries</h5>
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
                                <th>Forename</th>
                                <th>Middle Names</th>
                                <th>Sure Names</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($paginatedData as $entry)
                         
                                <tr>
                                    <td>{{ $entry['entry_id'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($entry['date_created'])->format('M j, Y @ h:i A') }}</td>
                                    <td>{{ $entry['meta']['name-2'] ?? '' }}</td>
                                    <td>{{ $entry['meta']['name-3'] ?? '' }}</td>
                                    <td>{{ $entry['meta']['name-4'] ?? '' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.apply-now.view', $entry['entry_id']) }}" class="btn btn-sm btn-primary">View</a>
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
        const filter = this.value.toLowerCase();

        if (!filter) {
            // খালি থাকলে reload (pagination অনুযায়ী)
            window.location.reload();
            return;
        }

        const filtered = allData.filter(entry => {
            // meta values combined
            const metaValues = Object.values(entry.meta || {}).join(' ');
            const searchable = entry.entry_id + ' ' + entry.date_created + ' ' + metaValues;
            return searchable.toLowerCase().includes(filter);
        });

        tbody.innerHTML = '';

        filtered.forEach(entry => {
            // date format
            let date = new Date(entry.date_created);
            let formattedDate = date.toLocaleString('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            }).replace(',', ' @');

            tbody.innerHTML += `
                <tr>
                    <td>${entry.entry_id}</td>
                    <td>${formattedDate}</td>
                    <td>${entry.meta['name-2'] ?? ''}</td>
                    <td>${entry.meta['name-4'] ?? ''}</td>
                    <td class="text-center">
                        <a href="/admin/apply-now/view/${entry.entry_id}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            `;
        });
    });
</script>
@endsection