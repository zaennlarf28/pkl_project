<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/backend/images/logos/favicon.png')}}" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/styles.css')}}" />

  <title>Modernize Bootstrap Admin</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset('assets/backend/images/logos/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div class="radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="col-md-8 col-lg-5 col-xxl-3">
    <div class="card">
      <div class="card-body">
        <div class="text-center mb-4">
          <img src="{{ asset('assets/backend/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" style="height: 40px;" />
        </div>

        <div class="text-center mb-4">
          <h4 class="fw-bold">Login</h4>
        </div>

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" type="email"
              class="form-control @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
              <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password"
              class="form-control @error('password') is-invalid @enderror"
              name="password" required>
            @error('password')
              <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="d-flex justify-content-between mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                Remember Me
              </label>
            </div>
            <a class="text-primary" href="{{ route('password.request') }}">
              Forgot Password?
            </a>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-success">
              Login
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->
  <script src="{{asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/backend/libs/simplebar/dist/simplebar.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/app.init.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/theme.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/app.min.js')}}"></script>

  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>