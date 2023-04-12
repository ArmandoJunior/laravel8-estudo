@extends('layouts.site')
@section('title') Evento: {{ $event->title }} -@endsection
@section('content')
    @if($event->banner)
        <div class="row mb-3">
            <div class="col-12">
                <img src="{{ asset('storage/' . $event->banner) }}"
                     alt="Banner do Evento {{ $event->title }}"
                     class="img-fluid">
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between">
            <h2>Evento: {{ $event->title }}</h2>
            <p>O evento ocorrerá em {{$event->start_event->format('d/m/Y H:i:s')}}</p>
        </div>
        <div>
            @if($event->enrollments->contains(auth()->user()))
                <a href="{{ route('enrollment.start', $event->slug) }}" class="btn btn-success disabled" >Inscrito</a>
            @else
                <a href="{{ route('enrollment.start', $event->slug) }}" class="btn btn-success">Inscrever-se</a>
            @endif
        </div>
    </div>

    <div class="col-12 pt-4">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">Sobre</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Descrição</button>
            </li>
            @if($event->photos()->count())
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="false">Fotos</button>
                </li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-3" id="about" role="tabpanel" aria-labelledby="about-tab">
                {{ $event->body }}
            </div>
            <div class="tab-pane fade pt-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                {{ $event->description }}
            </div>
            @if($event->photos()->count())
                <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                    <div class="row">
                        @foreach($event->photos as $photo)
                            <div class="col-3">
                                <img src="{{ $photo->photo }}" alt="Foto do Evento {{ $event->title }}" class="img-fluid pt-4">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
