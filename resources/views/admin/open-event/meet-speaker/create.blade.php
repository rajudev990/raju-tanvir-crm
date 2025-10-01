@extends('admin.layouts.app')

@section('title') Add Meet Speaker @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span>Add Meet Speaker</h5>


                <a href="{{ route('admin.meet-speakers.index') }}" class="btn btn-primary btn-sm">← Back</a>

            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.meet-speakers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="col-md-12">
                        <label class="form-label">Name</label>
                        <div class="has-validation">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Designation</label>
                        <div class="has-validation">
                            <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}">
                            @error('designation')
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

                            
                            <div class="mt-2">
                                 <img id="previewImage" src="#" alt="Preview" style="display:none; max-width:150px; border:1px solid #ccc; padding:5px; border-radius:6px;">
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12 text-end">

                        <a href="{{ route('admin.meet-speakers.index') }}" class="btn btn-primary btn-sm">← Back</a>

                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:save"></iconify-icon>
                            </span> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')

@section('script')
<script>
    $(document).ready(function () {
        $('#image').on('change', function (e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $('#previewImage').attr('src', event.target.result).show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#previewImage').hide();
            }
        });
    });
</script>
@endsection
@endsection

@endsection