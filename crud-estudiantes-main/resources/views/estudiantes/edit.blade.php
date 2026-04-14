@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6 border-b border-red-800 pb-2">
    Editar Estudiante
</h2>

@if($errors->any())
    <div class="bg-red-700 p-4 mb-6 rounded shadow">
        <ul>
            @foreach($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-lg mx-auto bg-gray-900 p-6 rounded shadow-lg">

<form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Nombre -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Nombre</label>
        <input type="text" name="nombre" 
               value="{{ $estudiante->nombre }}"
               class="w-full p-2 rounded bg-black border border-red-700 
               focus:outline-none focus:ring-2 focus:ring-red-700">
    </div>

    <!-- Correo -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Correo</label>
        <input type="email" name="correo" 
               value="{{ $estudiante->correo }}"
               class="w-full p-2 rounded bg-black border border-red-700 
               focus:outline-none focus:ring-2 focus:ring-red-700">
    </div>

    <!-- Carrera -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Carrera</label>
        <select name="carrera_id" 
                class="w-full p-2 rounded bg-black border border-red-700">
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}"
                    {{ $carrera->id == $estudiante->carrera_id ? 'selected' : '' }}>
                    {{ $carrera->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Semestre -->
    <div class="mb-5">
        <label class="block mb-2 font-semibold">Semestre</label>
        <input type="number" name="semestre" 
               value="{{ $estudiante->semestre }}"
               class="w-full p-2 rounded bg-black border border-red-700">
    </div>

    <!-- BOTONES -->
    <div class="flex gap-3">
        <button class="bg-gray-700 hover:bg-gray-800 px-5 py-2 rounded transition">
            Actualizar
        </button>

        <a href="{{ route('estudiantes.index') }}" 
           class="bg-red-700 hover:bg-red-800 px-5 py-2 rounded transition">
            Cancelar
        </a>
    </div>

</form>

</div>

@endsection