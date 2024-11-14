<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Admin - GrowGreen</title>
        <!-- Favicons -->
        <link href="images/favicon.png" rel="icon">
        <style>
            .material-half-bg .cover {
                background-color: #28a745 !important;
            }
        </style>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    <section class="login-content">
      <div class="logo">
        <a class="app-header__logo" href="" style="background: none; font-size: 40px;"><img src="{{asset('sucrai/assets/images/logo.png')}}" alt="" width="200"></a>
      </div>

      <div class="login-box">

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
      
		<form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i> SIGN IN </h3>
            @if ($errors->any())
            <span class="text-danger font-weight-bold">
                
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                
            </span>
        @endif
          <div class="form-group">
            <label class="control-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
			 
          </div>

          <div class="form-group">
            <label class="control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
             
          </div>
          
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">

               <!-- <p class="semibold-text mb-2"><a href="{{url('register')}}"> Register Now </a></p> -->

              </div>
              <!-- <p class="semibold-text mb-2"><a href="javascript:void(0);" data-toggle="flip">Forgot Password ?</a></p> -->
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>

        
      </div>
   <!--    <div class="row">
         <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              <a href="{{url('/redirect_google')}}" class="btn btn-primary">Login with Google</a>
            </div>
        </div>
      </div> -->
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{url('public/backend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('public/backend/js/popper.min.js')}}"></script>
    <script src="{{url('public/backend/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/backend/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{url('public/backend/js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>