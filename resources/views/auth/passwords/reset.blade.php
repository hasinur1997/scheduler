@extends('layouts.master')
@section('main')
    <div class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/') }}"><b>{{ config('app.name', 'Laravel') }}</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                <p class="login-box-msg">Reset your password</p>

                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Reset Now</button>
                        </div>
                    <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
        </div>
    </div>
    <!-- /.register-box -->
@endsection
