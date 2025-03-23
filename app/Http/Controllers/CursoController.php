<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\StoreCurso;
use App\Mail\ContactanosMailable;
use Symfony\Component\ErrorHandler\Debug;

class CursoController extends Controller
{
    public function index() {
        //$cursos = Curso::all();
        $cursos = Curso::orderBy('id', 'desc')->paginate(5);
        //return $cursos;
        return view('cursos.index',compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }

    public function store(StoreCurso $request){
        
        /* $curso = new Curso();
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save(); */
        /* Esto hace lo mismo que el bloque anterior
        $curso = Curso::create([
            'name' => request('name'),
            'descripcion' => request('descripcion'),
            'categoria' => request('categoria')
        ]); */
        //esto hace lo mismo que los 2 bloques anteriores
        $curso = Curso::create($request->all());
        Mail::to('prueba@prueba.com')->send(new ContactanosMailable($curso));
        return redirect()->route('cursos.show', $curso);

    }

    public function show(Curso $curso){
        //compact('curso') obtiene un array así ['curso' => $curso]
        //return view('cursos.show', ['curso' => $curso]);

       // $curso = Curso::find(Curso $curso);
        //return $curso;
        return view('cursos.show',compact('curso'));
        //return view('cursos.show',compact('curso'));
    }

    public function edit(Curso $curso){
        //return $curso;
        //$curso = Curso::find($id);
        return view('cursos.edit', compact('curso'));
    }
/*  otra forma  
    public function edit($id){
        $curso = Curso::find($id);
        return $curso;
    }

*/
    public function update(Request $request, Curso $curso){

        $request->validate([
            'name' => 'required|max:50',
            'slug' => 'required|unique:cursos,slug,' . $curso->id,
            'descripcion' => 'required|min:10',
            'categoria' => 'required'
        ]);


        /* $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;
        $curso->save(); */
        $curso->update($request->all());
        
        return redirect()->route('cursos.show', $curso);
    
    }

    public function destroy(Curso $curso){
        //return $curso;
        $curso->delete();
        return redirect()->route('cursos.index', $curso);
    }
}
