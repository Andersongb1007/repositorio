@extends('layouts.app', ['activePage' => 'registro.index', 'titlePage' => __('Lista de registro')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Lista de registro</h4>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="miTabla">
                                            <thead class="bg-ligth text-center">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Ultima Modificación</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                @foreach ($registros as $registro)
                                                    <tr>
                                                        <td>{{ $registro->id }}</td>
                                                        <td>{{ $registro->name }}</td>
                                                        <td>{{ $registro->updated_at }}</td>
                                                        <td class="d-flex justify-content-around" role="group">

                                                            <a href="{{ route('registro.show', $registro) }}"
                                                                class="btn btn-primary btn-sm transition  " type="button">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                            <form action="{{ route('registro.destroy', $registro) }}"
                                                                method="POST" id="delete-form-{{ $registro->id }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm transition"
                                                                    type="button"
                                                                    onclick="confirmDelete('delete-form-{{ $registro->id }}')">
                                                                    <i class="material-icons">delete</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
                // Aquí puedes agregar más opciones de configuración
            });

            // Función para confirmar la eliminación
            window.confirmDelete = function(formId) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            };
        });
    </script>
@endsection
