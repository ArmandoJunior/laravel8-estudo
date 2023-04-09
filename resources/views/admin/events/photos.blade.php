@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <form action="{{ route('admin.events.photos.store', $event) }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Subir fotos do evento</label>
                    <input type="file"
                           name="photos[]"
                           class="form-control @error('photos.*') is-invalid @enderror @error('photos') is-invalid @enderror"
                           multiple>
                    @error('photos.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('photos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-lg btn-outline-secondary mt-2"> Enviar</button>
            </form>
            <hr>
        </div>
    </div>
    <div class="row">
        @forelse($event->photos as $photo)
            <div class="col-3 mb-4 text-center">
                <img src="{{ asset('storage/'. $photo->photo) }}"
                     alt="Fotos do Evento"
                     class="img-fluid">
                <form action="{{ route('admin.events.photos.destroy', [$event, $photo]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mt-1">
                        Remover
                    </button>
                </form>
            </div>
        @empty
            <div class="col-12">
                <div class="aler aler-warning">
                    Nenhuma foto registrada para este evento.
                </div>
            </div>
        @endforelse
    </div>
@endsection
