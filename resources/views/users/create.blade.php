@extends('layouts.app', ['activePage' => 'user.create', 'titlePage' => __('Crear Usuario')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Agregar Nuevo Usuario') }}</h4>
                                <p class="card-category">{{ __('Información del usuario') }}</p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="{{ __('Nombre') }}" required="true" aria-required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                placeholder="{{ __('Email') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password" class="col-sm-2 col-form-label">{{ __('Contraseña') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password" id="password" type="password"
                                                placeholder="{{ __('Contraseña') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="password_confirmation"
                                        class="col-sm-2 col-form-label">{{ __('Confirmar Contraseña') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                id="password_confirmation" type="password"
                                                placeholder="{{ __('Confirmar Contraseña') }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
