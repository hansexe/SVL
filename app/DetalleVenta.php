<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
 protected $table='detalle_venta';
   protected $primaryKey='iddetalle_venta';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'idventa',
      'idarticulo',
      'cantidad',
      'precio_venta',
      'descuento'
      ];

   protected $guarded =[


   ];
}
