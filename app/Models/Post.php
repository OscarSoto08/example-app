<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute; //? llamada a la definicion del mutador
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //* Agregar factories
    use HasFactory;

    // * Si no se define el método protegido $table, entonces Eloquen asume la tabla como el nombre de la clase
    //* Laravel está hecho en ingles asi que busca por el plural en ingles ej: lapiz => lapizs
    protected $table = 'post';

    //? Para asignacion masiva:
    //protected $fillable = []; //*Campos que van a ser permitidos
    protected $guarded = [/** status */]; //* Campos que no se van a guardar dentro de la bd

    //? Hacer que un atributo pase por un filtro antes de ser ingresado
    public function category():Attribute{
        return Attribute::make(
            set: function($value){ //* Se ejecuta justo cuando lo estoy almacenando en la base de datos
            return strtolower($value);
        },
        get: function($value){ //* Se ejecuta justo cuando voy a recuperar los datos de la bd
            return ucfirst($value);
        });
    }
}
