
<!doctype html>
<html lang="en" data-bs-theme="">
  

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    
   
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}">
    
    <style>body { display: none; }</style>
    
    <!-- Title -->
    <title>Lankan Express</title>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156446909-1"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-156446909-1");</script>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

          <!-- Image -->
          <div class="text-center">
            <img src="assets/img/t2.png" alt="..." class="img-fluid">
          </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
           Login 
          </h1>

          <!-- Subheading -->
      

          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label">
                Email Address
              </label>

              <!-- Input -->
              {{-- <input type="email" class="form-control" placeholder="name@address.com"> --}}
              <input id="email" type="email" placeholder="name@address.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

            </div>

            <!-- Password -->
            <div class="form-group">
              <div class="row">
                <div class="col">

                  <!-- Label -->
                  <label class="form-label">
                    Password
                  </label>

                </div>
              
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                {{-- <input class="form-control" type="password" placeholder="Enter your password"> --}}
                <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Icon -->
                <!--<span class="input-group-text">-->
                <!--  <i class="fe fe-eye"></i>-->
                <!--</span>-->

              </div>
            </div>

            <!-- Submit -->
            {{-- <button class="btn btn-lg w-100 btn-primary mb-3">
              Sign in
            </button> --}}
            <button type="submit" class="btn btn-lg w-100 btn-primary mb-3">
                {{ __('Login') }}
            </button>

            <!-- Link -->
            <div class="text-center">
              <small class="text-body-secondary text-center">
                Don't have an account yet? <a href="{{ route('register') }}">Register Here</a>.
              </small>
            </div>

          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT -->
    
    
  <!-- Vendor JS -->
  <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

  <!-- Theme JS -->
  <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
  </body>

</html>
