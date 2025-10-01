@extends('admin.layouts.app')

@section('title') Settings Update @endsection

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Settings Update</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Dashboard
            </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Settings Update</li>
    </ul>
</div>

<div class="row gy-4 pt-5">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><span class="icon">
                        <iconify-icon icon="fa-solid:edit"></iconify-icon>
                    </span> Settings Update</h5>
            </div>
            <div class="card-body">
                <form class="row gy-3 needs-validation" novalidate action="{{ route('admin.settings.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <label>Header Logo</label>
                        <input type="file" name="header_logo" class="form-control p-1">
                        @if(isset($data->header_logo))
                        <img src="{{ Storage::url($data->header_logo) }}" width="100" height="100" class="mt-10">
                        @endif
                    </div>

                    <div class="col-md-4">
                        <label>Footer Logo</label>
                        <input type="file" name="footer_logo" class="form-control p-1">
                        @if(isset($data->footer_logo))
                        <img src="{{ Storage::url($data->footer_logo) }}" width="100" height="100" class="mt-10">
                        @endif
                    </div>

                    <div class="col-md-4">
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="form-control p-1">
                        @if(isset($data->favicon))
                        <img src="{{ Storage::url($data->favicon) }}" width="64" height="64" class="mt-10">
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Company Name</label>
                        <div class="has-validation">
                        
                            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ $data->company_name ?? '' }}">
                            @error('company_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <div class="has-validation">
                           
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $data->address ?? '' }}">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Phone One</label>
                        <div class="has-validation">
                           
                            <input type="text" name="phone_one" class="form-control @error('phone_one') is-invalid @enderror" value="{{ $data->phone_one ?? '' }}">
                            @error('phone_one')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Phone Two</label>
                        <div class="has-validation">
                           
                            <input type="text" name="phone_two" class="form-control @error('phone_two') is-invalid @enderror" value="{{ $data->phone_two ?? '' }}">
                            @error('phone_two')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Email One</label>
                        <div class="has-validation">
                            
                            <input type="text" name="email_one" class="form-control @error('email_one') is-invalid @enderror" value="{{ $data->email_one ?? '' }}">
                            @error('email_one')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Two</label>
                        <div class="has-validation">
                            
                            <input type="text" name="email_two" class="form-control @error('email_two') is-invalid @enderror" value="{{ $data->email_two ?? '' }}">
                            @error('email_two')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Facebook</label>
                        <div class="has-validation">
                            
                            <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $data->facebook ?? '' }}">
                            @error('facebook')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Youtube</label>
                        <div class="has-validation">
                           
                            <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ $data->youtube ?? '' }}">
                            @error('youtube')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Twitter</label>
                        <div class="has-validation">
                            
                            <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ $data->twitter ?? '' }}">
                            @error('twitter')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Linkedin</label>
                        <div class="has-validation">
                            
                            <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ $data->linkedin ?? '' }}">
                            @error('linkedin')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <div class="has-validation">
                            
                            <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ $data->instagram ?? '' }}">
                            @error('instagram')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Copyright</label>
                        <div class="has-validation">
                            
                            <input type="text" name="copyright" class="form-control @error('copyright') is-invalid @enderror" value="{{ $data->copyright ?? '' }}">
                            @error('copyright')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 pb-16 pt-16">
                        <p class="fw-bold mb-0">SEO</p>
                        <hr>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Meta Title</label>
                        <div class="has-validation">
                           
                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ $data->meta_title ?? '' }}">
                            @error('meta_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label class="form-label">Meta Description</label>
                        <div class="has-validation">
                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror">{{ $data->meta_description ?? '' }}</textarea>
                            @error('meta_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Meta Keyword</label>
                        <div class="has-validation">
                            <textarea name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror">{{ $data->meta_keyword ?? '' }}</textarea>
                            @error('meta_keyword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label>Meta Image</label>
                        <input type="file" name="meta_image" class="form-control p-1">
                        @if(isset($data->meta_image))
                        <img src="{{ Storage::url($data->meta_image) }}" width="100" height="100" class="mt-10">
                        @endif
                    </div>


                    <div class="col-md-12 pb-16 pt-16">
                        <p class="fw-bold mb-0">Payment Method Stripe</p>
                        <hr>
                    </div>

                     <div class="col-md-12">
                        <label class="form-label">Stripe Key</label>
                        <div class="has-validation">
                           
                            <input type="text" name="stripe_key" class="form-control @error('stripe_key') is-invalid @enderror" value="{{ $data->stripe_key ?? '' }}">
                            @error('stripe_key')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                     <div class="col-md-12">
                        <label class="form-label">Stripe Secret</label>
                        <div class="has-validation">
                           
                            <input type="text" name="stripe_secret" class="form-control @error('stripe_secret') is-invalid @enderror" value="{{ $data->stripe_secret ?? '' }}">
                            @error('stripe_secret')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 pb-16 pt-16">
                        <p class="fw-bold mb-0">Payment Method Online/Offline</p>
                        <hr>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Online / Offline</label>
                        <div class="has-validation">
                            <select name="payment_method_status" id="payment_method_status" class="form-control form-select @error('payment_method_status') is-invalid @enderror">
                                <option value="1" {{ $data->payment_method_status==1 ? 'selected' : ''  }}>Online</option>
                                <option value="0" {{ $data->payment_method_status==0 ? 'selected' : ''  }}>Offline</option>
                            </select>
                            @error('payment_method_status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                    </div>





                    <div class="col-md-12 text-end">
                        <button class="btn btn-sm btn-success-600" type="submit"><span class="icon">
                                <iconify-icon icon="fa-solid:edit"></iconify-icon>
                            </span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection