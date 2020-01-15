@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Nuevo presupuesto
@endsection

@section('contentheader_title')
    NUEVO PRESUPUESTO
@endsection

@section('main-content')
@inject('clientes', 'App\Services\Clientes')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
        @include('flash::message')

        <div class="box">
            <div class="box-header with-border">
                <h3 style="text-align:center">Informacion general</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        <div class="box-body">
            <div class="row">
                <!-- Aqui va el formulario-->
                {!! Form::open(['route' => 'presupuesto.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off']) !!}

                <div class="col-md-4"> <!-- Aqui va columna uno-->
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
                    </div>
                </div> <!-- Cierra colummna 1-->

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('campana','Producto/Campaña') !!}
                        {!! Form::text('campana', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Producto/Campaña','maxlength' => 100]) !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('ejecutivores','Ejecutivo responsable') !!}
                        {!! Form::text('ejecutivores', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable','maxlength' => 50]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('archivo','Adjuntar archivo') !!}
                        {!! Form::file('file_archivo',['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('incluyeiva', 'value'/* , true */); !!}
                        {!! Form::label('incluyeiva','Incluye IVA') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('incluyecomision', 'value'/* , true */); !!}
                        {!! Form::label('incluyecomision','Incluye comision agencia') !!}
                    </div>
                </div>

                <div class="box-body"><!-- /.box-body2 -->
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 style="text-align:center;">Ítem</h3>

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
                                            <th>Detalle Item</th>
                                            <th>Seguimiento Item</th>
                                        </tr>
                                        <tr>
                                            <td><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>
                                            <td>{!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>
                                            <td>{!! Form::number('cantidaditem[]', null, ['class' => 'form-control', 'placeholder' => 'Cantidad','required','min'=>'0']) !!}</td>
                                            <td>{!! Form::number('valoritem[]', null, ['class' => 'form-control', 'placeholder' => 'Valor','required','min'=>'0']) !!}</td>
                                            <td>{!! Form::textarea('detalleitem[]', null, ['class' => 'form-control', 'placeholder' => 'Características del ítem','required','maxlength' => 10000,'rows'=>5 ]) !!}</td>
                                            <td>{!! Form::textarea('comentarioitem[]', null, ['class' => 'form-control', 'placeholder' => 'Cambios realizados','required','maxlength' => 10000,'rows'=>5 ]) !!}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(max 10.000 carácteres)</td>
                                            <td>(max 10.000 carácteres)</td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="col-md-12" style="margin-top:30px"><!-- COMENTARIO OT-->
                            <div class="box-header with-border" style="background-color:#f4f4f4;border-radius: 15px">
                                    {!! Form::label('comentarioc','Observacion') !!}
                                    {!! Form::textarea('comentarioc', null, ['class' => 'form-control', 'placeholder' => 'Inserte una observacion','rows'=>5,'required','maxlength' => 10000 ]) !!}
                            </div>
                        </div> <!-- Cierra COMENTARIO OT-->

                        <!-- Enviar a cliente para aprobación-->

                        {{-- <div class="col-md-12" style="text-align:center;margin-top:30px;margin-bottom:30px">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group center" style="border-style:dotted;border-width:1px;border-radius:15px;background-color:#f4f4f4;">
                                {!! Form::checkbox('enviarcliente', 'value', false, ['id' => 'checkboxcli']);!!}
                                {!! Form::label('enviarcliente','Enviar a cliente para aprobación ') !!}
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div> --}}

                        <div class="form-group">
                            {!! Form::submit('Generar presupuesto', ['class' => 'btn btn-block btn-success btn-lg']) !!}
                        </div>
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

