@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.profile.update') }}" method="post">
                @csrf
                @method('PUT')

                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Dados Pessoais</h3>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Nome Completo</label>
                    <input value="{{ $user->name }}"
                           type="text" name="user[name]"
                           class="form-control @error('user.name') is-invalid @enderror">
                    @error('user.name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Email</label>
                    <input value="{{ $user->email }}"
                           type="text" name="user[email]"
                           class="form-control @error('user.email') is-invalid @enderror">
                    @error('user.email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Senha</label>
                    <input type="password" name="user[password]"
                           class="form-control @error('user.password') is-invalid @enderror"
                           placeholder="Trocar a senha">
                    @error('user.password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Confirmar Senha</label>
                    <input type="password" name="user[password_confirmation]" class="form-control">
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Dados do Perfil</h3>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Sobre</label>
                    <textarea name="profile[about]" cols="30" rows="10" class="form-control">
                         {{ $user->profile->about }}
                    </textarea>
                </div>

                <div class="form-group mt-3">
                    <label>Contato</label>
                    <input value="{{ $user->profile->phone }}" type="text" name="profile[phone]" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label class="mb-0">Redes Sociais</label>
                    <hr>
                    @php $socialNetworks = $user->profile->socialNetworks; @endphp

                    <label class="mt-0">Facebook</label>
                    <input type="text" name="profile[social_networks][facebook]"
                           class="form-control @error('profile.social_networks.facebook') is-invalid @enderror"
                           value="{{ $socialNetworks['facebook']??null }}">
                    @error('profile.social_networks.facebook')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <label class="mt-3">Twitter</label>
                    <input type="text" name="profile[social_networks][twitter]"
                           class="form-control @error('profile.social_networks.twitter') is-invalid @enderror"
                           value="{{ $socialNetworks['twitter']??null }}">
                    @error('profile.social_networks.twitter')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <label class="mt-3">Instagram</label>
                    <input type="text" name="profile[social_networks][instagram]"
                           class="form-control @error('profile.social_networks.instagram') is-invalid @enderror"
                           value="{{ $socialNetworks['instagram']??null }}">
                    @error('profile.social_networks.instagram')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-success mt-3">
                    Atualizar Perfil
                </button>
                <br>
            </form>
        </div>
    </div>
@endsection
