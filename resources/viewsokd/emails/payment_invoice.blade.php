<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invoice - #{{ $order->id }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 20px;
    }

    .invoice-container {
      max-width: 100%;
      margin: auto;
      /* background-color: #fff; */
      padding: 30px;
      /* border-radius: 8px; */
      border-top: 5px solid #143256;
      /* box-shadow: 0 0 10px rgba(0,0,0,0.1); */
    }

    .logo {
      max-width: 100px;
      margin-bottom: 20px;
    }

    .invoice-header {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .invoice-header div {
      flex: 1 1 45%;
    }

    .invoice-header p {
      background: #efeded;
      margin: 1px;
      padding: 10px;
      line-height: 22px;
    }

    .section-title {
      font-weight: bold;
      margin: 15px 0 5px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th,
    table td {
      text-align: left;
      /* padding: 10px; */
      border-bottom: 1px solid #e0e0e0;
    }

    table p {
      background: #efeded;
      margin: 1px;
      padding: 10px;
      line-height: 22px;
    }

    .totals {
      text-align: right;
      margin-top: 20px;
    }

    .totals div {
      margin: 5px 0;
    }

    .footer {
      font-size: 12px;
      margin-top: 40px;
      text-align: center;
      color: #777;
    }

    @media (max-width: 600px) {
      .invoice-header {
        flex-direction: column;
      }

      .invoice-header div {
        flex: 1 1 100%;
      }
    }
  </style>
</head>

<body>
  <div class="invoice-container">
    <div>
      <img class="logo" src="{{ asset('frontend/assets/img/logo.png') }}" alt="alrushd.co.uk"
        style="float: left;">
      <h3 style="float: right;">Invoice #{{ $order->id }}</h3>
    </div>
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
      <tr>
        <td valign="top" width="50%">
          <p><strong>Transaction ID:<br></strong> {{ $order->stripe_transaction_id ?? 'Empty'  }}</p>
          <p><strong>Date of Payment:<br></strong> {{ $order->created_at->format('m-d-Y') }}</p>
          <p><strong>Card Holder:<br></strong> {{ $order->card_holder_name ?? 'Empty'  }}</p>
          <p><strong>Country:<br></strong> {{ $order->user->country }}</p>
          <p><strong>Phone:<br></strong> {{ $order->user->contact_number }}</p>
        </td>
        <td valign="top" width="50%">
          <p><strong>Merchant Name:<br></strong> {{ $order->merchant_name ?? 'Empty'  }}</p>
          <p><strong>Payment Currency:<br></strong> GBP (£)</p>
          <p><strong>Payment Type:<br></strong> <span style="text-transform: capitalize;color:red;font-weight:bold;">{{ $order->payment_method  }}</span></p>
          <p><strong>Billed to:<br></strong> {{ $order->user->title }} {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
          <p><strong>Email:<br></strong> {{ $order->user->email }}</p>
        </td>
      </tr>
    </table>


    @php
      $courseFee = $order->user->courseFee;
      $students = $order->user->students;
      $totalStudents = $students->count();

      $applicationFee = $courseFee->application_process_fee ?? 0;
      $depositFee = $courseFee->deposit_fee ?? 0;
      $admissionFee = $courseFee->admission_fee ?? 0;
      $saving = $courseFee->saving ?? 0;

      $course_fee = $courseFee->course_fee ?? 0; 
      $discount = ($course_fee * $saving) / 100;

      // Calculate course fee
      if ($courseFee->persubject_price) {
          $total_subjects = $students->sum(fn($student) => $student->coreSubjects->count());
          $result = $total_subjects * $courseFee->persubject_price;
          $student_course_fee = ($result - $discount) * $totalStudents;
      } else {
          $student_course_fee = ($course_fee - $discount) * $totalStudents;
      }

      // Check Hifdh programme
      $hasHifdh = $students->contains(fn($s) => $s->additionalHifdh->isNotEmpty());
      $hifdh_price = 0;
      if ($hasHifdh) {
          $hifdh_fee = $courseFee->hifdh_programme_price ?? 0;
          $hifdh_price = $hifdh_fee * $totalStudents;
      }

      // Total and due
      $totalFee = $applicationFee + $depositFee + $admissionFee;
      $totalAmount = $totalFee * $totalStudents;
      $totalAmount += round($student_course_fee) + round($hifdh_price); // Include all
      $couponDiscount = $order->coupon ?? 0;
      $discountAmount = ($totalAmount * $couponDiscount) / 100;
      $totalAmount -= $discountAmount;
      
      $paidAmount = $order->amount ?? 0;
      $due = $totalAmount - $paidAmount;
  @endphp

  <div class="totals">
      <div>Application Processing Fee: £{{ number_format($applicationFee, 2) }}</div>
      <div>Deposit Fee: £{{ number_format($depositFee, 2) }}</div>
      <div>Admission Fee: £{{ number_format($admissionFee, 2) }}</div>
      <div>Saving / Discount: {{ number_format($saving, 2) }}%</div>
      <div>Total Students: {{ $totalStudents }}</div>
      <div>Course Fee: £{{ number_format(round($student_course_fee), 2) }}</div>

      @if($hasHifdh)
          <div>Hifdh Programme: £{{ number_format(round($hifdh_price), 2) }}</div>
      @endif

      <div>Coupon Discount: {{ $couponDiscount }}%</div>
      <div><strong>Total Amount: £{{ number_format($totalAmount, 2) }}</strong></div>
      <div><strong>Amount Paid: £{{ number_format($paidAmount, 2) }}</strong></div>
      <div><strong>Due Amount: £{{ number_format($due, 2) }}</strong></div>
  </div>



    <div class="footer">
      Address: Unit 8, Church Road Studios 62 Church Road London E12 6AF<br>
      For support: <a href="mailto:admin@alrushd.co.uk">admin@alrushd.co.uk</a> or <a
        href="tel:+442036330757">+442036330757</a><br>
      Copyright 2025 © All Right Reserved by: <strong>Al-rushd Online School</strong>
    </div>
  </div>
</body>

</html>