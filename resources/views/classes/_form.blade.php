
<div class="col-md-12">
    <div class="form-group{{ $errors->has("name") ? ' has-error' : '' }}">
        {!! Form::label("name", 'Nome', ['class' => '']) !!}
        {!! Form::text("name", null, ["class" => "form-control", 'id'=>'name','required','placeholder'=>"Digite um Nome",'required'])  !!}
        <small class="text-danger">{{ $errors->first("name") }}</small>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group{{ $errors->has("course_id") ? ' has-error' : '' }}">
        {!! Form::label("course_id", 'Curso', ['class' => '']) !!}
        {!! Form::select("course_id", $courses, null,["class" => "form-control", 'id'=>'course_id','required','placeholder'=>"Escolha um curso",'required'])  !!}
        <small class="text-danger">{{ $errors->first("course_id") }}</small>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group{{ $errors->has("teacher_id") ? ' has-error' : '' }}">
        {!! Form::label("teacher_id", 'Professor', ['class' => '']) !!}
        {!! Form::select("teacher_id", $teachers, null,["class" => "form-control", 'id'=>'teacher_id','required','placeholder'=>"Escolha um professor",'required'])  !!}
        <small class="text-danger">{{ $errors->first("teacher_id") }}</small>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group{{ $errors->has("turno") ? ' has-error' : '' }}">
        {!! Form::label("turno", 'Turno', ['class' => '']) !!}
        {!! Form::select("turno", $turnos, null,["class" => "form-control", 'id'=>'turno','required','placeholder'=>"Escolha um turno",'required'])  !!}
        <small class="text-danger">{{ $errors->first("turno") }}</small>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group{{ $errors->has("credit") ? ' has-error' : '' }}">
        {!! Form::label("credit", 'Créditos', ['class' => '']) !!}
        {!! Form::text("credit", null, ["class" => "form-control", 'id'=>'credit','required','placeholder'=>"Digite a quantidade de créditos",'required'])  !!}
        <small class="text-danger">{{ $errors->first("credit") }}</small>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group{{ $errors->has("hour_lesson") ? ' has-error' : '' }}">
        {!! Form::label("hour_lesson", 'Hora/aula', ['class' => '']) !!}
        {!! Form::text("hour_lesson", null, ["class" => "form-control", 'id'=>'hour_lesson','required','placeholder'=>"Digite a quantidade de hr/aula",'required'])  !!}
        <small class="text-danger">{{ $errors->first("hour_lesson") }}</small>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group{{ $errors->has("year") ? ' has-error' : '' }}">
        {!! Form::label("year", 'Ano', ['class' => '']) !!}
        {!! Form::text("year", null, ["class" => "form-control", 'id'=>'year','required','placeholder'=>"Digite o ano",'required'])  !!}
        <small class="text-danger">{{ $errors->first("year") }}</small>
    </div>
</div>



