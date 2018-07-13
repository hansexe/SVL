<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';
   protected $primaryKey='idarticulo';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'nombre',
      'descripcion',
      'condicion',
      'stock',
      'descripcion',
      'imagen',
      'estado'

   ];

   protected $guarded =[


   ];
}
