<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlumnoRepository;

class AlumnoController extends Controller
{
    protected $alumnos;
    public function __construct(AlumnoRepository $alumnos){
        $this->alumnos=$alumnos;
    }
    public function index()
    {
        $alumnos=$this->alumnos->obtenerAlumnos();
        return view('alumnos.lista',['alumnos'=>$alumnos]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$validated = $request->validate([
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:25',
            'edad' => 'required|integer',
            'direccion' => 'required',
        ]);    */    
        $this->alumnos->insertarAlumno($request);
        return redirect()->action([AlumnoController::class,'index']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno=$this->alumnos->obtenerAlumnosPorId($id);
        return view('alumnos.ver',['alumno'=>$alumno]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno=$this->alumnos->obtenerAlumnosPorId($id);
        return view('alumnos.editar',['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$validated = $request->validate([
            'nombre' => 'required|min:3|max:25',
            'apellido' => 'required|min:3|max:25',
            'edad' => 'required|integer',
            'direccion' => 'required',
        ]);*/
        $this->alumnos->actualizarAlumno($request,$id);
        return redirect()->action([AlumnoController::class,'index']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->alumnos->eliminarAlumno($id);
        return redirect()->action([AlumnoController::class,'index']);
    }
}
