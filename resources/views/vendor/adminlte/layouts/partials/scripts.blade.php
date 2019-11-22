<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> --}}
<script src="{{ asset('/js/jquery.rut.js') }}"></script>

<script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
{{-- <script src="{{ asset('/js/bootstrap.js') }}"></script>--}}
{{-- <script src="{{ asset('/js/bootstrap.min.js') }}"></script> --}}


<!-- Datetimepicker JS -->
<script src="{{ asset('/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

<script>
    $(function () {
        $("input#rut")
                .rut({formatOn: 'keyup', validateOn: 'keyup'})
                .on('rutInvalido', function(){
                    $(this).parents(".form-group").addClass("has-error")
                })
                .on('rutValido', function(){
                    $(this).parents(".form-group").removeClass("has-error")
                });
    });
</script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

<script>
    $(function () {
        $.datetimepicker.setLocale('es');
        $('#datetimepicker').datetimepicker({

        });
    });
</script>

<script>
    /*
    function agregarFila(){
    document.getElementById("tablaitem").insertRow(-1).innerHTML = '<tr><td><button type="button" class="btn btn-danger" onclick="eliminarFila()">x</button></td><td>{!!Form::text('nombreitem', null,['class'=>'form-control','placeholder'=>'Nombre item'])!!}</td><td>{!!Form::number('cantidaditem',null,['class'=>'form-control','placeholder'=>'Cantidad'])!!}</td><td>{!!Form::text('valoritem',null,['class'=>'form-control','placeholder'=>'Valor'])!!}</td><td colspan="7" class="col-12 col-sm-6 col-md-6">{!!Form::textarea('detalleitem',null,['class'=>'form-control','placeholder'=>'Detalle del item'])!!}</td></tr>';
    }
    */

    function eliminarFila(){
    var table = document.getElementById("tablaitem");
    var rowCount = table.rows.length;
    //console.log(rowCount);

    if(rowCount <= 1)
        alert('No se puede eliminar el encabezado');
    else
        table.deleteRow(rowCount -1);
    }
// <!-- PRUEBA DE SCRIPT AGREGAR ROW-->
    function addRow()
    {
        var tr='<tr>'+
        '<td><button type="button" class="btn btn-danger remove" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
        '<td><input type="text" name="nombreitem[]" class="form-control" placeholder="Nombre item"></td>'+
        '<td><input type="text" name="cantidaditem[]" class="form-control" placeholder="Cantidad"</td>'+
        '<td><input type="text" name="valoritem[]" class="form-control" placeholder="Valor"</td>'+
        '<td colspan="7" class="col-12 col-sm-6 col-md-6">{!! Form::textarea('detalleitem[]', null, ['class' => 'form-control', 'placeholder' => 'Detalle del item']) !!}</td>'+
        '</tr>';
        $('tbody').append(tr);
    };
</script>





<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
