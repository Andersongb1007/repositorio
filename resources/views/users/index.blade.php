@extends('layouts.app', ['activePage' => 'user.index', 'titlePage' => __('Lista de Usuarios')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Botón Crear Usuario -->
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Crear Usuario</a>
                </div>
            </div>

            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Lista de Usuarios</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="userTable">
                                    <thead class="bg-light text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Ultima Modificación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td class="d-flex justify-content-around">
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); deleteConfirmation('{{ $user->id }}');">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables CSS y JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "paging": false,
                "info": false
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                });
            @endif
        });

        function deleteConfirmation(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
