@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Nueva orden de compra
@endsection

@section('contentheader_title')
    NUEVA ORDEN DE COMPRA (OC)
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
                        {!! Form::open(['route' => 'oc.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete'=>'off']) !!}
                        <div class="col-md-3"> <!-- Aqui va columna uno-->
                            <div class="form-group">
                                {!! Form::label('proveedor','Proveedor') !!}
                                <a href="" data-target="#addCli" data-toggle="modal">
                                    <button class="btn btn-primary btn-xs pull-right" style="margin-right:10px;" >Nuevo proveedor</button>
                                </a>
                                    <select id="proveedor" name="proveedor_id" class="form-control{{ $errors->has('proveedor_id') ? ' is-invalid' : '' }} selectpicker" data-live-search="true">
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
                                {!! Form::label('marcaoc','Por cuenta de (Marca)') !!}
                                {!! Form::text('marcaoc', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese marca','maxlength' => 100]) !!}
                            </div>
                        </div> <!-- Cierra colummna 1-->

                        <div class="col-md-3">
                            <div class="form-group">
                                {{-- {!! Form::label('seatiende','Atención Sr. (Contacto proveedor)') !!} --}}
                                {!! Form::label('seatiende','Contacto proveedor:') !!}
                                {{-- {!! Form::text('seatiende', null, ['class' => 'form-control', 'required', 'placeholder' => 'Se atiende a:','maxlength' => 100]) !!} --}}
                                {!! Form::text('seatiende', null, ['class' => 'form-control', 'required', 'placeholder' => 'Contacto proveedor','maxlength' => 100]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('producto','Producto cotizado') !!}
                                {!! Form::text('producto', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese producto cotizado','maxlength' => 100]) !!}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('atendidox','Ejecutivo responsable:') !!}
                                {{-- {!! Form::label('atendidox','Atención Sr.(Contacto ejecutivo o cliente)') !!} --}}
                                {!! Form::text('atendidox', null, ['class' => 'form-control', 'required', 'placeholder' => 'Contacto ejecutivo o cliente','maxlength' => 100]) !!}
                                {{-- {!! Form::text('atendidox', null, ['class' => 'form-control', 'required', 'placeholder' => 'Atendido por:','maxlength' => 100]) !!} --}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('presupuestoaso','Presupuesto asociado') !!}
                                {!! Form::text('presupuestoaso', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese presupuesto asociado','maxlength' => 100]) !!}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('tipodocumento','Tipo de documento') !!}
                                {!! Form::select('tipodocumento', ['boleta' => 'Boleta','factura' => 'Factura'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'required'])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('archivo','Adjuntar archivo') !!}
                                {!! Form::file('file_archivo', ['class' => 'form-control' ]) !!}
                            </div>
                        </div>

                        <div class="col-md-12"><!-- DETALLE COMPRADOR-->
                            <h3 style="text-align:center">Informacion comprador</h3>
                            <div class="box-header with-border" style="background-color:#f4f4f4;border-radius: 15px;">
                                <div class="col-md-6">
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
                                        <label for="rutempresa">Rut</label>
                                        <input type="text" class="form-control" id="rutempresa" name="rutempresa" placeholder="Ej. 11111111-1" disabled>
                                    </div>
                                    <div class="form-group ">
                                        <label for="direccionempresa">Dirección</label>
                                        <input type="text" class="form-control" id="direccionempresa" name="direccionempresa" placeholder="EJ. Dirección 123"disabled>
                                        <input type="hidden" name="agregar" value="agregar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('formapago','Forma de pago') !!}
                                        {!! Form::email('formapago', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ej: 30 días']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fechaentrega', 'Fecha de entrega') !!}
                                        <div class="form-group input-group date">
                                            {!! Form::datetime('fechaentrega', null, ['class'=>'form-control', 'id'=>'datetimepicker'])!!}
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('lugarentrega','Lugar de entrega') !!}
                                        {!! Form::email('lugarentrega', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ej: Oficina agencia']) !!}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Cierra DETALLE COMPRADOR-->

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
                                <div class="col-md-6" style="margin-top:30px"><!-- COMENTARIO OT-->
                                    <div class="box-header with-border" style="background-color:#f4f4f4;border-radius: 15px">
                                            {!! Form::label('comentarioc','Observacion') !!}
                                            {!! Form::textarea('comentarioc', null, ['class' => 'form-control', 'placeholder' => 'Inserte una observacion','rows'=>5,'required','maxlength' => 10000 ]) !!}
                                    </div>
                                </div> <!-- Cierra COMENTARIO OT-->
                            <div class="col-md-4" style="margin-top:70px">
                                <div class="form-group" style="border-width:1px;border-radius:10px;background-color:#f4f4f4">
                                    {!! Form::label('enviarcliente','Enviar a cliente') !!}
                                    {!! Form::checkbox('enviarcliente', 'value'/* , true */); !!}
                                </div>
                                <div class="form-group" style="border-width:1px;border-radius:10px;background-color:#f4f4f4;">
                                    {!! Form::label('comisionagencia','Comision agencia') !!}
                                    {!! Form::number('comisionagencia', null,['placeholder' => 'Cantidad','min'=>'0']) !!}
                                </div>
                            </div>
                                <div class="col-md-12" style="margin-top:30px;margin-bottom:50px"><!-- IMPORTANTE OT-->
                                    <div class="box-header with-border" style="font-size:12px;color:blanchedalmond;background-color:red;border-radius:3px">
                                        <p>
                                            IMPORTANTE: ENVIAR FACTURA A TBWA FREDERICK PARA VºBº TBWA\FREDERICK
                                            actúa como agente ante ustedes en nombre de su cliente (en adelante el "Cliente" o "Mandante"), mandante
                                            conocido por ustedes, sea por encontrarse señalado en este acto o puesto en conocimiento de ustedes a través de otros medios.
                                            Se deja expresa constancia, que TBWA\FREDERICK sólo será responsable por el costo de los bienes y servicios adquiridos
                                            y de cualesquiera otras obligaciones que se deriven para ustedes de esta operación, en adelante los "Costos", en la medida
                                            que el cliente le haya pagado previamente dichos Costos. Las cantidades no cubiertas a TBWA/FREDERICK. Cualquier cláusula, término
                                            o condición impuesta o establecida en las facturas, documentos o plan tarifaria que modifiquen, complementen o contradigan lo expuesto
                                            en este formulario, como cualquier modificación que se efectúe a éste, no tiene ni tendrá fuerza, validez o efecto alguno.
                                        </p>
                                    </div>
                                </div> <!-- Cierra IMPORTANTE OT-->

                                <div class="form-group">
                                    {!! Form::submit('Generar orden de trabajo', ['class' => 'btn btn-block btn-success btn-lg']) !!}
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

