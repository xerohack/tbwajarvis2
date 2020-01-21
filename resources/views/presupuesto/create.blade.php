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
                    <div class="form-group">
                        {!! Form::label('archivo','Adjuntar archivo') !!}
                        {!! Form::file('file_archivo',['class' => 'form-control']) !!}
                    </div>
                </div> <!-- Cierra colummna 1-->

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('campana','Producto/Campaña') !!}
                        {!! Form::text('campana', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Producto/Campaña','maxlength' => 100]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('facturaboleta','Factura o Boleta') !!}
                        <div class="form-control" style="border:none">
                        {!! Form::radio('bolfac', 'Factura',true)!!}
                        {!! Form::label('factura','Factura') !!}

                        {!! Form::radio('bolfac', 'Boleta')!!}
                        {!! Form::label('boleta','Boleta') !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('ejecutivores','Ejecutivo responsable') !!}
                        {!! Form::text('ejecutivores', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable','maxlength' => 50]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('comision','Comision agencia') !!}
                        <input type="checkbox" id="check" onchange="activarcomision(this.checked);" checked>
                        <div class="form-control" style="border:none">
                            {!! Form::number('comision', 0, ['placeholder' => '0 %','min'=>'0','max'=>'100' ]) !!}
                            {!! Form::label('comision','% de comision') !!}
                        </div>
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
                                            <th colspan="7" style="background-color:#222d32">
                                                <button type="button" class="btn btn-primary center-block" onclick="addRowPre()">Agregar ítem</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="10"><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()" disabled="true"><i class="glyphicon glyphicon-remove"></i></button></td>
                                            <td colspan="3"> Item {!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Detalle item','required','maxlength' => 100]) !!}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td width="70%">Proveedor {!! Form::text('nombreproveedor[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre proveedor','required','maxlength' => 100]) !!}</td>
                                            <td>Valor{!! Form::number('valorproveedor[]', null, ['class' => 'form-control', 'placeholder' => '$0','required','min'=>'0']) !!}</td>
                                            <td width="10"><button type="button" class="btn-xs btn-danger remove borrar" onclick="eliminarFila()" disabled="true"><i class="glyphicon glyphicon-remove"></i></button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7">
                                                <button type="button" class="btn btn-warning center-block" onclick="addRowPreprov()">Agregar Proveedor</button>
                                            </th>
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
<!-- SCRIPT para seleccionar cliente -->
 <script>
    $(document).ready(function(){
        $('#cliente').on('change',function(){
            var cliente_id = $(this).val();
        }) ;
    });
</script>

<!-- SCRIPT para activar o desactivar la comision -->
<script>
    function activarcomision(value)
    {
        if(value==true)
        {
            // habilitamos
            document.getElementById("comision").disabled=false;
        }else if(value==false){
            // deshabilitamos
            document.getElementById("comision").disabled=true;
            document.getElementById("comision").value=0;
        }
    }
</script>
 @endsection

