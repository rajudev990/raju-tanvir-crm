<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8f5;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            color: #28a745;
            margin: auto;
        }
    </style>
</head>


<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg border-0 p-5 text-center" style="max-width: 500px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-circle-fill success-icon mb-4" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 10.03a.75.75 0 0 0 1.08.02l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 8.439 6.02 6.97a.75.75 0 0 0-1.08 1.04l2.03 2.02z" />
            </svg>
            <h2 class="text-success">Payment Successful!</h2>
            <p class="text-muted">Thank you for your payment. Your enrollment is confirmed.</p>
            <a href="/" class="btn btn-success mt-3">Go to Homepage</a>

            {{-- Logout via POST --}}
            <!-- <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="btn btn-success mt-3">Go to Homepage</button>
            </form> -->
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>