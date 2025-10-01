@extends('admin.layouts.app')

@section('title') Add Group Years @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Add Group-Years</h5>

                @can('view group-years')
                <a href="{{ route('admin.group-years.index') }}" class="btn btn-primary btn-sm">← Back</a>
                @endcan
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.group-years.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')


                    <div class="col-md-6">
                        <label class="form-label">Group</label>
                        <div class="has-validation">
                            <select name="group_id" id="group_id" class="form-control form-select @error('group_id') is-invalid @enderror">
                                @foreach($data as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <div class="has-validation">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List 1</label>
                        <div class="has-validation">
                            <input type="text" name="list1" id="list1" class="form-control @error('list1') is-invalid @enderror" value="{{ old('list1') }}">
                            @error('list1')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">List 2</label>
                        <div class="has-validation">
                            <input type="text" name="list2" id="list2" class="form-control @error('list2') is-invalid @enderror" value="{{ old('list2') }}">
                            @error('list2')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List 3</label>
                        <div class="has-validation">
                            <input type="text" name="list3" id="list3" class="form-control @error('list3') is-invalid @enderror" value="{{ old('list3') }}">
                            @error('list3')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">List 4</label>
                        <div class="has-validation">
                            <input type="text" name="list4" id="list4" class="form-control @error('list4') is-invalid @enderror" value="{{ old('list4') }}">
                            @error('list4')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>




                    <div class="col-md-6">
                        <label class="form-label">Year 1</label>
                        <div class="has-validation">
                            <input type="text" name="year1" id="year1" class="form-control @error('year1') is-invalid @enderror" value="{{ old('year1') }}">
                            @error('year1')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year 2</label>
                        <div class="has-validation">
                            <input type="text" name="year2" id="year2" class="form-control @error('year2') is-invalid @enderror" value="{{ old('year2') }}">
                            @error('year2')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Year 3</label>
                        <div class="has-validation">
                            <input type="text" name="year3" id="year3" class="form-control @error('year3') is-invalid @enderror" value="{{ old('year3') }}">
                            @error('year3')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Year 4</label>
                        <div class="has-validation">
                            <input type="text" name="year4" id="year4" class="form-control @error('year4') is-invalid @enderror" value="{{ old('year4') }}">
                            @error('year4')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year 5</label>
                        <div class="has-validation">
                            <input type="text" name="year5" id="year5" class="form-control @error('year5') is-invalid @enderror" value="{{ old('year5') }}">
                            @error('year5')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year 6</label>
                        <div class="has-validation">
                            <input type="text" name="year6" id="year6" class="form-control @error('year6') is-invalid @enderror" value="{{ old('year6') }}">
                            @error('year6')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year 7</label>
                        <div class="has-validation">
                            <input type="text" name="year7" id="year7" class="form-control @error('year7') is-invalid @enderror" value="{{ old('year7') }}">
                            @error('year7')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year 8</label>
                        <div class="has-validation">
                            <input type="text" name="year8" id="year8" class="form-control @error('year8') is-invalid @enderror" value="{{ old('year8') }}">
                            @error('year8')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('title') is-invalid @enderror">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-12 text-end">
                        @can('view group-years')
                        <a href="{{ route('admin.group-years.index') }}" class="btn btn-primary btn-sm">← Back</a>
                        @endcan
                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:save"></iconify-icon>
                            </span> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection