@extends('inspinia::layouts.auth')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <h3>Welcome to Web Secutity Analyzer</h3>
      <p>Login in. To see it in action.</p>
      <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
       {{ csrf_field() }}
       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
       </div>
       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
       </div>
       <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
       <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
       <p class="text-muted text-center"><small>Do not have an account?</small></p>
       <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
      </form>
      <p class="m-t"> <small>Secure Your Website With WS-Analyzer &copy; {{ date('Y') }}</small> </p>
    </div>
</div>
@endsection
