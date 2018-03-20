
<div class="col-md-12">
    <div class="form-group{{ $errors->has("name") ? ' has-error' : '' }}">
        {!! Form::label("name", 'Nome', ['class' => '']) !!}
        {!! Form::text("name", null, ["class" => "form-control", 'id'=>'name','required','placeholder'=>"Digite um Nome",'required'])  !!}
        <small class="text-danger">{{ $errors->first("name") }}</small>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
        {!! Form::label("email", 'Email', ['class' => '']) !!}
        {!! Form::email("email", null, ["class" => "form-control", 'id'=>'email','required','placeholder'=>"Digite um email",'required'])  !!}
        <small class="text-danger">{{ $errors->first("email") }}</small>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group{{ $errors->has("login") ? ' has-error' : '' }}">
        {!! Form::label("login", 'Login', ['class' => '']) !!}
        {!! Form::text("login",null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first("login") }}</small>
    </div>
</div>



