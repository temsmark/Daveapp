<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!-- Font-icon css-->
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h2>Part-Time Teaching Claim System <i><sup>Beta <sup>V.1</sup> </sup></i></h2>

        @if (Session::has('message'))

              <div id="alert-out" class="alert alert-info">

              <h3 class="text-center">     {{Session::get('type','You have successfully been logged out of the application')}}</h3>
              </div>

          @endif
      </div>
      <div class="login-box">
        <form method="POST" class="login-form" action="{{ route('login') }}">
          @csrf
          <h3 class="login-head"><img src="{{asset('images/avatar.png')}}"  height="80px" width="80px"></h3>

          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
          </div>


          <div class="form-group">
            <label for="password" class="control-label">{{ __('Password') }}</label>

              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
              @endif
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>

        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('valijs/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('valijs/popper.min.js')}}"></script>
    <script src="{{asset('valijs/bootstrap.min.js')}}"></script>
    <script src="{{asset('valijs/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('valijs/plugins/pace.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });

      setTimeout(function () {
        $('#alert-out').hide();
      },3000);
    </script>
  </body>
</html>