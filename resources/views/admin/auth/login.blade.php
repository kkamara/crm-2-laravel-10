<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Admin | {{ config('app.name') }}</title>
  <link 
    rel="shortcut icon" 
    type="image/png" 
    href="{{ asset('adminAssets/images/logos/favicon.png') }}" 
  />
  <link rel="stylesheet" href="{{ asset('adminAssets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ route('adminLogin') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('adminAssets/images/logos/dark-logo.svg') }}" width="180" alt="">
                </a>
                <p class="text-center">App</p>
                <form method='POST' action="{{ route('adminLoginCreate') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input 
                        type="email" 
                        name="username" 
                        class="form-control @if(isset($errors) && $errors->count() && strlen($errors->first('username'))) is-invalid @endif" 
                        id="inputUsername" 
                        aria-describedby="emailHelp"
                    />
                    @if(isset($errors) && $errors->count() && strlen($errors->first('username')))
                        <div id="validationUsernameFeedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                  </div>
                  <div class="mb-4">
                    <label 
                        for="inputPassword" 
                        class="form-label"
                    >
                        Password
                    </label>
                    <input 
                        type="password"
                        name="password"
                        class="form-control @if(isset($errors) && $errors->count() && strlen($errors->first('password'))) is-invalid @endif" 
                        id="inputPassword"
                    />
                    @if(isset($errors) && $errors->count() && strlen($errors->first('password')))
                        <div id="validationPasswordFeedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input 
                        class="form-check-input primary" 
                        type="checkbox" 
                        value=""
                        id="rememberToken"
                        name="rememberToken"
                      />
                      <label class="form-check-label text-dark" for="rememberToken">
                        Remember this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="{{ route('resetAdminPassword') }}">Forgot Password ?</a>
                  </div>
                  <input
                    class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                    type='submit'
                    value='Sign In'
                  />
                  <div class="d-flex align-items-center justify-content-center">
                    {{-- <p class="fs-4 mb-0 fw-bold">New to Modernize?</p> --}}
                    {{-- <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('adminAssets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminAssets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>