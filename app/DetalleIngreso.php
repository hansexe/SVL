<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
   protected $table='detalle_ingreso';
   protected $primaryKey='iddetalle_ingreso';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'idingreso',
      'idarticulo',
      'cantidad',
      'precio_compra',
      'precio_venta'

   ];

   protected $guarded =[


   ];
}
