@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			
			{!!Form::open(array('url'=>'ventas/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class"form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required  class="form-control" placeholder="Juanita Gonzales">
					</div>
					
				</div>				
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class"form-group">
						<label for="num_documento">Numero del documento</label>
						<input type="text" name="num_documento" required  class="form-control" placeholder="Numero del documento...">
					</div>					
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div>
						<label for="tipo_documento">Tipo de documento</label>
						<select class="form-control" name="tipo_documento">	
								<option value="CC" selected>CC</option>
								<option value="CE">CE</option>
								<option value="TI">TI</option>

						</select>					
					</div>	
					
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class"form-group">
						<label for="direccion">Dirección</label>
						<input type="text" name="direccion"   class="form-control" placeholder="Dirección del cliente">
					</div>	
					
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class"form-group">
						<label for="telefono">Telefono</label>
						<input type="text" name="telefono"   class="form-control" placeholder="Telefono del cliente...">
					</div>	
					
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class"form-group">
						<label for="email">E-mail</label>
						<input type="text" name="email"   class="form-control" placeholder="trespapitasconcarne@gmail.com">
					</div>	
					
				</div>
				
				
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>

				
			</div>
			
			
			{!!Form::close()!!}

	
@endsection