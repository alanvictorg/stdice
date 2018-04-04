<div class="modal" id="createmodal" data-backdrop='false'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo Evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                {{--@include('errors._check')--}}

                {!! Form::open(['url'=>route('events.store')]) !!}
                @include('events._form')
                {!! Form::submit( 'Salvar', ['class'=>'btn btn-primary pull-right']) !!}

            </div>
            {{-- /.modal-body --}}
            <div class="modal-footer">
                <div id="category-success">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
