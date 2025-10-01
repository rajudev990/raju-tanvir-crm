@extends('student.app')

@section('student')

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <!-- Progress Header -->
                <div class="progress-container mb-4">
                    <h5 class="mb-0 text-light title">Estimated time remaining: 12 minutes</h5>
                    <div class="progress mt-2">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 50%;"></div>
                    </div>
                    <small id="progressText" class="text-light">50%</small>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('form.step.post', 5) }}" method="POST">
            @csrf

            @if(!empty($data['students']) && is_array($data['students']))
            @foreach($data['students'] as $index => $student)
            @php
            $selPackage = collect(old('packages', $data['submitted_packages'] ?? []))
            ->firstWhere('student_id', $student['id']);
            $packageType = $selPackage['package'] ?? '';
            @endphp

            {{-- Hidden Inputs --}}
            <input type="hidden" name="packages[{{ $index }}][student_id]" value="{{ $student['id'] }}">
            <input type="hidden" name="packages[{{ $index }}][package]" class="package-input" value="{{ $packageType }}">
            <input type="hidden" name="packages[{{ $index }}][regular_price]" class="regular-price-input" value="{{ $selPackage['regular_price'] ?? '' }}">
            <input type="hidden" name="packages[{{ $index }}][discount_price]" class="discount-price-input" value="{{ $selPackage['discount_price'] ?? '' }}">
            <input type="hidden" name="packages[{{ $index }}][discount]" class="discount-input" value="{{ $selPackage['discount'] ?? '' }}">

            {{-- Student Header --}}
            <div class="row mb-4">
                <div class="col-lg-6 step-four m-auto">
                    <h3 class="text-center" style="color:#AE9A66;font-size:24px;font-weight:500;">
                        Choose a Pricing Package That Suits
                        <span style="color:#fff;">{{ $student['fname'] ?? '' }}</span>
                        Best
                    </h3>
                    <p class="text-center text-light">{{ $student['group']['name'] ?? '' }}</p>
                </div>
            </div>

            <div class="row d-flex justify-content-center">

                {{-- Every Plan List --}}
                <div class="col-lg-3">
                    <div class="card p-4 mb-3" style="background-color:#0c2a58;border-radius:24px;color:#FFF;cursor:pointer;border:1px solid #AE9A66;">
                        <div class="card-body">
                            <h3 class="py-3" style="color:#AE9A66;font-size:20px;font-weight:600;">Every Plan Comes With</h3>
                            <ul style="list-style:none; padding-left:0;">
                                @foreach(['one','two','three','four','five','six'] as $suffix)
                                @php $key = "plan_text_{$suffix}"; @endphp
                                @if(!empty($student['course'][$key]))
                                <li class="mb-3 d-flex align-items-center">
                                    <img width="16" height="16" src="{{ asset('frontend/assets/img/check.png') }}">
                                    <span class="ms-2" style="font-size:16px;font-weight:400;color:#FFF;">
                                        {{ $student['course'][$key] }}
                                    </span>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Package Cards --}}
                @foreach(['monthly'=>'m','termly'=>'t','annual'=>'a'] as $pkgName => $prefix)
                @php
                $isActive = ($packageType == $pkgName) ? 'active' : '';
                $regPrice = $student['course'][$prefix.'_regular_price'] ?? 0;
                $discPrice = $student['course'][$prefix.'_discount_price'] ?? 0;
                $disc = $student['course'][$prefix.'_discount'] ?? 0;
                @endphp

                <div class="col-lg-3">
                    <div class="card p-4 mb-3 schoolbox {{ $isActive }}"
                        data-regular="{{ $regPrice }}"
                        data-discount-price="{{ $discPrice }}"
                        data-discount="{{ $disc }}"
                        style="background-color:#02142F;border-radius:24px;color:#FFF;cursor:pointer;">
                        <div class="card-body text-center">
                            <h3 class="py-3" style="color:#AE9A66;font-size:24px;font-weight:600;">
                                {{ ucfirst($pkgName) == 'Annual' ? 'Annual Contract' : ucfirst($pkgName).' Payment' }}
                            </h3>
                            <h1 style="background:#061E42;padding:8px 60px;border-radius:8px;text-align:center;font-size:32px;font-weight:600;">
                                £{{ $regPrice }}
                                @if($discPrice)
                                <del class="ms-2" style="color:#AE9A66;font-size:20px;">£{{ $discPrice }}</del>
                                @endif
                                @if($disc)
                                <span class="badge ms-4" style="background:#183E77;font-size:12px;padding:10px 15px;border-radius:99px;">
                                    Save £{{ $disc }}
                                </span>
                                @endif
                            </h1>

                            {{-- Package List Items --}}
                            <ul style="list-style:none; padding-left:0; margin-top:15px; text-align:left;">
                                @foreach(range(1,6) as $j)
                                @php $listKey = $prefix.'_list_'.["one","two","three","four","five","six"][$j-1]; @endphp
                                @if(!empty($student['course'][$listKey]))
                                <li class="mb-2 d-flex align-items-center">
                                    <img width="16" height="16" src="{{ asset('frontend/assets/img/check.png') }}">
                                    <span style="font-size:16px;font-weight:400;color:#FFF;">
                                        {{ $student['course'][$listKey] }}
                                    </span>
                                </li>
                                @endif
                                @endforeach
                            </ul>

                            <div class="text-center mt-3">
                                <button type="button"
                                    data-index="{{ $index }}"
                                    data-package="{{ $pkgName }}"
                                    class="select-package btn"
                                    style="background: {{ $isActive ? '#AE9A66' : '#183E77' }};
                                               padding:15px 24px;border-radius:99px;font-size:16px;font-weight:600;color:#FFF;">
                                    Select
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endforeach
            @else
            <p class="text-center text-light">No students found.</p>
            @endif

            <div class="row mt-3">
                <div class="col-lg-4 m-auto">
                    <button type="submit" class="btn custom-btn w-100">Continue</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('form.step', 4) }}" class="text-light text-decoration-none">
                            <i class="fa fa-arrow-left"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.select-package').click(function() {
            var card = $(this).closest('.schoolbox');
            var index = $(this).data('index');
            var packageType = $(this).data('package');

            var regular = card.data('regular');
            var discountPrice = card.data('discount-price');
            var discount = card.data('discount');

            // set hidden inputs
            $('input[name="packages[' + index + '][package]"]').val(packageType);
            $('input[name="packages[' + index + '][regular_price]"]').val(regular);
            $('input[name="packages[' + index + '][discount_price]"]').val(discountPrice);
            $('input[name="packages[' + index + '][discount]"]').val(discount);

            // highlight active card
            card.closest('.row.d-flex').find('.schoolbox').removeClass('active');
            card.addClass('active');
        });
    });
</script>
@endsection