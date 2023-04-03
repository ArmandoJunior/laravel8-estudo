@php use Faker\Provider\Color; @endphp
@extends('layouts.site')
@section('title')
    Lista dos Eventos -
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Eventos</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        @forelse($events as $event)
            <div class="col-4 pt-3">
                <div class="card" style="height: 450px">
                    <img src="https://via.placeholder.com/640x280.png/003388?text={{ Color::colorName() }}"
                         class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <i class="card-subtitle">Acontece em {{ $event->start_event->format('d/m/Y H:i:s') }}</i>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/eventos/{{ $event->slug }}" class="btn btn-link">Ir para Evento</a>
                    </div>
                </div>
            </div>
            @if(($loop->iteration % 3) == 0)
    </div>
    <div class="row">
        @endif
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Nenhum evento encontrado neste sistema!</div>
            </div>
        @endforelse
    </div>
@endsection
