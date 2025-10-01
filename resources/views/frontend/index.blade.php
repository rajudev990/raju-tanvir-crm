@extends('layouts.app')

@section('css')
<style>
   .hero-section {
      position: relative;
      min-height: 80vh;
      background-color: #061E42;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 50px 20px;
      color: white;
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-title {
      font-size: 48px;
      font-weight: 600;
      color: white;
    }

    .hero-buttons .btn {
      margin: 10px 10px 30px;
      padding: 10px 25px;
      border-radius: 25px;
      font-weight: 500;
    }

    .btn-staff {
      background-color: #C6A76E;
      color: #fff;
      border: none;
    }

    .btn-staff:hover{
        background-color: #C6A76E;
    }

    .btn-student {
      background-color: transparent;
      color: #fff;
      border: 1px solid #fff;
    }

    .hero-images {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      align-items: center;
    }

    .hero-images img {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hero-images img:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .img1{
        width: 181px;
        height: 234px;
        border-radius: 16px;
        object-fit: cover;
    }
    .img2{
        width: 209px;
        height: 290px;
        border-radius: 16px;
        object-fit: cover;
    }
    .img3{
        width: 181px;
        height: 234px;
        border-radius: 16px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
      .hero-title {
        font-size: 1.5rem;
      }

      .hero-images img {
        width: 150px;
        height: 220px;
      }
      .btn-staff{
        margin-bottom: 10px !important;
      }
    }
    canvas {
        filter: drop-shadow(0 0 6px rgba(255, 255, 255, 0.1));
    }
</style>
@endsection

@section('content')
<section class="hero-section">
  <div id="particles-js"></div>

  <div class="hero-content">
    <h1 class="hero-title mb-4">Welcome to Al Rushd <br> Where Young Minds Thrive</h1>
    <div class="hero-buttons">
      <a href="{{ route('staff-admission') }}" class="btn btn-staff">Staff Admission</a>
      <a href="{{ url('student-admission/step/1') }}" class="btn btn-student">Student Admission</a>
      <a href="{{ route('contact') }}" class="btn btn-staff">Contact Us</a>
      <a href="{{ route('debit.form') }}" class="btn btn-student">Debit Form</a>
    </div>
    <div class="hero-images">
      <img class="img1" src="{{ asset('frontend/assets/img/01.jpg') }}" alt="Kid 1">
      <img class="img2" src="{{ asset('frontend/assets/img/02.png') }}" alt="Kid 2">
      <img class="img3" src="{{ asset('frontend/assets/img/03.jpg') }}" alt="Kid 3">
    </div>
  </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
  particles: {
    number: {
      value: 50,
      density: {
        enable: true,
        value_area: 800
      }
    },
    color: {
      value: "#ffffff"
    },
    shape: {
      type: "circle"
    },
    opacity: {
      value: 0.5,
      random: false
    },
    size: {
      value: 6, // bigger circles
      random: true
    },
    line_linked: {
      enable: true,
      distance: 150, // distance to draw line between
      color: "#ffffff",
      opacity: 0.3,
      width: 1
    },
    move: {
      enable: true,
      speed: 2,
      direction: "none",
      out_mode: "out"
    }
  },
  interactivity: {
    detect_on: "canvas",
    events: {
      onhover: {
        enable: true,
        mode: "grab" // Connect line between particles on hover
      },
      onclick: {
        enable: false,
        mode: "push"
      },
      resize: true
    },
    modes: {
      grab: {
        distance: 200,
        line_linked: {
          opacity: 0.6
        }
      }
    }
  },
  retina_detect: true
});

</script>

@endsection