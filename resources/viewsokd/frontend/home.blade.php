@extends('layouts.app')

@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
        transition: 0.3s;
    }

    /* .cursor-pointer:hover {
        background-color: #f8f9fa;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    } */

    .price-tag del {
        font-size: 0.9rem;
        color: #ccc;
    }

    .highlight-tag {
        padding: 2px 6px;
        border-radius: 4px;
        font-weight: 500;
    }
    
    .form-card-box{
        position: relative;height:352px;width:273px;padding:24px 53px;
    }
    @media (max-width:576px) {
        .form-card-box{
            width: 100%;
            padding: 20px 15px;
        }
        .form-card-box ul li{
            font-size: 17px !important;
        }
    }
    @media (max-width: 576px) {
    .mobile-package {
            display: flex;
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section">
    <div class="container section-title">
        <h2 class="mb-0">Admission Form</h2>
    </div>

    <!-- Step 1 -->
    <div class="container step-1">
        <div class="text-center mb-5">
            <h3 class="text-light">Choose your year group (at time of joining)</h3>
        </div>
        <div class="row justify-content-center g-3 pt-4">
            <div class="col-lg-8 m-auto">
                <div class="row">
                    @foreach($groups as $item)
                    <div class="col-lg-4 col-6 mb-3">
                        <div class="year-card form-card-box text-center">
                            <h5 style="color: #AE9A66;font-size:21px;line-height: 25px;">{{ $item->title }}</h5>
                            <ul class="text-start mt-5">
                                @if($item->list1)<li style="font-size: 19px;line-height:2">{{ $item->list1 }}</li>@endif
                                @if($item->list2)<li style="font-size: 19px;line-height:2">{{ $item->list2 }}</li>@endif
                                @if($item->list3)<li style="font-size: 19px;line-height:2">{{ $item->list3 }}</li>@endif
                                @if($item->list4)<li style="font-size: 19px;line-height:2">{{ $item->list4 }}</li>@endif
                                @if($item->list5)<li style="font-size: 19px;line-height:2">{{ $item->list5 }}</li>@endif
                            </ul>
                            <button style="position: absolute;bottom: 17px;left: 50%;transform: translateX(-50%);width: 60%;font-size: 16px;text-align: center;" class="btn btn-continue btn-select step1-select mt-2" data-id="{{ $item->id }}">Apply Now</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Step 2 -->
    <div class="container step-2 pt-2" style="display: none">
        <div class="text-center mb-5">
            <h3>Choose your provision</h3>
        </div>
        <div class="row justify-content-center provision-container"></div>
    </div>

    <!-- Step 3 -->
    <div class="container step-3" style="display: none">
        <div class="text-center mb-5">
            <h3>When do you plan to start?</h3>
        </div>
        <div class="d-flex g-4 justify-content-center plan-container row"></div>
    </div>

    <!-- Step 4 -->
    <div class="container-fluid px-lg-5 step-4 pt-5" style="display: none">
        <div class="pb-5 row">
            <div class="col-lg-12 gap-2 d-flex m-auto text-center mobile-package">
                <div class="w-100 package-price">
                    <p class="mb-2 text-light">Year Group</p>
                    <h5 class="mb-5 selected-year-group"></h5>
                    <a href="#" class="edit_btn_switch step-back" data-step="1">Edit</a>
                </div>
                <div class="w-100 package-price">
                    <p class="mb-2 text-light">Provision</p>
                    <h5 class="mb-5 selected-package"></h5>
                    <a href="#" class="edit_btn_switch step-back" data-step="2">Edit</a>
                </div>
                <div class="w-100 package-price">
                    <p class="mb-2 text-light">Plan</p>
                    <h5 class="mb-5 selected-plan"></h5>
                    <a href="#" class="edit_btn_switch step-back" data-step="3">Edit</a>
                </div>
            </div>
        </div>
        <div class="row g-4 course-fee-container pt-5"></div>
    </div>
</section>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        let selectedGroupId = '',
            selectedYearGroup = '',
            selectedPackageId = '',
            selectedPackage = '',
            selectedPlan = '',
            selectedPlanId = '',
            selectedCourseFeeId = '';

        // Step 1
        $('.step1-select').click(function() {
            selectedGroupId = $(this).data('id');
            selectedYearGroup = $(this).closest('.year-card').find('h5').text();
            $('.step-1').hide();
            $('.step-2').show();
            $('.selected-year-group').text(selectedYearGroup);

            $.get(`/get-packages/${selectedGroupId}`, function(packages) {
                let html = '';
                packages.forEach(pkg => {
                    let disabled = pkg.status == 0 ? 'disabled' : '';
                    let buttonText = pkg.status == 0 ? 'Not Available' : 'SELECT';
                    let btnClass = pkg.status == 0 ? 'btn-secondary' : 'btn-continue';

                    html += `
                    <div class="col-md-6 col-lg-5 mb-3">
                        <div class="provision-card">
                            <div class="provision-card-box">
                                <h5 class="mb-4">${pkg.title}</h5>
                                <p>${pkg.description}</p>
                                <button style="padding:15px;" class="btn ${btnClass} btn-select step2-select mt-2" data-id="${pkg.id}" ${disabled}>
                                    ${buttonText}
                                </button>
                            </div>
                        </div>
                    </div>`;
                });
                $('.provision-container').html(html);
            });
        });

        // Step 2
        $(document).on('click', '.step2-select', function() {
            selectedPackageId = $(this).data('id');
            selectedPackage = $(this).closest('.provision-card').find('h5').text();
            $('.step-2').hide();
            $('.step-3').show();
            $('.selected-package').text(selectedPackage);

            $.get(`/get-plans/${selectedPackageId}`, function(plans) {
                let html = '';

                if (plans.length === 0) {
                    html = `<div class="col-12"><p class="text-danger">No active plans found.</p></div>`;
                } else {
                    plans.forEach(plan => {
                        html += `
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="term-card cursor-pointer">
                                <div class="provision-card-box">
                                    <h6>${plan.title}</h6>
                                    <p class="mb-5">(${plan.start_date}) - (${plan.end_date})</p>
                                    <button 
                                        class="btn btn-continue btn-select step3-select mt-auto" 
                                        data-id="${plan.id}" 
                                        data-title="${plan.title}">
                                        Select
                                    </button>
                                </div>    
                            </div>
                        </div>`;
                    });
                }

                $('.plan-container').html(html);
            });
        });


        // Step 3
        $(document).on('click', '.step3-select', function() {
            selectedPlanId = $(this).data('id');
            selectedPlan = $(this).data('title');
            $('.step-3').hide();
            $('.step-4').show();
            $('.selected-plan').text(selectedPlan);



            $.get(`/get-course-fees/${selectedGroupId}`, function(fees) {
                let html = '';
                fees.forEach(fee => {
                    const contractName = fee.contract == 1 ? 'Annual Contract' : (fee.contract == 2 ? 'Rolling Contract' : 'Monthly Term');
                    const originalPrice = Number(fee.course_fee || 0);
                    const savingPercent = Number(fee.saving || 0);
                    // Round the discount and final price
                    const discountAmount = Math.round((originalPrice * savingPercent) / 100);
                    const finalPrice = Math.round(originalPrice - discountAmount);

                    html += `
        <div class="col-lg-4 col-sm-12">
            <div class="card h-100" style="border: 0.5px solid #FFFFFF;background-color:#061e42;padding:36px 25px;border-radius:24px;">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title mb-4 packageprice-title" style="font-size:27px;color:#AE9A66;font-weight:600;">
                            ${contractName} ${fee.contract_year ? fee.contract_year : ''}
                        </h5>

                    </div>

                    <div class="card-bg">
                      
                    <p class="price-tag text-light mb-0">
                        ${fee.saving 
                            ? `£${finalPrice.toLocaleString('en-UK')} <del class="text-muted" style="color:#AE9A66 !important;font-size:20px;">£${originalPrice.toLocaleString('en-UK')}</del>` 
                            : `£${finalPrice.toLocaleString('en-UK')}`
                        }
                        
                    </p>
                    <p class="" style="font-size:16px;color:#FFF;">
                        ${fee.course_fee_text ? fee.course_fee_text : ''}
                    </p>

                                               
                        
                    </div>

                    <p class="course_descri py-4">${fee.course_description ? fee.course_description : ''}</p>

                    <div>
                       ${(fee.list_one || fee.list_two || fee.list_three) ? `
                        <ul class="list-unstyled mt-4" style="background:#0B264E;padding:24px 24px;border-radius:8px;color:#FFF;font-size:16px;">
                            ${fee.list_one ? `<li>${fee.list_one_status == 1 ? "<i style='color:#ae9a66;' class='fa fa-edit me-2'></i>" : "<i style='color:#ff7f07;' class='fa fa-trash me-2'></i>"} ${fee.list_one}</li>` : ''}
                            ${fee.list_two ? `<li>${fee.list_two_status == 1 ? "<i style='color:#ae9a66;' class='fa fa-edit me-2'></i>" : "<i style='color:#ff7f07;' class='fa fa-trash me-2'></i>"} ${fee.list_two}</li>` : ''}
                            ${fee.list_three ? `<li>${fee.list_three_status == 1 ? "<i style='color:#ae9a66;' class='fa fa-edit me-2'></i>" : "<i style='color:#ff7f07;' class='fa fa-trash me-2'></i>"} ${fee.list_three}</li>` : ''}
                        </ul>
                        ` : ''}
                    </div>

                    <div style="background:#0B264E;padding:15px;border-radius:8px;" class="d-flex justify-content-between my-4">
                        <h3 style="font-size: 18px;font-weight: 500;color: #FFF;margin:0px !important;">Additional subjects</h3>
                        <p style="font-size: 18px;font-weight: 500;color: #FFF;"><b>£${fee.additional_subjects_price ? fee.additional_subjects_price : '0.00'}</b>/ ${fee.additional_subjects_text ? fee.additional_subjects_text : ''}</p>
                    </div>

                    <div class="accordion pt-3 pb-4" id="accordionExample">
                        

                        <div class="accordion-item" style="background:#0b264e;color:#FFF;border: none;border-radius:8px;">
                            <h2 class="accordion-header" id="headingThree">
                                <button style="background:#0b264e;color:#FFF;font-size:18px;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo-${fee.id}" aria-expanded="false" aria-controls="collapseTwo-${fee.id}">
                                    Admission Fee
                                </button>
                            </h2>
                            <div id="collapseTwo-${fee.id}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="border-bottom pb-5" style="font-weight:300;">${fee.additional_fees_description ? fee.additional_fees_description : ''}</p>

                                    ${fee.additional_fees_text_one ? `<div class="d-flex justify-content-between border-bottom border-3 mt-3"><p><b>${fee.additional_fees_text_one ? fee.additional_fees_text_one : ''}</b></p><p><b>£${fee.additional_fees_text_one_price ? fee.additional_fees_text_one_price : '0.00'}</b></p></div>`: ''} 
                                    ${fee.additional_fees_text_two ? `<div class="d-flex justify-content-between border-bottom border-3 mt-3"><p><b>${fee.additional_fees_text_two ? fee.additional_fees_text_two : ''}</b></p><p><b>£${fee.additional_fees_text_two_price ? fee.additional_fees_text_two_price : '0.00'}</b></p></div>` : ''}
                                    ${fee.additional_fees_text_three ? `<div class="d-flex justify-content-between border-bottom border-3 mt-3"><p><b>${fee.additional_fees_text_three ? fee.additional_fees_text_three : ''}</b></p><p><b>£${fee.additional_fees_text_three_price ? fee.additional_fees_text_three_price : '0.00'}</b></p></div>` : ''}
                                    ${fee.additional_fees_text_four ? `<div class="d-flex justify-content-between"><p><b>${fee.additional_fees_text_four ? fee.additional_fees_text_four : ''}</b></p><p><b>£${fee.additional_fees_text_four_price ? fee.additional_fees_text_four_price : '0.00'}</b></p></div>` : ''}
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                    <button class="btn btn-continue w-50 mt-5 save-selection" data-id="${fee.id}">
                        GET STARTED
                    </button>
                    </div>
                </div>
            </div>
        </div>`;
                });
                $('.course-fee-container').html(html);
            });

        });

        // Step 4 - Submit
        $(document).on('click', '.save-selection', function() {
            selectedCourseFeeId = $(this).data('id');

            const postData = {
                year_group_id: selectedGroupId,
                package_id: selectedPackageId,
                plan_id: selectedPlanId,
                course_fee_id: selectedCourseFeeId
            };

            $.ajax({
                url: "{{ route('auto.register.fee.user') }}",
                method: 'POST',
                data: postData,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        });

        $('.step-back').click(function(e) {
            e.preventDefault();
            let step = $(this).data('step');
            $('.step-1, .step-2, .step-3, .step-4').hide();
            $('.step-' + step).show();
        });
    });
</script>
@endsection