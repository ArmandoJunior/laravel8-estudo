@extends('layouts.app')
@section('title') Criar Eventos - @endsection
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h2>Criar Evento</h2>
            <a href="/admin/events/index" class="btn btn-link">Voltar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/admin/events/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input name="title" id="title" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Descrição Resumida</label>
                    <input name="description" id="description" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">Descrição Detalhada</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group ">
                    <label for="start_event">Data de Início</label>
                    <input name="start_event" id="start_event" type="text" class="form-control">
                </div>

                <button type="submit" class="btn btn-lg btn-outline-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection
