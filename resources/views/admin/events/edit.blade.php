@extends('layouts.app')
@section('title') Editar Evento - @endsection
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h2>Criar Evento</h2>
            <a href="{{ route('admin.events.index') }}" class="btn btn-link">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input
                        value="{{ $event->title }}"
                        id="title"
                        name="title"
                        type="text"
                        class="form-control @error('title')) is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descrição Resumida</label>
                    <input
                        value="{{ $event->description }}"
                        id="description"
                        name="description"
                        type="text"
                        class="form-control @error('description')) is-invalid @enderror">
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Descrição Detalhada</label>
                    <textarea
                        name="body"
                        id="body"
                        cols="30"
                        rows="10"
                        class="form-control @error('body')) is-invalid @enderror">
                        {{ $event->body }}
                    </textarea>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="start_event">Data de Início</label>
                    <input
                        value="{{ $event->start_event->format('d/m/Y H:i:s') }}"
                        id="start_event"
                        name="start_event"
                        type="text"
                        class="form-control @error('start_event')) is-invalid @enderror">
                    @error('start_event')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <div class="row">
                        <div class="col-12">
                            Banner Evento
                            <hr>
                        </div>
                        <div class="col-4">
                            <img src="{{ $event->banner?asset('storage/' . $event->banner):'https://via.placeholder.com/640x280.png/009088?text=ImagemFail' }}"
                                 alt="Banner do Evento: {{ $event->title }}"
                                 class="img-fluid">
                        </div>
                        <div class="col-8">
                            <label>Carregar o Banner para o Evento</label>
                            <input type="file"
                                   name="banner",
                                   class="form-control @error('banner')) is-invalid @enderror">
                            @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-outline-success">Atualizar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let element = document.querySelector('input[name=start_event]');
        let inputMask = new Inputmask('99/99/9999 99:99:99');
        inputMask.mask(element);
    </script>
@endsection
