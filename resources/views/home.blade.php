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
                <div class="card" style="min-height: 580px">
                    <img src="{{ $event->banner?asset('storage/' . $event->banner):"https://via.placeholder.com/640x380.png/003388?text=BANNER" }}"
                         class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <i class="card-subtitle">Acontece em {{ $event->start_event->format('d/m/Y H:i:s') }}</i>
                        <p class="card-text">{{ $event->description }}</p>

                        <p><strong>Organizado por: </strong><a href="#"> {{ $event->owner_name }}</a></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('event.single', $event->slug) }}" class="btn btn-link">Visualizar Evento</a>
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
    <div class="row pt-5">
        {{ $events->appends(['search' => $search, 'categoryId' => $categoryId])->links() }}
    </div>
@endsection
