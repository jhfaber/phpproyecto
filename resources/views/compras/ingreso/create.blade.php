@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso</h3>
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
			<!--form control es de la clase boostrat -->
			
			{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div>
						<label for="nombre">Proveedor</label>
						<select class="form-control selectpicker" data-live-search="true" >
							@foreach ($personas as $person)
								<option value="{{$person->idpersona}}">{{$person->nombre}}</option>
							@endforeach
						</select>
					</div>
					
				</div>



				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class"form-control">
						<label for="num_documento">Serie de comprobante</label>
						<input type="text" name="serie_comprobante" required  class="form-control" placeholder="00001...">
					</div>					
				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class"form-control">
						<label for="num_documento">Número de comprobante</label>
						<input type="text" name="num_comprobante" required  class="form-control" placeholder="00004...">
					</div>					
				</div>


				<!-- En el video se modifica los 6 por 4 -->
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div>
						<label for="tipo_documento">Tipo Comprobante</label>
						<select class="form-control" name="tipo_comprobante">	
								<option value="Boleta" selected>Boleta</option>
								<option value="Factura">Factura</option>
								<option value="Ticket">Ticket</option>

						</select>					
					</div>	
					
				</div>
			</div>


			<div class="row">
				<div>											
					<div class="panel panel-primary" id="panel">
						<div class="panel-body">
							<div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
								<div class="form-group">
									<label>Articulo</label>
									<select name="piarticulo" id="piarticulo" class="form-control selectpicker" data-live-search="true">
										@foreach ($articulos as $art)
											<option value="{{$art->idarticulo}}">{{$art->articulo}}</option>
										@endforeach
									</select>
									
								</div>	
							</div>	
							<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
								<div class="form-group">
									<label for="pcantidad">Cantidad</label>
									<input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="Cantidad">									
								</div>	
							</div>
							<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
								<div class="form-group">
									<label for="precio_compra">Precio compra</label>
									<input type="number" class="form-control" name="precio_compra" id="precio_compra" placeholder="P. Compra">										
								</div>	
							</div>	
							<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
								<div class="form-group">
									<div class="form-group">
									<label for="precio_venta">Precio venta</label>
									<input type="number" class="form-control" name="precio_venta" id="precio_venta" placeholder="P. venta">										
								</div>
									
								</div>	
							</div>	
							<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12">
								<div class="form-group">
									<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>									
																
								</div>	
							</div>	
							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
									<thead style="background-color:#A9D0F5">
										<th>Opciones</th>
										<th>Articulo</th>
										<th>Cantidad</th>
										<th>Precio Compra</th>
										<th>Precio Venta</th>
										<th>Subtotal</th>
									</thead>
									<tfoot>
										<th>TOTAL</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th><h4  id="total">S/. 0.00</h4></th>
									</tfoot>
									
								</table>
							</div>												
						</div>
					</div>
				
				</div>
					
				
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<!--<input name="_token" value="" type="hidden"></div> -->
						<button class="btn btn-primary" type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>

				
			</div>
			
			
			{!!Form::close()!!}

<!-- En layouts esta en la parte de js stack script, el siguiente codigo es como si estuviera alli, este codigo permite agregar a la tabla de ingresos-->

@push('scripts')

@endpush
@endsection