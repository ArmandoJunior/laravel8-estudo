@extends('layouts.site')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Confirmação de Inscrição</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>
                <strong>Evento: </strong>{{ $event->title }}<br>
                <strong>Dia: </strong>{{ $event->start_event }}
            </p>
            <p>
                <a href="{{ route('enrollment.proccess') }}" class="btn btn-success">
                    Confirmar Inscrição
                </a>
            </p>
        </div>
    </div>
@endsection
