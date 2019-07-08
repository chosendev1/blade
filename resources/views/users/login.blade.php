@extends('layouts.partials.master')
    @section('body')
<body class="animsition page-login layout-full page-dark">
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle">
        <div class="brand">
          <img class="brand-img" src="/assets/images/logo.png" alt="...">
          <h2 class="brand-text">Wola</h2>
        </div>
        <p>Sign into your account</p>
        @include('layouts.partials.errors')
        <form method="post" action="/login">
          {{ csrf_field() }}
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="text" class="form-control empty" id="inputName" name="username" required>
            <label class="floating-label" for="inputName">Username</label>
          </div>
          {{-- <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="email" class="form-control empty" id="inputEmail" name="email">
            <label class="floating-label" for="inputEmail">Email</label>
          </div> --}}
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty" id="inputPassword" name="password" required>
            <label class="floating-label" for="inputPassword">Password</label>
          </div>
          {{-- <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
              <input type="checkbox" id="inputCheckbox" name="remember">
              <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="float-right" href="forgot-password.html">Forgot password?</a>
          </div> --}}
          <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </form>
        {{-- <p>Still no account? Please go to <a href="register.html">Register</a></p> --}}

        <footer class="page-copyright page-copyright-inverse">
          {{-- <p>WEBSITE BY Creation Studio</p> --}}
          <p>Wola © 2019. All RIGHTS RESERVED.</p>
          <!-- <div class="social">
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-twitter" aria-hidden="true"></i>
                  </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-facebook" aria-hidden="true"></i>
                  </a>
            <a class="btn btn-icon btn-pure" href="javascript:void(0)">
          <i class="icon bd-google-plus" aria-hidden="true"></i>
                  </a>
          </div> -->
        </footer>
      </div>
    </div>
 @endsection
