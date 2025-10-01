<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      background: #fff;
    }

    .invoice-container {
      width: 100%;
      margin: 0 auto;
      padding: 15px;
      /* border: 1px solid #eee; */
    }

    .header-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .header-table td {
      vertical-align: top;
    }

    .company {
      font-size: 18px;
      font-weight: bold;
    }

    .section-title {
      font-size: 16px;
      margin-top: 16px;
      margin-bottom: 3px;
      font-weight: bold;
      /* border-bottom: 1px solid #ddd; */
      padding-bottom: 5px;
    }

    .info {
      font-size: 13px;
      line-height: 1.6;
    }

    table.items {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      font-size: 13px;
    }

    table.items th,
    table.items td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    table.items th {
      background-color: #f5f5f5;
    }

    .text-right {
      text-align: right;
    }

    .total-row td {
      font-weight: bold;
      background-color: #f9f9f9;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      font-size: 12px;
      color: #777;
    }
  </style>
</head>

<body>
  <div class="invoice-container">
    <table class="header-table">
      <tr>
        <td>
          <div class="company">
            <img class="logo" src="https://register.alrushd.co.uk/frontend/assets/img/logo.png" alt="alrushd.co.uk" style="max-width: 100px;">
          </div>
          <div class="info">
            Address: Unit 8, Church Road Studios 62 Church<br>
            Road London E12 6AF<br>
            Email: admin@alrushd.co.uk<br>
            Phone: +442036330757
          </div>
        </td>
        <td class="text-right info">
          <strong>Invoice #: </strong> INV-{{ $order->id }}<br>
          <strong>Date: </strong> {{ $order->created_at->format('m-d-Y') }}<br>
          <div class="section-title">Bill To</div>
          <div class="info">
            {{ $order->user->title }} {{ $order->user->first_name }} {{ $order->user->last_name }}<br>
            {{ $order->user->email }}<br>
            {{ $order->user->city }}, {{ $order->user->country }}
          </div>

        </td>
      </tr>
    </table>


    <div class="section-title">Student Information</div>

    <table class="items">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Country</th>
          <th>Group</th>
          <th>Start Date</th>
          <th>Year</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->user->students as $student)
        <tr>
          <td>{{ $student->first_name }}</td>
          <td>{{ $student->last_name }}</td>
          <td>{{ $student->dob }}</td>
          <td>{{ $student->country }}</td>
          <td>{{ $student->groupyear->name }}</td>
          <td>{{ $student->start_date }}</td>
          <td>{{ $student->selected_year }}</td>
        </tr>
        @endforeach


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



  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Application Processing Fee</td>
    <td colspan="2" style="text-align: right;">£{{ number_format($applicationFee, 2) }}</td>
  </tr>
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Deposit Fee</td>
    <td colspan="2" style="text-align: right;">£{{ number_format($depositFee, 2) }}</td>
  </tr>
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Admission Fee</td>
    <td colspan="2" style="text-align: right;">£{{ number_format($admissionFee, 2) }}</td>
  </tr>
  @if($saving)
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Saving / Discount</td>
    <td colspan="2" style="text-align: right;">{{ number_format($saving, 2) }}%</td>
  </tr>
  @endif
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Total Students</td>
    <td colspan="2" style="text-align: right;">{{ $totalStudents }}</td>
  </tr>
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Course Fee</td>
    <td colspan="2" style="text-align: right;">£{{ number_format(round($student_course_fee), 2) }}</td>
  </tr>

  @if($hasHifdh)
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Hifdh Programme</td>
    <td colspan="2" style="text-align: right;">£{{ number_format(round($hifdh_price), 2) }}</td>
  </tr>
  @endif

  @if($couponDiscount)
  <tr class="total-row">
    <td colspan="5" style="text-align: right;">Coupon Discount</td>
    <td colspan="2" style="text-align: right;">{{ $couponDiscount }}%</td>
  </tr>
@endif
  <tr class="total-row">
    <td colspan="5" style="text-align: right;"><strong>Total Amount</strong></td>
    <td colspan="2" style="text-align: right;"><strong>£{{ number_format($totalAmount, 2) }}</strong></td>
  </tr>
  <tr class="total-row">
    <td colspan="5" style="text-align: right;"><strong>Amount Paid</strong></td>
    <td colspan="2" style="text-align: right;"><strong>£{{ number_format($paidAmount, 2) }}</strong></td>
  </tr>
  <tr class="total-row">
    <td colspan="5" style="text-align: right;"><strong>Due Amount</strong></td>
    <td colspan="2" style="text-align: right;"><strong>£{{ number_format($due, 2) }}</strong></td>
  </tr>



      </tbody>
    </table>

    <div class="footer" style="
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    font-size: 11px;">
      Copyright 2025 © All Right Reserved by<strong>Al-rushd Online School</strong>
    </div>
  </div>
</body>

</html>