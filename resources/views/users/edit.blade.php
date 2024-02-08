@extends('layouts.app', ['activePage' => 'user.edit', 'titlePage' => __('Editar Usuario')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('user.update', $user->id) }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Editar Usuario') }}</h4>
                                <p class="card-category">{{ __('Información del usuario') }}</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="{{ __('Nombre') }}" value="{{ old('name', $user->name) }}"
                                                required="true" aria-required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password"
                                        class="col-sm-2 col-form-label">{{ __('Nueva Contraseña') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password" id="password" type="password"
                                                placeholder="{{ __('Nueva Contraseña') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password_confirmation"
                                        class="col-sm-2 col-form-label">{{ __('Confirmar Nueva Contraseña') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                id="password_confirmation" type="password"
                                                placeholder="{{ __('Confirmar Nueva Contraseña') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
