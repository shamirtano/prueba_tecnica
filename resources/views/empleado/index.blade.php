@extends('template.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Empleados</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('empleado.create') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-user-plus"></i> Crear</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table table-striped table-bordered" id="empleado-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-at"></i> Email</th>
                        <th><i class="fas fa-venus-mars"></i> Sexo</th>
                        <th><i class="fas fa-briefcase"></i> Area</th>
                        <th><i class="fas fa-envelope"></i> Boletin</th>
                        <th><i class="fas fa-edit"></i> Modificar</th>
                        <th><i class="fas fa-trash"></i> Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->sexo()  }}</td>
                            <td>{{ $empleado->area }}</td>
                            <td>{{ $empleado->boletin() }}</td>
                            <td class="text-center">
                                <a href="{{ route('empleado.edit', $empleado->id) }}" class="btn btn-warning btn-sm" title="Modificar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('empleado.delete', $empleado->id) }}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    @if (session('success'))
        <script>
            swal({
                title: "{{ session('success') }}",
                text: "",
                icon: "success",
                button: "OK",
            });
        </script>
    @else
        @if (session('error'))
            <script>
                swal({
                    title: "{{ session('error') }}",
                    text: "",
                    icon: "error",
                    button: "OK",
                });
            </script>
        @endif
    @endif

    <script>
        $(document).ready(function() {
            $('#empleado-table').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                order: [[ 0, "desc" ]],
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
                pageLength: 25,
                columnDefs: [
                    {
                        targets: [0],
                        visible: false,
                        searchable: false
                    }
                ]
            });

            $('#empleado-table').on('click', '.btn-danger', function(e) {
                e.preventDefault();
                swal({
                    title: "Estás seguro?",
                    text: "No podrás recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('form').submit();
                    } else {
                        swal("El registro está a salvo!");
                    }
                });
            });
        });


    </script>
@endsection
