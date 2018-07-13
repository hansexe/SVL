<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
   protected $table='persona';
   protected $primaryKey='idpersona';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'tipo_persona',
      'nombre',
      'tipo_documento',
      'num_documento',
      'direccion',
      'telefono',
      'email'

   ];

   protected $guarded =[


   ];
}
