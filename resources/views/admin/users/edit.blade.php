@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Edici贸n de usuarios
@endsection

@section('contentheader_title')
    Editar usuario  {{$user->nombre}}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Formulario de edici贸n</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
                        <!-- Aqui va el formulario-->

                        <h3>Modifique los datos necesarios</h3>
                        <br>
                        {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                            <div class="form-group">
                                {!! Form::label('nombre','NOMBRE') !!}
                                {!! Form::text('nombre', $user->nombre, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('apellido','Apellido') !!}
                                {!! Form::text('apellido', $user->apellido, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rut','Rut') !!}
                                    {!! Form::text('rut', $user->rut, ['class' => 'form-control', 'required', 'placeholder' => 'Rut']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('email','E-MAIL') !!}
                                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => 'E-mail']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('area','Area') !!}
                                {!! Form::text('area', $user->area, ['class' => 'form-control', 'required', 'placeholder' => 'Area']) !!}
                        </div>

                            <div class="form-group">
                                    {!! Form::label('cargo','Cargo') !!}
                                    {!! Form::text('cargo', $user->cargo, ['class' => 'form-control', 'required', 'placeholder' => 'Cargo']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rol','Rol') !!}
                                    {!! Form::select('rol', ['administrador' => 'Administrador','cliente' => 'Cliente', 'usuario' => 'Usuario'],null, ['class' => 'form-control'] ) !!}
                            </div>

                            <!--<div class="form-group">
                                    {!! Form::label('password','Password') !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
                            </div>-->

                            <div class="form-group">
                                {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
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
