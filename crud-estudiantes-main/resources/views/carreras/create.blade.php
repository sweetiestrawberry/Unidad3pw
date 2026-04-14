@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6 border-b border-red-800 pb-2">
    Registrar Nueva Carrera
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
<form action="{{ route('carreras.store') }}" method="POST">
    @csrf

    <div class="mb-5">
        <label class="block mb-2 font-semibold">Nombre de la Carrera</label>
        <input type="text" name="nombre" 
               class="w-full p-2 rounded bg-black border border-red-700 focus:outline-none focus:ring-2 focus:ring-red-700"
               required>
    </div>

    <div class="flex gap-3">
        <button class="bg-red-700 hover:bg-red-800 px-5 py-2 rounded transition">
            Guardar
        </button>

        <a href="{{ route('carreras.index') }}" 
           class="bg-gray-700 hover:bg-gray-800 px-5 py-2 rounded transition">
            Cancelar
        </a>
    </div>

</form>
</div>

@endsection