<?php

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

Route::get('/', HomeController::class)->name('home');

Route::resource('cursos',CursoController::class);
// si quiero cambiar la URL para que sea /asignaturas/... en lugar de 'cursos tengo la posibilidad de definirlo mediante parameters y names
//Route::resource('asignaturas', CursoController::class)->parameters(['asignaturas' => 'curso'])->names('cursos');
/* **** Agrupar las rutas por CursoController con group ****
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos','index')->name('cursos.index');
    Route::get('cursos/create','create')->name('cursos.create');
    Route::post('cursos','store')->name('cursos.store');
    Route::get('cursos/{curso}/edit','edit')->name('cursos.edit');
    Route::get('cursos/{curso}','show')->name('cursos.show');
    Route::put('cursos/{curso}','update')->name('cursos.update');
    Route::delete('cursos/{curso}','destroy')->name('cursos.destroy');
});
 */

 
/*
Route::get('cursos', [CursoController::class, 'index']);
Route::get('cursos/create', [CursoController::class, 'create']);
Route::get('cursos/{curso}', [CursoController::class, 'show']);

Route::get('cursos/{curso}/{categoria?}', function($curso, $categoria = null){
    if($categoria){
        return "Bienvenido al curso $curso, de la categoría $categoria";    
    }else{
        return "Bienvenido al curso $curso";
    }
}); */

Route::view('nosotros','nosotros')->name('nosotros'); //mostrar contenido estático como una vista
/*Route::get('contactanos', function(){
    $correo = new ContactanosMailable;

    Mail::to('mgbarragan@gmail.com')->send($correo);

    return "Mensaje enviado";
}); */

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');