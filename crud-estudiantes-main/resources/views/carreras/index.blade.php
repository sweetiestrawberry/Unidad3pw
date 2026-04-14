@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6 border-b border-red-800 pb-2">
    Lista de Carreras
</h2>

<a href="{{ route('carreras.create') }}" 
   class="bg-red-700 hover:bg-red-800 px-5 py-2 rounded shadow mb-6 inline-block transition">
    + Nueva Carrera
</a>

<div class="bg-gray-900 p-4 rounded shadow-lg">
<table class="w-full border border-red-800 rounded overflow-hidden">
    <thead class="bg-red-900 text-white text-center">
        <tr>
            <th class="p-3">#</th>
            <th class="p-3">Nombre</th>
            <th class="p-3">Acciones</th>
        </tr>
    </thead>

    <tbody class="text-white text-center">
        @forelse($carreras as $carrera)
        <tr class="border-t border-red-800 hover:bg-red-950 transition">
            <td class="p-3">{{ $loop->iteration }}</td>
            <td class="p-3 font-medium">{{ $carrera->nombre }}</td>
            <td class="p-3 flex justify-center gap-3">

                <a href="{{ route('carreras.edit', $carrera->id) }}"
                   class="bg-gray-700 hover:bg-gray-800 px-4 py-1 rounded transition">
                    Editar
                </a>

                <form id="form-eliminar-{{ $carrera->id }}" 
                      action="{{ route('carreras.destroy', $carrera->id) }}" 
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button"
                    onclick="confirmarEliminacion({{ $carrera->id }}, 'carrera')"
                    class="bg-red-700 hover:bg-red-800 px-4 py-1 rounded transition">
                    Eliminar
                </button>
                </form>

            </td>
        </tr>

        @empty
        <tr>
            <td colspan="3" class="text-center p-6 text-gray-400">
                No hay carreras registradas
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>

@endsection