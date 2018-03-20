@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="form-signin">
            <div class="login-logo">
                <strong><a href="{{url('/')}}"><img class="img img-responsive" src="{{ asset('images/logo_small.png') }}" alt=""></a></strong>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-12 text-center">Endereço de email</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Recuperar senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>

@endsection
