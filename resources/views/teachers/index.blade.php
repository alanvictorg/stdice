@extends('layouts.app')

@section('htmlheader_title')
    Professores
@endsection

@section('csspage')
    {{--{!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}--}}
    {{--{!! Html::style('plugins/datatables/jquery.dataTables.min.css') !!}--}}
@endsection
@section('contentheader_title')
    Listagem de Professores
@endsection


@section('breadcrumb')
    <li>
        <a href="{!! route('dashboard.index')!!}"><i class="fa fa-dashboard"></i>Inicial</a>
    </li>
    <li class="active">
        Listagem de Professores

    </li>
@endsection
@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Professores</h3>
                        <div class="pull-right">
                            <!-- Button trigger modal -->
                            <a href="#" data-toggle="modal" data-target="#createmodal"
                               class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus icon"></i> Criar Professor
                            </a>
                            @include("teachers._create")
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table-permission" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Login</th>
                                <th>Opções</th>
                            </tr>
                            @forelse($teachers as $teacher)
                                <tr>
                                    <td>{!! $teacher->name  !!}</td>
                                    <td>{!! $teacher->email !!}</td>
                                    <td>{!! $teacher->login !!}</td>
                                    <td>                                        {!! Form::open(['url' => route('teachers.destroy', $teacher),'method' => 'delete']) !!}

                                        <a href="{{ route('teachers.edit',$teacher)}}"
                                           class="btn btn-warning btn-circle"> <i class="fa fa-edit"
                                                                       aria-hidden="true"></i></a>
                                        <button type="submit"
                                                class="btn btn-danger btn-circle" style="float: right"><i class="fa fa-close"></i>
                                        </button>
                                        {!! Form::close() !!}
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