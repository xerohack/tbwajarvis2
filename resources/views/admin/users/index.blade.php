@extends('adminlte::layouts.app')

@section('htmlheader_title')
	usuarios
@endsection

@section('contentheader_title')
    Lista de usuarios
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">

				<!-- Default box -->
				<div class="box">
                        @include('flash::message')
					<div class="box-header with-border">
						<h3 class="box-title">Usuarios</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body table-responsive">
                        <!-- Aqui va el formulario-->
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rut</th>
                                <th>Email</th>
                                <th>Cargo</th>
                                <th>Rol</th>
                                <th>Fecha Registro</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->rut}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->cargo}}</td>
                                    <td>{{$user->rol}}</td>
                                    <td>{{$user->created_at}}</td>
                                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary fa fa-pencil"></a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger fa fa-trash" onclick="return confirm('¿Está seguro que desea eliminar el usuario {{$user->email}}?')"></a></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {!! $users->render()!!}

						{{ trans('adminlte_lang::message.logged') }}. USUARIOS {{ Auth::user()->nombre }}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
