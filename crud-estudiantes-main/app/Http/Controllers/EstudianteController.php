<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:estudiantes',
            'carrera_id' => 'required',
            'semestre' => 'required|integer|min:1|max:12'
        ]);

        Estudiante::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'carrera_id' => $request->carrera_id,
            'semestre' => $request->semestre
        ]);

        return redirect('/estudiantes')->with('success', 'Estudiante registrado');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();

        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:estudiantes,correo,' . $id,
            'carrera_id' => 'required',
            'semestre' => 'required|integer|min:1|max:12'
        ]);
        
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'carrera_id' => $request->carrera_id,
            'semestre' => $request->semestre
        ]);

        return redirect('/estudiantes')->with('success', 'Estudiante actualizado');
    }

    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect('/estudiantes')->with('success', 'Estudiante eliminado');
    }
}