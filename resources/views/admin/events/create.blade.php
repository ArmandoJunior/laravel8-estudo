@extends('layouts.app')
@section('title') Criar Eventos - @endsection
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h2>Criar Evento</h2>
            <a href="{{ route('admin.events.index') }}" class="btn btn-link">Voltar</a>
        </div>
    </div>
    {{--
    @if($errors->any())
        <div class="alert alert-danger">
            <p>Corrija os erros descritos no formulário abaixo</p>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif
    --}}
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.events.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input
                        name="title"
                        id="title"
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
                        name="description"
                        id="description"
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
                        class="form-control @error('body')) is-invalid @enderror"></textarea>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="start_event">Data de Início</label>
                    <input
                        name="start_event"
                        id="start_event"
                        type="text"
                        class="form-control @error('start_event')) is-invalid @enderror">
                    @error('start_event')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-outline-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection
