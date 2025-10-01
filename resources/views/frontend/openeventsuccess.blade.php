@extends('layouts.app')

@section('title')Thank you for your submission, we will be in touch shortly. @endsection

@section('css')
<style>
    .progress-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-card {
        background: #0C2A58;;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .form-box-title {
        text-align: center;
        font-size: 32px;
        font-weight: 500;
        color: #FFF;
    }
    @media (max-width:576px) {
        .form-box-title{
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')

<section class="section">

    <div class="container py-5">
        <!-- Form Card -->
        <div class="mx-auto" style="max-width:500px;">
            <!-- Step 5 -->
            <div class="form-card">
                <p class="text-center">
                    <i class="fa fa-check-circle" style="color: #AE9A66;font-size: 32px;"></i>
                </p>
                <h4 class="form-box-title">Thank you for your submission, we will be in touch shortly.</h4>

            </div>
        </div>
    </div>
</section>


@endsection