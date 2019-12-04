@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Ordenes de trabajo
@endsection

@section('contentheader_title')
    Lista de ordenes de trabajo
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">
                @include('flash::message')

				<!-- Default box -->
				<div class="box">
                        @include('flash::message')
					<div class="box-header with-border">
						<h3 class="box-title">Ordenes de trabajo</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							{{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button> --}}
						</div>
					</div>
					<div class="box-body table-responsive">
                        <!-- Aqui va el formulario-->
                        <table class="table table-striped text-center">
                            <thead>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Tema</th>
                                <th>Producto/Campaña</th>
                                <th>Departamento</th>
                                <th>Ejecutivo responsable</th>
                                <th>Estado</th>
                                <th>Fecha ingreso</th>
                                <th>Fecha entrega</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($ots as $ot)
                                    @if($ot->condicion == 1)
                                    <tr>
                                        <td>{{$ot->id}}</td>
                                        <td>{{$ot->cliente->nombreempresa}}</td>
                                        <td>{{$ot->tema}}</td>
                                        <td>{{$ot->campana}}</td>
                                        <td>{{$ot->departamento}}</td>
                                        <td>{{$ot->ejecutivores}}</td>
                                        <td>{{$ot->estado}}</td>
                                        <td>{{$ot->created_at}}</td>
                                        <td>{{$ot->fechaentrega}}</td>
                                        <td>
                                        <a href="{{ route('ots.edit', $ot->id) }}" class="btn btn-primary fa fa-pencil"></a>
                                        {{-- <a href="{{ route('ots.destroy', $ot->id) }}" class="btn btn-danger fa fa-trash" onclick="return confirm('¿Está seguro que desea eliminar la OT{{$ot->id}}?')"></a> --}}

                                        <a>{!! Form::open(['action' => ['OtsController@destroy', $ot->id], 'method' => 'delete']) !!}
                                                <button type="submit" onclick="return confirm('¿Seguro que desea eliminar la OT?')" class="btn btn-danger fa fa-trash"></button>
                                            {!! Form::close() !!}</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        {!! $ots->render()!!}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection
