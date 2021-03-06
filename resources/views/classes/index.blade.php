@extends('layouts.app')

@section('htmlheader_title')
    Turmas
@endsection

@section('csspage')
    {{--{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}--}}
    {{--{!! Html::style('plugins/datatables/jquery.dataTables.min.css') !!}--}}
@endsection
@section('contentheader_title')
    Listagem de Turmas
@endsection


@section('breadcrumb')
    <li>
        <a href="{!! route('dashboard.index')!!}"><i class="fa fa-dashboard"></i>Inicial</a>
    </li>
    <li class="active">
        Listagem de Turmas

    </li>
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Turmas</h3>
                        <div class="pull-right">
                            <!-- Button trigger modal -->
                            <a href="#" data-toggle="modal" data-target="#createmodal"
                               class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus icon"></i> Criar Turma
                            </a>
                            @include("classes._create")
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table-permission" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Curso</th>
                                <th>Professor</th>
                                <th>Turno</th>
                                <th>Opções</th>
                            </tr>
                            @forelse($classes as $class)
                                <tr>
                                    <td>{!! $class->name  !!}</td>
                                    <td>{!! $class->course->name  !!}</td>
                                    <td>{!! $class->teacher->name  !!}</td>
                                    <td>{!! strtoupper($class->turno) !!}</td>
                                    <td>                                        {!! Form::open(['url' => route('classes.destroy', $class),'method' => 'delete']) !!}

                                        <a href="{{ route('classes.edit',$class)}}"
                                           class="btn btn-warning btn-circle"> <i class="fa fa-edit"
                                                                       aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#createmodal1"
                                           class="btn btn-info btn-circle"> <i class="fa fa-user-plus"
                                                                       aria-hidden="true"></i></a>
                                        <a href="{{ route('classes.toassign',$class)}}"
                                           class="btn btn-warning btn-circle"> <i class="fa fa-cubes"
                                                                       aria-hidden="true"></i></a>

                                        <button type="submit"
                                                class="btn btn-danger btn-circle" style="float: right    "><i class="fa fa-close"></i>
                                        </button>

                                        {!! Form::close() !!}
                                        @include("classes._register")
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum registro foi encontrado!</td>
                                </tr>
                            @endforelse
                            </thead>
                            <tbody>
                        </table>
                    </div>
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
    <script>
        $.fn.select2.defaults.set("theme", "bootstrap");
        $.fn.select2.defaults.set('language', 'pt-BR');
    </script>
@endsection