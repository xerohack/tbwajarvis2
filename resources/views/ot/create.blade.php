@extends('adminlte::layouts.app')

@section('htmlheader_title')
	creacion de orden de trabajo
@endsection

@section('contentheader_title')
    Crear nueva OT
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Formulario de creación OT Producción</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
                        <!-- Aqui va el formulario-->

                        <h3>Ingrese los datos para la nueva OT</h3>
                        <br>
                        {!! Form::open(['route' => 'ots.store', 'method' => 'POST']) !!}

                           <!-- <div class="form-group">
                                {!! Form::label('tipo','Seleccione el tipo de OT') !!}
                                {!! Form::select('tipo', ['presupuesto' => 'Presupuesto','productivo' => 'Productivo', 'audiovisual' => 'Audiovisual'],null, ['class' => 'form-control'] ) !!}
                            </div> -->

                            <div class="form-group">
                                {!! Form::label('cliente','Cliente') !!}
                                {!! Form::select('cliente',$cliente,null, ['class' => 'form-control', 'placeholder' => 'Seleccione el Cliente', 'required']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('campana','Campaña') !!}
                                {!! Form::text('campana', null, ['class' => 'form-control', 'required', 'placeholder' => 'Campaña']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('fechaot', 'Fecha') !!}
                                {!! Form::date('fechaot', Carbon\Carbon::today(), ['class' => 'form-control', 'required']) !!}
                            </div>

                            

                            <div class="form-group">
                                {!! Form::label('apellido','Apellido') !!}
                                {!! Form::text('apellido', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rut','Rut') !!}
                                    {!! Form::text('rut', null, ['class' => 'form-control', 'required', 'placeholder' => 'Rut']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('email','E-MAIL') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'E-mail']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('cargo','Cargo') !!}
                                    {!! Form::text('cargo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Cargo']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rol','Rol') !!}
                                    {!! Form::select('rol', ['administrador' => 'administrador','cliente' => 'cliente'],null, ['class' => 'form-control'] ) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('password','Password') !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => '********']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
