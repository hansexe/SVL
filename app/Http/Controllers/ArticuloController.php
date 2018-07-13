<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Articulo;
use Illuminate\Support\Facades\Redirect;
/*input para poner la imagen*/
use sisVentas\http\Requests\ArticuloFormRequest;
use Illuminate\Support\Facades\input;


use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {
     
      $this->middleware('auth');

    }
   public function index(Request $request)
   {
    
     if ($request)
     {
      /* consulta a la base de datos para ordenar por categoria*/
     	$query=trim($request->get('searchText'));
     	$articulos=DB::table('articulo as a')
     	 /* unir tablas*/
        ->join('categoria as c','a.idcategoria','=','c.idcategoria')
         /* seleccionar atributos de tablas combinadas*/
        ->select('a.idarticulo','a.nombre','a.codigo','stock','c.nombre as categoria' ,'a.descripcion','a.imagen', 'a.estado')
 /* buscar por nombre*/
        ->where('a.nombre','LIKE','%'.$query.'%')  
 /* buscar por codigo*/
     	->orwhere('a.codigo','LIKE','%'.$query.'%')  
         ->orderBy('a.idarticulo','desc')
         ->paginate(7);
         return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
     }

   }

   public function create()
   {
      $categorias=DB::table('categoria')->where('condicion','=','1')->get();
      return view("almacen.articulo.create",["categorias"=>$categorias]);

   }
   public function store(ArticuloFormRequest $request)
   {  /* creamos variables con el fin de que el controlador valide el request*/

    $articulo=new Articulo;
    $articulo->idcategoria=$request->get('idcategoria');
    $articulo->codigo=$request->get('codigo');
    $articulo->nombre=$request->get('nombre');
    $articulo->stock=$request->get('stock');
    $articulo->descripcion=$request->get('descripcion');
    $articulo->estado='Activo'; 

    if(Input::hasFile('imagen')){
    $file=Input::file('imagen');
    $file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName());
    $articulo->imagen=$file->getClientOriginalName();
    }


    $articulo->save();
    return Redirect::to('almacen/articulo');

   }
   public function show($id)
   {
    return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
   }

   public function edit($id)
   {

    $articulo=Articulo::findOrFail($id);
    $categorias=DB::table('categoria')->where('condicion','=','1')->get();
    return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
   }


   public function update(ArticuloFormRequest $request, $id)

   {
     $articulo=Articulo::findOrFail($id);

     $articulo->idcategoria=$request->get('idcategoria');
    $articulo->codigo=$request->get('codigo');
    $articulo->nombre=$request->get('nombre');
    $articulo->stock=$request->get('stock');
    $articulo->descripcion=$request->get('descripcion');
    $articulo->estado='Activo'; 

    if(Input::hasFile('imagen')){
    $file=Input::file('imagen');
    $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
    $articulo->imagen=$file->getClientOriginalName();
    }

     $articulo->update();
     return Redirect::to('almacen/articulo');
   }


    public function destroy($id)
    {
      $articulo=Articulo::findOrFail($id);
      $articulo->estado='Inactivo';
      $articulo->update();
      return Redirect::to('almacen/articulo');

    }
}
