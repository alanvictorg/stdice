@extends('layouts.app')

@section('htmlheader_title')
    Grade da Turma
@endsection

@section('csspage')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/jquery.dataTables.min.css') !!}
@endsection
@section('contentheader_title')
    Grade da Turma
@endsection


@section('breadcrumb')
    <li>
        <a href="{!! route('dashboard.index')!!}"><i class="fa fa-dashboard"></i>Inicial</a>
    </li>
    <li class="active">
        Grade da Turma

    </li>
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Grade da Turma</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['url'=>route('classes.assign')]) !!}

                        <table id="table-permission" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>N1</th>
                                <th>N2</th>
                                <th>N3</th>
                                <th>Média</th>
                                <th>Faltas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($studentsOfClass as $key => $student)
                                <tr>
                                    {!! Form::hidden('students['.$key.'][student_id]', $student->id) !!}
                                    {!! Form::hidden('students['.$key.'][classe_id]', $student->grade->classe_id) !!}
                                    <td>{!! $student->nome  !!}</td>
                                    <td>{!! Form::text('students['.$key.'][n1]', $student->grade->n1, ["class" => "border-input",'placeholder'=>$student->grade->n1])  !!}</td>
                                    <td>{!! Form::text('students['.$key.'][n2]', $student->grade->n2, ["class" => "border-input",'placeholder'=>$student->grade->n2])  !!}</td>
                                    <td>{!! Form::text('students['.$key.'][n3]', $student->grade->n3, ["class" => "border-input",'placeholder'=>$student->grade->n3])  !!}</td>
                                    <td style="text-align: center">{!! Form::label($student->grade->media)  !!}</td>
                                    <td>{!! Form::text('students['.$key.'][presence]', $student->grade->presence, ["class" => "border-input",'placeholder'=>$student->grade->presence])  !!}</td>
                                    {{--<td>{!! strtoupper($class->turno) !!}</td>--}}
                                    {{--<td>--}}
                                    {{--<a href="{{ route('classes.edit',$class)}}"--}}
                                    {{--class="btn btn-warning"> <i class="fa fa-edit"--}}
                                    {{--aria-hidden="true"></i> Editar</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum registro foi encontrado!</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                        {!! Form::submit( 'Salvar', ['class'=>'btn btn-primary pull-left']) !!}

                    </div>


                {!! Form::close() !!}

                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('scriptpage')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
          rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

@endsection