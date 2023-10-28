<?php
namespace App\Repositories;
use App\Models\Alumno;
class AlumnoRepository{
public function obtenerAlumnos(){
    return Alumno::all();
}
public function obtenerAlumnosPorId($id) {
    return Alumno::find($id);
}
public function insertarAlumno($alumno){
    Alumno::create([
    'nombre'=>$alumno->nombre,
    'apellido'=>$alumno->apellido,
    'edad'=>$alumno->edad,
    'direccion'=>$alumno->direccion,
    ]);
}
public function actualizarAlumno($id,$alumnoActualizar){
    $alumno=Alumno::find($id);
    $alumno->apellido=$alumnoActualizar->apellido;
    $alumno->edad=$alumnoActualizar->edad;
    $alumno->save();
}
public function eliminarAlumno($id){
$alumno=Alumno::find($id);
$alumno->delete();
}
}