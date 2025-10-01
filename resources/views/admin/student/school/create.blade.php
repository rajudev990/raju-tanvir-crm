@extends('admin.layouts.app')

@section('title') Add School @endsection

@section('content')

<div class="row gy-4 pt-5">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-primary mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:save"></iconify-icon>
                    </span> Add School</h5>


                <a href="{{ route('admin.student-subject.index') }}" class="btn btn-primary btn-sm">← Back</a>

            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.student-school.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')


                    <div class="col-md-12">
                        <label class="form-label">Name</label>
                        <div class="has-validation">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Timezone</label>
                        <div class="has-validation">
                            <input type="text" name="timezone" id="timezone" class="form-control @error('timezone') is-invalid @enderror" value="{{ old('timezone') }}">
                            @error('timezone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <div class="has-validation">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Image</label>
                        <div class="has-validation">
                            <input type="file" name="image" id="image" class=" p-1 form-control @error('image') is-invalid @enderror" onchange="previewImage(event)">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!-- Preview Image -->
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Preview" style="display:none; width:150px; border-radius:8px;">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Status</label>
                        <div class="has-validation">
                            <select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-12 text-end">
                        <a href="{{ route('admin.student-school.index') }}" class="btn btn-primary btn-sm">← Back</a>
                        <button class="btn btn-sm btn-success-600" type="submit">
                            <span class="icon"><iconify-icon icon="fa-solid:save"></iconify-icon></span> Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block'; // Show the image
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection