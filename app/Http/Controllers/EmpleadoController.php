<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Areas;
use App\Models\Roles;


class EmpleadoController extends Controller
{
    /**
     * Muestra la lista de empleados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $empleados = Empleado::select('empleado.*', 'areas.nombre as area')
            ->join('areas', function($join) {
                $join->on('areas.id', '=', 'empleado.area_id');
            })->get();
        $data = [
            'title' => 'Lista de Empleados',
            'empleados' => $empleados
        ];
        return view('empleado.index', $data);
    }

    /**
     * Muestra el formulario de creación de empleado.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = [
            'title' => 'Crear Empleado',
            'areas' => Areas::all()
        ];
        return view('empleado.create', $data);
    }

    /**
     * Guardar empleado
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request){
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:empleado',
            'sexo' => 'required|string|max:1',
            'area_id' => 'required|integer',
            'descripcion' => 'nullable|string|max:255',
            'roles' => 'required|array'
        ]);
        if($validate){
            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $empleado->descripcion = $request->descripcion;
            $empleado->boletin = $request->boletin ? 1 : 0;
            $empleado->save();
            $this->storeRolEmpleado($request->roles, $empleado->id);
            return redirect()->route('empleado.index')->with('success', 'Empleado creado correctamente');
        }else{
            return redirect()->route('empleado.create')->with('error', 'Error al crear empleado');
        }
    }

    /**
     * Muestra el formulario de edición de empleado.
     */
    public function edit($id){
        $empleado = Empleado::find($id);
        if(isset($empleado)){
            $data = [
                'title' => 'Editar Empleado',
                'empleado' => $empleado,
                'areas' => Areas::all(),
                'roles' => $this->getRolesEmpleado($id)
            ];
            return view('empleado.edit', $data);
        }else{
            return redirect()->route('empleado.index')->with('error', 'Empleado no encontrado');
        }
    }

    /**
     * Actualiza un empleado.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $empleado = Empleado::find($id);
        $validate = $request->validate([
            'nombre' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:empleado,email,'.$id,
            'sexo' => 'required|string|max:1',
            'area_id' => 'required|integer',
            'descripcion' => 'required|string|max:255',
            'roles' => 'required|array'
        ]);
        if($validate){
            $empleado->nombre = $request->nombre;
            $empleado->email = $request->email;
            $empleado->sexo = $request->sexo;
            $empleado->area_id = $request->area_id;
            $empleado->descripcion = $request->descripcion;
            $empleado->boletin = $request->boletin ? 1 : 0;
            $empleado->save();
            $this->storeRolEmpleado($request->roles, $empleado->id);
            if(isset($empleado)){
                $empleado->update($request->all());
                return redirect()->route('empleado.index')->with('success', 'Empleado actualizado correctamente');
            }else{
                return redirect()->route('empleado.index')->with('error', 'Empleado no encontrado');
            }
        }else{
            return redirect()->route('empleado.edit', $id)->with('error', 'Error al actualizar empleado');
        }
    }

    /**
     * Elimina un empleado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $empleado = Empleado::find($id);
        if(isset($empleado)){
            $empleado->delete();
            return redirect()->route('empleado.index')->with('success', 'Empleado eliminado correctamente');
        }else{
            return redirect()->route('empleado.index')->with('error', 'Empleado no encontrado');
        }
    }

    /** ================= ROLES ======================= */

    /**
     * Insertar o actualizar empleado_rol
     */
    public function storeRolEmpleado($roles, $empleado_id){
        $empleado_rol = [];
        foreach($roles as $rol){
            $empleado_rol[] = [
                'empleado_id' => $empleado_id,
                'rol_id' => $rol
            ];
        }
        Roles::insert($empleado_rol);
    }

    /**
     * Get Roles por id de empleado
     */
    public function getRolesEmpleado($id){
        $empleado = Empleado::find($id);
        if(isset($empleado)){
            $roles = Roles::select('rol_id', 'roles.nombre')
                ->join('roles', 'empleado_rol.rol_id', '=', 'roles.id')
                ->where('empleado_id', $id)
                ->get();
            return $roles;
        }else{
            return redirect()->route('empleado.index')->with('error', 'Empleado no encontrado');
        }
    }
}
