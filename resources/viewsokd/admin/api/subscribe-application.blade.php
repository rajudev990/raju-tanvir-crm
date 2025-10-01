@extends('admin.layouts.app')

@section('title') Subscribe Applications Form @endsection

@section('content')


<div class="col-12">
    <div class="card basic-data-table">
        <div class="card-header">
            <h5 class="card-title text-primary mb-0">Subscribe</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $submission)
                        <tr>
                            <td>{{ $submission['email'] ?? '' }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection