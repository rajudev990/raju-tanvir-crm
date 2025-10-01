@extends('layouts.app')

@section('title') Contact @endsection

@section('css')

@endsection

@section('content')

<section class="section py-5">
    <div class="container">

        @foreach($data as $item)
        @if($item->name=='Scheduled Events')
        <div class="row">
            <div class="col-lg-6 col-12 mb-3 m-auto text-center">
                <p class="badge p-3 rounded rounded-5 text-light" style="background:#183E77;font-size:16px;">{{$item->name}}</p>
                <h2 class="text-light" style="font-size: 36px;font-weight:bold;">{{$item->title}}</h2>
                <p class="text-light pt-3">{{$item->description}}</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            @foreach($item->items as $row)
            <div class="col-lg-4">
                <div class="card mb-3" style="background:#0C2A58;">
                    <div class="card-body p-4">
                        <div style="position: relative;">
                            <img src="{{Storage::url($row->image)}}" alt="" class="img-fluid rounded rounded-4">
                            <p class="badge p-3 rounded rounded-5 text-light" style="position: absolute;top:10px;right:10px;background: #0C2A58;">{{$row->textname}}</p>
                        </div>
                        <div class="text-center py-3">
                            <h4 style="font-size: 24px;color:#AE9A66;font-weight:600;">{{$row->title}}</h4>
                            <p class="text-light">{{$row->description}}</p>
                        </div>
                        <div class="align-items-center d-flex px-2 py-3 rounded rounded-3 text-light" style="background: #183E77;">
                            <i class="fa fa-calendar-alt" style="font-size: 14px;margin-right: 7px;"></i>
                            <span style="font-size: 14px;">{{$row->time}}</span>
                        </div>

                        <div class="d-flex justify-content-between pt-4">
                            <div class="align-items-center d-flex flex-fill me-2 px-2 py-3 rounded rounded-3 text-light" style="background: #183E77;">
                                <span style="font-size: 14px;">{{$row->year}}</span>
                            </div>
                            <div class="align-items-center justify-content-center d-flex flex-fill px-2 py-3 rounded rounded-3 text-light" style="background: #183E77;">
                                <i class="fa fa-clock-four" style="font-size: 14px;margin-right: 7px;"></i>
                                <span style="font-size: 14px;">{{$row->minutes}}</span>
                            </div>
                        </div>

                        <div class="py-4 mt-3">
                            <a href="{{ route('open-event-form',$row->id) }}" class="btn btn-continue w-100">Register</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif

        @endforeach


        @foreach($data as $item)
        @if($item->name=='On-demand Events')
        <div class="row pt-5 mt-3">
            <div class="col-lg-4 col-12 mb-3 m-auto text-center">
                <p class="badge p-3 rounded rounded-5 text-light" style="background:#183E77;font-size:16px;">{{$item->name}}</p>
                <h2 class="text-light" style="font-size: 36px;font-weight:bold;">{{$item->title}}</h2>
                <p class="text-light pt-3">{{$item->description}}</p>
            </div>
        </div>


        <div class="row d-flex justify-content-center">
            @foreach($item->items as $row)
            <div class="col-lg-4">
                <div class="card mb-3" style="background:#0C2A58;">
                    <div class="card-body p-4">
                        <div class="text-center py-3">
                            <span class="px-4 py-2 rounded rounded-5 text-light text-center" style="border: 1px solid #AE9A66">{{$row->textname}}</span>
                        </div>
                        <div class="text-center py-3">
                            <h4 style="font-size: 24px;color:#AE9A66;font-weight:600;">{{$row->title}}</h4>
                            <p class="text-light">{{$row->description}}</p>
                        </div>


                        <div class="d-flex justify-content-between pt-4">
                            <div class="align-items-center d-flex flex-fill me-2 px-2 py-3 rounded rounded-3 text-light" style="background: #183E77;">
                                <span style="font-size: 14px;">{{$row->year}}</span>
                            </div>
                            <div class="align-items-center justify-content-center d-flex flex-fill px-2 py-3 rounded rounded-3 text-light" style="background: #183E77;">
                                <i class="fa fa-clock-four" style="font-size: 14px;margin-right: 7px;"></i>
                                <span style="font-size: 14px;">{{$row->minutes}}</span>
                            </div>
                        </div>

                        <div class="py-4 mt-3">
                            <a href="{{ route('open-event-form',$row->id) }}" class="btn btn-continue w-100">Register</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @endforeach

    </div>

</section>


@endsection