@extends('admin.layouts.auth')

@section('title', 'Retrieving password')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/admin">LAR<b>ADMIN</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your email and your new password</p>
        @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                @foreach(session('errors')->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
      <form method="post">
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
          <input type="password" class="form-control" placeholder="New password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmation password" name="password_confirmation">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Update password</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection