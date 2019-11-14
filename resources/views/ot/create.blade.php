@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Nueva orden de trabajo
@endsection

@section('contentheader_title')
    NUEVA ORDEN DE TRABAJO (OT)
@endsection

@section('main-content')
	<div class="content">
		<div class="row">
				{{-- <div class="box"> --}}
                    <div class="col-md-12">
                    @include('flash::message')

                    <div class="box">

					<div class="box-header with-border">
						<h3 style="text-align:center; text-decoration: underline black;">Formulario OT</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							{{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button> --}}
						</div>
					</div>
					<div class="box-body">
                        <div class="row">
                            <!-- Aqui va el formulario-->
                            {!! Form::open(['route' => 'ots.store', 'method' => 'POST', 'files' => true]) !!}

                            <div class="col-md-6"> <!-- Aqui va columna uno-->
                                <!-- <div class="form-group">
                                    {!! Form::label('tipo','Seleccione el tipo de OT') !!}
                                    {!! Form::select('tipo', ['presupuesto' => 'Presupuesto','productivo' => 'Productivo', 'audiovisual' => 'Audiovisual'],null, ['class' => 'form-control'] ) !!}
                                </div> -->

                                <div class="form-group">
                                    {!! Form::label('cliente','Cliente') !!}
                                    <a href="" data-target="#addCli" data-toggle="modal">
                                        <button class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" >Nuevo cliente</button>
                                    </a>
                                    {{-- <button type="button" class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" data-toggle="modal" data-target="#addCli">
                                        Nuevo cliente
                                    </button> --}}
                                    {!! Form::select('cliente',$cliente,null, ['class' => 'form-control', 'placeholder' => 'Seleccione cliente', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tema','Tema') !!}
                                    {!! Form::text('tema', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Tema']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('campana','Producto/Campaña') !!}
                                    {!! Form::text('campana', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Producto/Campaña']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('departamento','Departamento') !!}
                                    {!! Form::select('departamento', ['Creación' => 'Creación','Producción' => 'Producción','Audiovisual' => 'Audiovisual','Planificación' => 'Planificación','Cuentas' => 'Cuentas'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione departamento', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('ejecutivores','Ejecutivo responsable') !!}
                                    {!! Form::text('ejecutivores', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable']) !!}
                                </div>

                            </div> <!-- Cierra colummna 1-->

                            <div class="col-md-6"> <!-- Aqui va columna dos-->
                                <div class="form-group">
                                    {!! Form::label('fechaentrega', 'Solicitado para') !!}
                                    <div class="form-group input-group date" id="datetimepicker1">
                                        <input type='text' class="form-control" />
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tipotrabajo','Tipo de trabajo') !!}
                                    {!! Form::select('tipotrabajo', ['original' => 'Original','boceto' => 'Boceto','modificaciones' => 'Modificaciones'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo trabajo', 'required'])  !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('notificarcorreo','Notificar a correo(s)') !!}
                                    {!! Form::email('notificarcorreo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese correo(s) (Si es más de uno, separar con coma)']) !!}
                                </div>

                                <div class="form-group">
                                {!! Form::label('url','URL') !!}
                                {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese URL (Opcional)']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('archivo','Adjuntar archivo') !!}
                                    {!! Form::file('file_archivo', ['class' => 'form-group' ]) !!}
                                </div>
                                {!! Form::close() !!}

                            </div> <!-- Cierra colummna 2-->

                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="box-header with-border">
                                        <h3 style="text-align:center;">Detalle OT</h3>

                                        <div class="table-responsive">
                                                <table class="table table-bordered table-responsive" style="background:#eee">
                                                    <thead>
                                                            <tr>
                                                                <th>Nombre de Pieza</th>
                                                                <th>Cantidad</th>
                                                                <th>Formato</th>
                                                                <th>Material</th>
                                                                <th>Colores</th>
                                                                <th>Terminaciones</th>
                                                                <th>Valor</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" class="form-control" name="detail_name[]" placeholder="Nombre" required="required"></td>
                                                            <td><input type="text" class="form-control" name="detail_cant[]" placeholder="Cantidades" required="required" > </td>
                                                            <td><input type="text" class="form-control" name="detail_format[]" placeholder="Formato" required="required"></td>
                                                            <td><input type="text" class="form-control" name="detail_material[]" placeholder="Material" ></td>
                                                            <td><input type="text" class="form-control" name="detail_colors[]" placeholder="Colores" ></td>
                                                            <td><input type="text" class="form-control" name="detail_terms[]" placeholder="Terminaciones" ></td>
                                                            <td><input type="text" class="form-control" name="detail_price[]" placeholder="Valor" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="7">
                                                                <textarea class="form-control" name="detail_item[]" placeholder="Detalle"></textarea></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="7">
                                                                <button type="button" class="btn btn-primary ">Agregar mas ítems</button>
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Cierra row-->
                     </div>
                     <!-- /.box-body -->
                </div>
                 <!-- /.box -->
             </div>
     </div>
                                                <!-- /.DETALLES -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="form-group">
                                {!! Form::submit('Ingresar', ['class' => 'btn btn-block btn-success btn-lg']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- {!! Form::close() !!} --}}
        @include('ot.modal')
         </div>
 @endsection

