@extends('admin.layouts.app')

@section('title') Update Open Event-Item @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span>Update Open Event-Item</h5>


                <a href="{{ route('admin.open-event-items.index') }}" class="btn btn-primary btn-sm">← Back</a>

            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.open-event-items.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label class="form-label">Open Event</label>
                        <div class="has-validation">
                            <select name="open_events_id" id="open_events_id" class="form-control @error('open_events_id') is-invalid @enderror">
                                @foreach($event as $item)
                                <option value="{{$item->id}}" {{$data->open_events_id ==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error(' open_events_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <div class="has-validation">
                            <input value="{{$data->title}}" type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Text Name</label>
                        <div class="has-validation">
                            <input value="{{$data->textname}}" type="text" name="textname" id="textname" class="form-control @error('textname') is-invalid @enderror" value="{{ old('textname') }}">
                            @error('textname')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Time</label>
                        <div class="has-validation">
                            <input value="{{$data->time}}" type="text" name="time" id="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}">
                            @error('time')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Years</label>
                        <div class="has-validation">
                            <input value="{{$data->year}}" type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
                            @error('year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Minutes</label>
                        <div class="has-validation">
                            <input value="{{$data->minutes}}" type="text" name="minutes" id="minutes" class="form-control @error('minutes') is-invalid @enderror" value="{{ old('minutes') }}">
                            @error('minutes')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <div class="has-validation">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="4" rows="4">{!!$data->description!!}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image</label>
                        <div class="has-validation">
                            <input type="file" name="image" id="image" class="form-control p-1 @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <!-- Preview Section -->
                            <div class="mt-2">
                                @if($data->image)
                                <img id="previewImage" src="{{Storage::url($data->image)}}" alt="Preview" style="max-width:150px; border:1px solid #ccc; padding:5px; border-radius:6px; ">
                                @else
                                 <img id="previewImage" src="{{Storage::url($data->image)}}" alt="Preview" style="display:none;max-width:150px; border:1px solid #ccc; padding:5px; border-radius:6px; ">
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror">
                                <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12 text-end">

                        <a href="{{ route('admin.open-event-items.index') }}" class="btn btn-primary btn-sm">← Back</a>

                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:save"></iconify-icon>
                            </span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')

@section('script')
<script>
    $(document).ready(function() {
        $('#image').on('change', function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#previewImage').attr('src', event.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection

@endsection

@endsection