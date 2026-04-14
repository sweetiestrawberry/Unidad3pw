<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Estudiantes</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f0f0f;
        }
    </style>
</head>
<body class="text-white">

    <!-- Navbar -->
    <nav class="bg-red-900 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">CRUD Colegio</h1>
            <div class="space-x-4">
                <a href="{{ route('estudiantes.index') }}" 
                   class="hover:text-red-300 {{ request()->routeIs('estudiantes.*') ? 'underline' : '' }}">
                    Estudiantes
                </a>
                <a href="{{ route('carreras.index') }}" 
                   class="hover:text-red-300 {{ request()->routeIs('carreras.*') ? 'underline' : '' }}">
                    Carreras
                </a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mx-auto mt-8 p-4">
        @yield('content')
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Mensajes bonitos -->
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'CRUD Colegio',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#b91c1c',
            background: '#111827',
            color: '#ffffff'
        });
    </script>
    @endif

    <!-- FUNCIÓN GLOBAL PARA ELIMINAR -->
    <script>
    function confirmarEliminacion(id, tipo = 'carrera') {

        let mensaje = tipo === 'estudiante' 
            ? '¿Estás seguro de eliminar este estudiante?' 
            : '¿Estás seguro de eliminar esta carrera?';

        let formId = tipo === 'estudiante'
            ? 'form-eliminar-estudiante-' + id
            : 'form-eliminar-' + id;

        Swal.fire({
            title: 'CRUD Colegio',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#b91c1c',
            cancelButtonColor: '#374151',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            background: '#111827',
            color: '#ffffff'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
    </script>

</body>
</html>