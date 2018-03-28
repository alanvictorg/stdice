@extends('layouts.app')

@section('htmlheader_title')
    Histórico
@endsection


@section('csspage')
    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/jquery.dataTables.min.css') !!}
@endsection
@section('contentheader_title')
    Histórico
@endsection
@section('contentheader_description')
    Histórico do aluno
@endsection
@section('breadcrumb')
    <li>
        <a href="{!! route('dashboard.index')!!}"><i class="fa fa-dashboard"></i>Inicial</a>
    </li>
    <li>
        <a href="{!! route('students.index')!!}"><i class="fa fa-feed"></i> Listagem de alunos</a>
    </li>
    <li class="active">
        Histórico - {!! $student->name !!}

    </li>
@endsection
@section('main-content')

    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-sis">
                    <h3 class="panel-heading text-center">Histórico Escolar
                        {{--<a class="pull-right" href="/pdf/ {{ $student->id }}">Imprimir</a>--}}
                    </h3>

                    <div class="panel-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif

                        <h4 class="row text-center">IDENTIFICAÇÃO DO DISCENTE</h4>
                        <div class="row">
                            <div class="col-xs-6 col-md-4 historico">Nome: {{$student->nome}}</div>
                            <div class="col-xs-6 col-md-4 historico"> RG: {{$student->rg}}</div>
                            <div class="col-xs-6 col-md-4 historico"> CPF: {{$student->cpf}}</div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 historico"> Naturalidade: {{$student->natural}}</div>
                            <div class="col-xs-6 historico">Data de Nascimento: {{$student->dt_nasc}}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 historico"> Filiação: {{$student->filiacao}}</div>
                        </div>
                        <div class="row historico">
                            <div class="col-xs-6 historico"> Curso: {{$student['course']->name}}</div>
                            <div class="col-xs-6 historico"> Matrícula: {{$student->matricula}}</div>
                        </div>

                        <div class="row historic">
                            <div class="col-md-1 text-center"><b>Status</b></div>
                            <div class="col-md-1 text-center"><b>Créd.</b></div>
                            <div class="col-md-1 text-center"><b>HS</b></div>
                            <div class="col-md-6 text-center"><b>Disciplina</b></div>
                            <div class="col-md-2 text-center"><b>Média</b></div>
                            <div class="col-md-1 text-center"><b>Ano</b></div>
                        </div>
                        <?php $key = 0; ?>
                        @foreach($student->classes as $key => $turma)
                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <div class="{{ $student->grades[$key]->status == 'studying' ? 'studying' : 'completed'}}"></div> </div>
                                <div class="col-md-1 text-center">{{$turma->credit}}</div>
                                <div class="col-md-1 text-center">{{$turma->hour_lesson}}</div>
                                <div class="col-md-6 text-center">{{$turma->name}}</div>
                                <div class="col-md-2 text-center">{{$student->grades[$key]->media}}</div>
                                <div class="col-md-1 text-center">{{$turma->year}}</div>
                            </div>
                            <?php $key++; ?>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
