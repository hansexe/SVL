<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
   protected $table='ingreso';
   protected $primaryKey='idingreso';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'idproveedor',
      'tipo_comprobante',
      'serie_comprobante',
      'num_comprobante',
      'fecha_hora',
      'impuesto',
      'estado'

   ];

   protected $guarded =[


   ];
}
