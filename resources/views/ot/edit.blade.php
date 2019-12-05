@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Editar orden de trabajo {{-- - . $ot->id --}}
@endsection

@section('contentheader_title')
    EDICIÓN ORDEN DE TRABAJO (OT)
@endsection

@section('main-content')
{{-- @inject('clientes', 'App\Services\Clientes') --}}
<div class="container">
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
                        {!! Form::model($ot,['route' => ['ots.update', $ot], 'method' => 'PUT']) !!}
                        <div class="col-md-6"> <!-- Aqui va columna uno-->

                            <div class="form-group">
                                {!! Form::label('cliente_id','Cliente') !!}
                                <a href="" data-target="#addCli" data-toggle="modal">
                                    <button class="btn btn-primary btn-xs pull-right" style="margin-right:10px;">Nuevo cliente</button>
                                </a>
                                {{-- {!! Form::select('cliente_id', App\Cliente::pluck('nombreempresa','id'),$cliente,array('class'=>'form-control'))!!} --}}
                                {!! Form::select('cliente_id', $clientes, $ot->cliente->id,['class'=>'form-control selectpicker','data-live-search'=>'true'])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('tema','Tema') !!}
                                {!! Form::text('tema', $ot->tema, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Tema']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('campana','Producto/Campaña') !!}
                                {!! Form::text('campana',$ot->campana,['class' => 'form-control', 'required', 'placeholder' => 'Ingrese Producto/Campaña']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('departamento','Departamento') !!}
                                {!! Form::select('departamento', ['creacion' => 'Creación','produccion' => 'Producción','audiovisual' => 'Audiovisual','planificacion' => 'Planificación','cuentas' => 'Cuentas'],$ot->departamento,array('class'=>'form-control'))!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ejecutivores','Ejecutivo responsable') !!}
                                {!! Form::text('ejecutivores',$ot->ejecutivores,['class' => 'form-control', 'required', 'placeholder' => 'Ingrese ejecutivo responsable']) !!}
                            </div>
                        </div> <!-- Cierra colummna 1-->
                        <div class="col-md-6"> <!-- Aqui va columna dos-->
                            <div class="form-group">
                                {!! Form::label('fechaentrega', 'Solicitado para') !!}
                                <div class="form-group input-group date">
                                    {!! Form::datetime('fechaentrega', $ot->fechaentrega, ['class'=>'form-control', 'id'=>'datetimepicker'])!!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('tipotrabajo','Tipo de trabajo') !!}
                                {!! Form::select('tipotrabajo',['original' => 'Original','boceto' => 'Boceto','modificaciones' => 'Modificaciones'], $ot->tipotrabajo, ['class' => 'form-control', 'required'])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('notificarcorreo','Notificar a correo(s)') !!}
                                {!! Form::email('notificarcorreo', $ot->notificarcorreo, ['class' => 'form-control', 'required', 'placeholder' => 'Ingrese correo(s) (Si es más de uno, separar con coma)']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('url','URL') !!}
                            {!! Form::text('url', $ot->url,['class' => 'form-control', 'placeholder' => 'Ingrese URL (Opcional)']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('file_archivo','Adjuntar archivo') !!}
                                {!! Form::file('file_archivo', ['class' => 'form-group' ]) !!}
                            </div>
                            {{-- {!! Form::close() !!} --}}
                        </div> <!-- Cierra colummna 2-->

                        <div class="col-md-12"><!-- COMENTARIO OT-->
                            <div class="box-header with-border" style="background-color:#f4f4f4;border-radius: 15px;">
                                    {!! Form::label('comentariot','Comentario (Opcional)') !!}
                                    {!! Form::textarea('comentariot', $ot->comentariot,['class'=>'form-control','placeholder'=>'Inserte un comentario','maxlength'=>10000,'rows'=>5 ]) !!}
                            </div>
                        </div> <!-- Cierra COMENTARIO OT-->

                        <div class="box-body">
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
                                                    <th>Detalle Item</th>
                                                    <th>Seguimiento Item</th>
                                                </tr>

                                                @foreach ($item as $i)
                                                <tr>
                                                    <td><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>
                                                    <td>{!! Form::text('nombreitem[]',$i->nombreitem,['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>
                                                    <td>{!! Form::number('cantidaditem[]',$i->cantidaditem,['class' => 'form-control', 'placeholder' => 'Cantidad','required','min'=>'0']) !!}</td>
                                                    <td>{!! Form::number('valoritem[]',$i->valoritem,['class' => 'form-control', 'placeholder' => 'Valor','required','min'=>'0']) !!}</td>
                                                    <td>{!! Form::textarea('detalleitem[]',$i->detalleitem,['class' => 'form-control', 'placeholder' => 'Características del ítem','required','maxlength' => 10000,'rows'=>5 ]) !!}</td>
                                                    <td>{!! Form::textarea('comentarioitem[]',$i->comentarioitem,['class' => 'form-control', 'placeholder' => 'Cambios realizados','maxlength' => 10000,'rows'=>5 ]) !!}</td>
                                                    <td>{!! Form::text('iditem[]',$i->id,['hidden'=>'true']) !!}</td>
                                                </tr>
                                                @endforeach

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
                            <div class="form-group">
                                {!! Form::submit('Editar', ['class' => 'btn btn-block btn-success btn-lg']) !!}
                            </div>
                        </div>
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

