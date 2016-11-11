@extends ('layouts.admin')
@section ('contenido')
	<div>
		<h3>Listado de categorias</h3>
	</div>
	<div>
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Activacion</th>
			</thead>
			
			@foreach ($users as $cat)
				<tr>
					<td>{{$cat->idcategoria}}</td>
					<td>{{$cat->nombre}}</td>
					<td>{{$cat->descripcion}}</td>
					<td>{{$cat->condicion}}</td>
				</tr>
			@endforeach
			
		</table>
		{{$users->render()}}
	</div>
@endsection