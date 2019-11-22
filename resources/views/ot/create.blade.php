@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Nueva orden de trabajo
@endsection

@section('contentheader_title')
    NUEVA ORDEN DE TRABAJO (OT)
@endsection

@section('main-content')
@inject('clientes', 'App\Services\Clientes')
<div class="container-fluid spark-screen">
    <div class="row">
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
                        {!! Form::open(['route' => 'ots.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off']) !!}
                        {{-- {!! Form::open(array('url'=> 'ots.store', 'method' => 'POST','autocomplete'=>'off', 'enctype' => 'multipart/form-data')) !!} --}}
                        {{-- {!! Form::token() !!} --}}
                        <div class="col-md-6"> <!-- Aqui va columna uno-->
                            <div class="form-group">
                                {!! Form::label('cliente','Cliente') !!}
                                <a href="" data-target="#addCli" data-toggle="modal">
                                    <button class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" >Nuevo cliente</button>
                                </a>

                                    <select id="cliente" name="cliente_id" class="form-control{{ $errors->has('cliente_id') ? ' is-invalid' : '' }} selectpicker" data-live-search="true">
                                        @foreach($clientes->get() as $index => $cliente)
                                            <option value="{{ $index }}" {{ old('cliente_id') == $index ? 'selected' : '' }}>
                                                {{ $cliente }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('cliente_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cliente_id') }}</strong>
                                        </span>
                                    @endif

                                {{-- {!! Form::select('cliente_id', $products, $selectedID, ['class' => 'form-control']) !!} --}}
                                {{-- <button type="button" class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" data-toggle="modal" data-target="#addCli">
                                    Nuevo cliente
                                </button> --}}
                                {{-- {!! Form::select('cliente_id',$cliente, null, ['id'=>'cliente','class' => 'form-control selectpicker', 'placeholder' => 'Seleccione cliente', 'required', 'data-live-search' => 'true']) !!} --}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('tema','Tema') !!}
                                {!! Form::text('tema', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Tema','maxlength' => 100]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('campana','Producto/Campaña') !!}
                                {!! Form::text('campana', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Producto/Campaña','maxlength' => 100]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('departamento','Departamento') !!}
                                {!! Form::select('departamento', ['creacion' => 'Creación','produccion' => 'Producción','audiovisual' => 'Audiovisual','planificacion' => 'Planificación','cuentas' => 'Cuentas'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione departamento', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ejecutivores','Ejecutivo responsable') !!}
                                {!! Form::text('ejecutivores', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable','maxlength' => 50]) !!}
                            </div>
                        </div> <!-- Cierra colummna 1-->
                        <div class="col-md-6"> <!-- Aqui va columna dos-->
                            <div class="form-group">
                                {!! Form::label('fechaentrega', 'Solicitado para') !!}
                                <div class="form-group input-group date">
                                    {!! Form::datetime('fechaentrega', null, ['class'=>'form-control', 'id'=>'datetimepicker'])!!}
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
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese URL (Opcional)','maxlength' => 300]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('archivo','Adjuntar archivo') !!}
                                {!! Form::file('file_archivo', ['class' => 'form-group' ]) !!}
                            </div>
                            {{-- {!! Form::close() !!} --}}

                        </div> <!-- Cierra colummna 2-->
                        <div class="col-md-12"><!-- COMENTARIO OT-->
                            <div class="box-header with-border" style="background-color:#f4f4f4;border-radius: 15px;">
                                    {!! Form::label('comentariot','Comentario (Opcional)') !!}
                                    {!! Form::textarea('comentariot', null, ['class' => 'form-control', 'placeholder' => 'Inserte un comentario','required','maxlength' => 10000 ]) !!}
                            </div>
                        </div> <!-- Cierra COMENTARIO OT-->

                        <div class="box-body"><!-- /.box-body2 -->
                            <div class="col-md-12">
                                <div class="box-header with-border">
                                    <h3 style="text-align:center;">Detalle OT</h3>

                                    <div class="table-responsive">
                                            <table class="table table-bordered table-responsive" style="background:#eee" id="tablaitem">
                                                <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <button type="button" class="btn btn-primary center-block" onclick="addRow()">Agregar ítem</button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th> </th>
                                                        <th>Nombre de Pieza</th>
                                                        <th>Cantidad</th>
                                                        <th>Valor</th>
                                                        <th>Detalle (max 10.000 carácteres)</th>
                                                    </tr>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-danger remove" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>
                                                        <td>{!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>
                                                        <td>{!! Form::number('cantidaditem[]', null, ['class' => 'form-control', 'placeholder' => 'Cantidad','required']) !!}</td>
                                                        <td>{!! Form::text('valoritem[]', null, ['class' => 'form-control', 'placeholder' => 'Valor','required']) !!}</td>
                                                        <td colspan="7" class="col-12 col-sm-6 col-md-6">{!! Form::textarea('detalleitem[]', null, ['class' => 'form-control', 'placeholder' => 'Detalle del item','required','maxlength' => 10000 ]) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7">Comentario item (Opcional)</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7">
                                                                {!! Form::textarea('comentarioitem[]', null, ['class' => 'form-control', 'placeholder' => 'Inserte un comentario','required','maxlength' => 10000 ]) !!}
                                                        </th>
                                                    </tr>
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Ingresar', ['class' => 'btn btn-block btn-success btn-lg']) !!}
                            </div>
                        </div><!-- /.box-body2 -->

                    </div> <!-- /.Cierra row-->
                    </div> <!-- /.box-body -->

                    {!! Form::close() !!}
            </div> <!-- /.box -->
            </div> <!-- /.col-md-12 -->
    </div> <!-- /.row-->
    @include('ot.modal')

</div>
 @endsection

 @section('scriptselect')
 <script>
    $(document).ready(function(){
        $('#cliente').on('change',function(){
            var cliente_id = $(this).val();
        }) ;
    });
</script>
 @endsection

