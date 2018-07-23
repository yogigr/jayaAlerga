
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url('login') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
          <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}"
          autocomplete="off">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if($errors->has('username'))
            <span class="help-block">
              {{ $errors->first('username') }}
            </span>
          @endif
        </div>
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           @if($errors->has('password'))
            <span class="help-block">
              {{ $errors->first('password') }}
            </span>
          @endif
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <script src="{{ asset('js/app.js') }}"></script>
</script>
</body>
</html>
