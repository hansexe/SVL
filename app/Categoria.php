<?php 
namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

/*paso 4 - indicar en la clase la base de datos y la llave primaria*/

class Categoria extends Model
{
   protected $table='categoria';
   protected $primaryKey='idcategoria';

   public $timestamps=false;

/*paso 4 - indicar las tablas de la base de datos al modelo*/

   protected $fillable = [
      'nombre',
      'descripcion',
      'condicion'

   ];

   protected $guarded =[


   ];
}
