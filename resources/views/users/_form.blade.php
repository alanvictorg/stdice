<div class="col-md-12">
    @isset($role)
        <div class="form-group{{ $errors->has("user[role_id]") ? ' has-error' : '' }}">
            {!! Form::label("user[role_id]", 'Função', ['class' => '']) !!}
            <select class="form-control" id="roles" required="required" name="user[role_id]">
                @foreach($roles as $item)
                    <option value="{{$item->id}}" {{$item->id == $role->id ? "selected": ""}}>{{$item->name}}</option>
                @endforeach
            </select>

            <small class="text-danger">{{ $errors->first("user[role_id]") }}</small>
        </div>
    @endisset
    @empty($role)
        <div class="form-group{{ $errors->has("user[role_id]") ? ' has-error' : '' }}">
            {!! Form::label("user[role_id]", 'Função', ['class' => '']) !!}
            {!! Form::select("user[role_id]", $roles, null, ["class" => "form-control", 'id'=>'roles','required','placeholder'=>"Escolhar uma Função",'required'])  !!}
            <small class="text-danger">{{ $errors->first("user[role_id]") }}</small>
        </div>
    @endempty
</div>

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
    <div class="form-group{{ $errors->has("imagepath") ? ' has-error' : '' }}">
        {!! Form::label("imagepath", 'Foto', ['class' => '']) !!}
        {!! Form::file("imagepath", ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first("imagepath") }}</small>
    </div>
</div>



