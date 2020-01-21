<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="{{ asset('/js/jquery.rut.js') }}"></script>

<script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>

@yield('scriptselect')

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
            format: 'd/m/y H:m',
            minDate: 0,  // disable past date
        });
    });
</script>

<script>
// <!-- SCRIPT AGREGAR ROW item ot-->
function addRow()
{
    var tr='<tr>'+
            '<td><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
            '<td>{!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>'+
            /* '<td>{!! Form::number('cantidaditem[]', null, ['class' => 'form-control', 'placeholder' => 'Cantidad','required','min'=>'0']) !!}</td>'+
            '<td>{!! Form::number('valoritem[]', null, ['class' => 'form-control', 'placeholder' => 'Valor','required','min'=>'0']) !!}</td>'+ */
            '<td>{!! Form::textarea('detalleitem[]', null, ['class' => 'form-control', 'placeholder' => 'Características del ítem','required','maxlength' => 10000,'rows'=>5 ]) !!}</td>'+
            '<td>{!! Form::textarea('comentarioitem[]', null, ['class' => 'form-control', 'placeholder' => 'Cambios realizados','maxlength' => 10000,'rows'=>5 ]) !!}</td>'+
            '<td>{!! Form::text('iditem[]', null,['hidden'=>'true']) !!}</td>'+
            '</tr>';
    $('tbody').append(tr);
};

// <!-- SCRIPT AGREGAR ROW item presupuesto-->
function addRowPre()
    {
        var tr='<tr>'+
                '<td><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
                '<td colspan="3"> Item {!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>'+
                '<td>{!! Form::text('iditem[]', null,['hidden'=>'true']) !!}</td>'+
                '</tr>';
        $('tfoot').append(tr);

        var tr='<tr>'+
                '<td></td>'+
                '<td width="70%">Proveedor <select name="prov" id="prov" class="form-control"></select> </td>'+
                '<td>Valor{!! Form::number('valorproveedor[]', null, ['class' => 'form-control', 'placeholder' => '$0','required','min'=>'0']) !!}</td>'+
                '<td width="10"><button type="button" class="btn-xs btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
            '</tr>';
        $('tfoot').append(tr);

        var tr='<tr>'+
                '<th colspan="7">'+
                '<button type="button" class="btn btn-warning center-block" onclick="addRowPreprov()">Agregar Proveedor</button>'+
                '</th>'+
                '</tr>';
        $('tfoot').append(tr);
    };

// <!-- SCRIPT AGREGAR ROW proveedor item presupuesto-->
function addRowPreprov()
    {
        var tr='<tr>'+
                '<td></td>'+
                '<td width="70%">Proveedor {!! Form::text('nombreproveedor[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre proveedor','required','maxlength' => 100]) !!}</td>'+
                '<td>Valor{!! Form::number('valorproveedor[]', null, ['class' => 'form-control', 'placeholder' => '$0','required','min'=>'0']) !!}</td>'+
                '<td width="10"><button type="button" class="btn-xs btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
            '</tr>';
        $('tbody').append(tr);
    };

// ELIMINAR FILA
function eliminarItemPre(){
$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    });
}


// ELIMINAR FILA
function eliminarFila(){
$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    });
}
</script>

