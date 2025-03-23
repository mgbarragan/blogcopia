<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    // si no sigo la convención de nombres a la hora de crear el modelo con "php artisan make:model Curso"
    // que supone que el modelo Curso se relaciona con la tabla de la bdd cursos
    // tengo que poner la conexión del modelo con la tabla de la bdd así:
    // protected $table = "nombre_de_la_tabla"

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $fillable = ['name','descripcion','categoria'];
    protected $guarded = [];

    public function getRouteKeyName()
    {
        //método sobreescrito del padre Model para que la variable $curso devuelva el campo slug en lugar del campo id según el método de la clase padre Model
        return 'slug';
    }


}
