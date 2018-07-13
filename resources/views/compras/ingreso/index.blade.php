@extends ('layouts.admin')
@section ('contenido')

  <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos<a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('compras.ingreso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				 
					<th>Fecha</th>
					<th>Proveedor</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
			
				</thead>

<!-- el "articulo" es de ArticuloController.php en index parte de ["articulo"=> 

 return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]); -->

               @foreach ($ingresos as $ing)
				<tr>
				 
				   <td>{{ $ing->fecha_hora}}</td>
				   <td>{{ $ing->nombre}}</td>
				   <td>{{ $ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
                   <td>{{ $ing->impuesto}}</td>
                   <td>{{ $ing->total}}</td>
                   <td>{{ $ing->estado}}</td>

					<td>
					<!-- aqui ejecuta una accion pidiendo permiso al controlador enviando la id -->
						<a href="{{URL::action('IngresoController@show',$ing->idingreso)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('compras.ingreso.modal')
				@endforeach
			</table>
		</div>
<!-- la paginacion -->
		{{$ingresos->render()}}
	</div>
</div>

@endsection