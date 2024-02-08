@extends('layouts.app', ['activePage' => 'user.show', 'titlePage' => __('Detalle del Usuario')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Detalle del Usuario</h4>
                    <p class="card-category">Información del usuario</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" class="form-control" disabled
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" disabled
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
@endsection
