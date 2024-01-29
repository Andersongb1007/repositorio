@extends('layouts.app', ['activePage' => 'registro.create', 'titlePage' => __('Cargar registros')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Cargar registros</h4>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('registro.store') }}" class="p-4"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="name">Nombre:</label>
                                                <input name="name" type="text" class="form-control" id="name"
                                                    value="{{ old('name') }}" placeholder="Nombre del archivo">
                                                @error('name')
                                                    <div class="text-danger mx-auto">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label for="archivos">Archivos:</label>
                                                <input name="archivos" type="file" class="" id="archivos"
                                                    value="{{ old('archivos') }}" placeholder="Nombre completo">
                                                @error('archivos')
                                                    <div class="text-danger mx-auto">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="mt-4 align-center mx-auto">
                                                <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                                                <a href="{{ route('registro.index') }}" class="btn btn-danger">Cancelar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
