@extends('adminlte::layouts.app')

@section('htmlheader_title')
    creacion de usuarios
@endsection

@section('contentheader_title')
    Crear nuevo usuario
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de creación</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button> --}}
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Aqui va el formulario-->

                        <br>
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST','class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('nombre','Nombre',['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('apellido','Apellido',['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                {!! Form::text('apellido', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellido']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rut','Rut',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::text('rut', null, ['class' => 'form-control', 'required', 'placeholder' => 'Rut']) !!}
                                    </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('email','E-MAIL',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'E-mail']) !!}
                                    </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('area','Area',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::text('area', null, ['class' => 'form-control', 'required', 'placeholder' => 'Area']) !!}
                                    </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('cargo','Cargo',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::text('cargo', null, ['class' => 'form-control', 'required', 'placeholder' => 'Cargo']) !!}
                                    </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('rol','Rol',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::select('rol', ['administrador' => 'administrador','cliente' => 'cliente'],null, ['class' => 'form-control'] ) !!}
                                    </div>
                            </div>

                            <div class="form-group">
                                    {!! Form::label('password','Password',['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                    {!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => '********']) !!}
                                    </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-12">
                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                                </div>
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
