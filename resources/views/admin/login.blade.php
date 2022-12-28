@extends('admin.layouts.auth')

@section('title', 'Log in')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/admin">LAR<b>ADMIN</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                @foreach(session('errors')->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
      <form action="/admin" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="/admin/forgot-my-password">I forgot my password</a>
      </p>
    </div>
  </div>
</div>

@endsection