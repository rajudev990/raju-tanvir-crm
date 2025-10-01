<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>500 - Internal Server Error</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-image: url('https://images.unsplash.com/photo-1526045612212-70caf35c14df?auto=format&fit=crop&w=1400&q=80');
      background-size: cover;
      background-position: center;
      height: 100vh;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      backdrop-filter: blur(5px);
    }

    .container {
      background: rgba(0, 0, 0, 0.6);
      padding: 40px 30px;
      border-radius: 12px;
      max-width: 500px;
      width: 90%;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }

    .container h1 {
      font-size: 100px;
      color: #e74c3c;
      margin-bottom: 10px;
    }

    .container h2 {
      font-size: 28px;
      margin-bottom: 15px;
    }

    .container p {
      font-size: 16px;
      color: #ccc;
      margin-bottom: 25px;
    }

    .container a {
      text-decoration: none;
      background: #e74c3c;
      color: #fff;
      padding: 12px 25px;
      border-radius: 6px;
      font-weight: bold;
      transition: 0.3s ease;
    }

    .container a:hover {
      background: #c0392b;
    }

    @media (max-width: 480px) {
      .container h1 {
        font-size: 70px;
      }

      .container h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>404</h1>
    <h2>Internal Server Error</h2>
    <p>Sorry, something went wrong on our server.<br>Please try again later.</p>
    <a href="{{ url('/') }}">← Back to Home</a>
  </div>
</body>
</html>
