
<div class="col-md-12">
    <div class="form-group{{ $errors->has("name") ? ' has-error' : '' }}">
        {!! Form::label("name", 'Nome', ['class' => '']) !!}
        {!! Form::text("name", null, ["class" => "form-control", 'id'=>'name','required','placeholder'=>"Digite um Nome",'required'])  !!}
        <small class="text-danger">{{ $errors->first("name") }}</small>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group{{ $errors->has("description") ? ' has-error' : '' }}">
        {!! Form::label("description", 'Descrição', ['class' => '']) !!}
        {!! Form::text("description", null, ["class" => "form-control", 'id'=>'description','placeholder'=>"Digite uma descrição",'required'])  !!}
        <small class="text-danger">{{ $errors->first("emdescriptionail") }}</small>
    </div>
</div>




