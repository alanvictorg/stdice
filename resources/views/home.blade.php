@extends('layouts.app')

@section('htmlheader_title')
    Início
@endsection
@section('contentheader_title')
@endsection

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-pencil "></i></span>

                    <div class="info-box-content alter-box">
                        <span class="info-box-text">Alunos Matriculados</span>
                        <span class="info-box-number">{!! $students->count() !!}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width:{!! $percentStudents !!}%"></div>
                        </div>
                        <span class="progress-description">
                    {!! $percentStudents !!}% de todos cadastrados
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-superpowers "></i></span>

                    <div class="info-box-content alter-box">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-superpowers "></i></span>

                    <div class="info-box-content alter-box">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

        </div>
        <h3>Calendário</h3>

        <div class="panel-body" >

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}

        </div>
    </section>
@endsection
@section('scriptpage')

    <script>
        $(function() {

            $('#calendar').fullCalendar({
                locale: 'pt-br'
            });

        });


    </script>

@endsection
