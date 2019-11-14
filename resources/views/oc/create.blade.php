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
			<div class="col-md-12">
				<!-- Default box -->
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
                            {!! Form::open(['route' => 'ots.store', 'method' => 'POST']) !!}

                            <div class="col-md-6"> <!-- Aqui va columna uno-->
                                <!-- <div class="form-group">
                                    {!! Form::label('tipo','Seleccione el tipo de OT') !!}
                                    {!! Form::select('tipo', ['presupuesto' => 'Presupuesto','productivo' => 'Productivo', 'audiovisual' => 'Audiovisual'],null, ['class' => 'form-control'] ) !!}
                                </div> -->

                                <div class="form-group">
                                    {!! Form::label('cliente','Cliente') !!}
                                    <button type="button" class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" data-toggle="modal" data-target="#addCliMD">
                                            Nuevo cliente
                                          </button>
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
                                    {!! Form::label('ejecutivo','Ejecutivo responsable') !!}
                                    {!! Form::text('ejecutivo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable']) !!}
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
                                    {!! Form::select('tipotrabajo', ['original' => 'Original','boceto' => 'Boceto','modificaciones' => 'Modificaciones'],null, ['class' => 'form-control'] ) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('notificarcorreo','Notificar a correo(s)') !!}
                                    {!! Form::email('notificarcorreo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese correo(s) (Si es más de uno, separar con coma)']) !!}
                                </div>

{{--                                 <div class="form-group">
                                    {!! Form::label('notificar','Notificar a grupo') !!}
                                    <button type="button" class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" data-toggle="modal" data-target="#addCliMD">
                                            Nuevo grupo
                                          </button>
                                    {!! Form::select('notificar', ['grupo uno' => 'Grupo uno','grupo dos' => 'Grupo dos'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
                                </div> --}}

                                <div class="form-group">
                                {!! Form::label('url','URL') !!}
                                {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese URL (Opcional)']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('archivo','Adjuntar archivo') !!}
                                    <input type="file" name="file_boceto" class="filestyle" data-buttontext=" Adjuntar Boceto" id="file_boceto" data-buttonbefore="true" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                                    <div class="bootstrap-filestyle input-group">
                                        <span class="group-span-filestyle input-group-btn" tabindex="0">
                                            <label for="file_boceto" class="btn btn-default ">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                Adjuntar Archivo
                                            </label>
                                        </span>
                                        <input type="text" class="form-control " disabled="">
                                    </div>
                                </div>
                            </div> <!-- Cierra colummna 2-->

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
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                                <h3 style="text-align:center; text-decoration: underline black;">Detalle OT</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- Aqui va el formulario de detalle-->
                                {!! Form::open(['route' => 'ots.store', 'method' => 'POST']) !!}

                                <div class="col-md-6"> <!-- Aqui va columna uno-->
                                    <div class="form-group">
                                        {!! Form::label('nombrepieza','Nombre de pieza') !!}
                                        {!! Form::text('nombrepieza', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de la pieza']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('cantidad','Cantidad') !!}
                                        {!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad']) !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('formatopieza','Formato') !!}
                                            {!! Form::text('formatopieza', null, ['class' => 'form-control', 'placeholder' => 'Ingrese formato']) !!}
                                    </div>

                                    <div class="form-group">
                                            {!! Form::label('material','Material') !!}
                                            {!! Form::text('material', null, ['class' => 'form-control', 'placeholder' => 'Ingrese material']) !!}
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('colores','Colores') !!}
                                            {!! Form::text('colores', null, ['class' => 'form-control', 'placeholder' => 'Ingrese colores']) !!}
                                    </div>
                                </div> <!-- Cierra colummna 1-->

                                <div class="col-md-6"> <!-- Aqui va columna dos-->
                                    <div class="form-group">
                                            {!! Form::label('terminaciones','Terminaciones') !!}
                                            {!! Form::text('terminaciones', null, ['class' => 'form-control', 'placeholder' => 'Ingrese terminaciones']) !!}
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('valor','Valor') !!}
                                            {!! Form::number('valor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese valor']) !!}
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('detalle','Detalle') !!}
                                            {!! Form::textarea('detalle', null, ['class' => 'form-control', 'placeholder' => 'Describa detalle']) !!}
                                        </div>
                                </div> <!-- Cierra colummna 2-->
                            </div> <!-- Cierra row-->
                         </div>
                         <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                 </div>
             </div>

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

        {!! Form::close() !!}


        <!-- MODAL -->
        <div class="modal fade" id="addCliMD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">×</span>
                          <span class="sr-only">Cerrar</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
                    </div>

                    <form method="POST" action="http://www.jarvis.cl/tbwachile/clientes/agregar" id="clientInsertModal">

                    <div class="modal-body"> <!-- MODAL BODY -->
                        <h3>Datos de Contacto</h3>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom_cont_cli">Nombre</label>
                                    <input type="text" class="form-control" id="nom_cont_cli" name="nom_cont_cli" placeholder="Ingresa Nombres" required="required"><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_cli">Apellido</label>
                                    <input type="text" class="form-control" id="last_cli" name="last_cli" placeholder="Ingresa Apellidos" required="required"><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_cli">Email de contacto</label>
                                    <input type="email" class="form-control" id="email_cli" name="email_cli" placeholder="Ingresa Correo" required="required"><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="pass_cli">Teléfono</label>
                                    <input type="text" class="form-control" id="pass_cli" name="pass_cli" placeholder="Ingresa Teléfono">
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                            <h3>Datos de empresa</h3>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_cli">Razón social / Nombre</label>
                                    <input type="text" class="form-control" id="name_cli" name="name_cli" placeholder="Ingresa Nombres" required="required"><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rut_cli">Rut</label>
                                    <input type="text" class="form-control" id="rut_cli" name="rut_cli" placeholder="Ingresa RUT.: Ej.11111111-1" required="required"><br><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="giro_cli">Giro</label>
                                    <input type="text" class="form-control" id="giro_cli" name="giro_cli" placeholder="Ingresa Giro" required="required"><br><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="dir_cli">Dirección</label>
                                    <input type="text" class="form-control" id="dir_cli" name="dir_cli" placeholder="Ingresa Dirección" required="required"><br><br>
                                    <input type="hidden" name="agregar" value="agregar">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div><!-- MODAL BODY -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" name="send" class="btn btn-primary" value="send">Guardar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
        <!-- MODAL -->
         </div>
 @endsection
