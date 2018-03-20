@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="form-signin">
            <div class="login-logo">
                <strong><a href="{{url('/')}}"><img class="img img-responsive" src="{{ asset('images/logo_small.png') }}" alt=""></a></strong>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="text-center mt-3">Entre com as suas informações</p>
                {{ Form::open(['url'=>route('login')]) }}

                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control"  placeholder="Digite seu email" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password" class="form-control" placeholder="Digite Sua Senha" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar?
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"> Entrar <i class="fa fa-arrow-right"></i></button>
                        </div>
                        <!-- /.col -->
                    </div>
                {{ Form::close() }}
                <div class="col-md-12 text-center mt-3">
                <a href="{{ route('password.request') }}">Esqueceu a senha</a><br>
            </div>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

@endsection
