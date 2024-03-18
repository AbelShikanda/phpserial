@extends('admin.layouts.app_log')

@section('content')
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Smart Lock</b> Admin</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                
                @if(Session('error'))
                <div class="text-danger text-center" >
                    <strong>{{ Session('error') }}</strong>
                </div>
                @endif
                @if(Session('success'))
                <div class="text-success text-center" >
                    <strong>{{ Session('success') }}</strong>
                </div>
                @endif
                    <p class="login-box-msg">Welcome to print Shop Admin section</p>

                    <form action="{{ route('postLogin') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <div class="text-danger text-center" >
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-danger text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->
@endsection
