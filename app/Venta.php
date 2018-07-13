<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
     protected $table='venta';
   protected $primaryKey='idventa';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'idcliente',
      'tipo_comprobante',
      'serie_comprobante',
      'num_comprobante',
      'fecha_hora',
      'impuesto',
      'total_venta', 
      'estado'

   ];

   protected $guarded =[


   ];
}
