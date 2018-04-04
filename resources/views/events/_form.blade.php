
<div class="col-md-12">
    <div class="form-group{{ $errors->has("title") ? ' has-error' : '' }}">
        {!! Form::label("title", 'Título', ['class' => '']) !!}
        {!! Form::text("title", null, ["class" => "form-control", 'id'=>'title','required','placeholder'=>"Digite um título",'required'])  !!}
        <small class="text-danger">{{ $errors->first("title") }}</small>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group{{ $errors->has("start_date") ? ' has-error' : '' }}">
        {!! Form::label("start_date", 'Data inicial', ['class' => '']) !!}
        {!! Form::date("start_date", null, ["class" => "form-control", 'id'=>'start_date','required','placeholder'=>"Digite um email",'required'])  !!}
        <small class="text-danger">{{ $errors->first("start_date") }}</small>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group{{ $errors->has("end_date") ? ' has-error' : '' }}">
        {!! Form::label("end_date", 'Data final', ['class' => '']) !!}
        {!! Form::date("end_date",null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first("end_date") }}</small>
    </div>
</div>



