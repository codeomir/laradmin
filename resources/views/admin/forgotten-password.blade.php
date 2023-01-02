@extends('admin.layouts.auth')

@section('title', 'Forgotten password')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/admin">LAR<b>ADMIN</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your email to retrieve your password</p>
        @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                @foreach(session('errors')->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
      <form action="/admin/forgot-my-password" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send email</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection