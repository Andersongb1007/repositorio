@extends('layouts.app', ['activePage' => 'zip.index', 'titlePage' => __('Lista de zip')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Lista de zip</h4>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-ligth text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Rol</th>
                                                <th>Ultima Modificación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($zips as $zip)
                                                <tr>
                                                    <td>{{ $zip->id }}</td>
                                                    <td>{{ $zip->name }}</td>
                                                    <td>{{ $zip->updated_at }}</td>
                                                    <td class="d-flex justify-content-around" role="group">

                                                        <a href="{{ route('zip.edit', $zip) }}"
                                                            class="btn btn-success btn-sm transition " type="button">
                                                            <i class="material-icons">edit</i>
                                                        </a>

                                                        <a href="{{ route('zip.show', $zip) }}"
                                                            class="btn btn-primary btn-sm transition  " type="button">
                                                            <i class="material-icons">
                                                                visibility</i>
                                                        </a>


                                                        <form action="{{ route('zip.destroy', $zip) }}" method="POST"
                                                            id="delete-form">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm transition" type="submit">
                                                                <i class="material-icons">
                                                                    delete</i></button>
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
        <script>
            $(document).ready(function() {
                $("#example2").DataTable({
                    "responsive": true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                });

                $("form[id^='delete-form-']").submit(function(event) {
                    event.preventDefault(); // Evitar el envío del formulario

                    var formId = $(this).attr('id');
                    var asignaturaId = formId.replace('delete-form-', '');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Esta acción eliminará la asignatura y su relación con el master. ¿Estás seguro de continuar?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Si el usuario confirma, enviar el formulario
                            $("#" + formId).submit();
                        }
                    });
                });
            });
        </script>
    @endsection
