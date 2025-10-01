@extends('admin.layouts.app')

@section('title') Update Coupons @endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title text-primary mb-0"><span class="icon">
                <iconify-icon icon="fa-solid:save"></iconify-icon>
            </span> Update Coupons</h5>

        @can('view role')
        <a href="{{ route('admin.coupons.index') }}" class="btn btn-primary btn-sm">← Back</a>
        @endcan
    </div>
    <div class="card-body">
        <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.coupons.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="col-md-6">
                <label class="form-label">Coupon Code</label>
                <div class="has-validation">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" required>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

             <div class="col-md-6">
                <label class="form-label">Discount Percentage(%)</label>
                <div class="has-validation">
                    <input type="text" name="discount_percentage" id="discount_percentage" class="form-control @error('discount_percentage') is-invalid @enderror" value="{{ $data->discount_percentage }}" required>
                    @error('discount_percentage')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>



            <div class="col-md-6">
                <label class="form-label">Start Date</label>
                <div class="has-validation">
                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ $data->start_date }}">
                    @error('start_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">End Date</label>
                <div class="has-validation">
                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ $data->end_date }}">
                    @error('end_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-6">
                <label class="form-label">Status</label>
                <div class="has-validation">
                    <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                        <option value="1" {{ $data->status==1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $data->status==0 ? 'selected' : '' }}>Deactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>


            <div class="col-md-12 text-end">
                @can('view role')
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
                <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Update</button>
            </div>
        </form>
    </div>
</div>
@endsection