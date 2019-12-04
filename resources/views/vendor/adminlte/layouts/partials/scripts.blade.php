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
            minDate: 0,  // disable past date
            //minTime: 0, // disable past time
        });
    });
</script>

<script>
// <!-- SCRIPT AGREGAR ROW-->
    function addRow()
    {
        var tr='<tr>'+
                '<td><button type="button" class="btn btn-danger remove borrar" onclick="eliminarFila()"><i class="glyphicon glyphicon-remove"></i></button></td>'+
                '<td>{!! Form::text('nombreitem[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre item','required','maxlength' => 100]) !!}</td>'+
                '<td>{!! Form::number('cantidaditem[]', null, ['class' => 'form-control', 'placeholder' => 'Cantidad','required','min'=>'0']) !!}</td>'+
                '<td>{!! Form::number('valoritem[]', null, ['class' => 'form-control', 'placeholder' => 'Valor','required','min'=>'0']) !!}</td>'+
                '<td>{!! Form::textarea('detalleitem[]', null, ['class' => 'form-control', 'placeholder' => 'Características del ítem','required','maxlength' => 10000,'rows'=>5 ]) !!}</td>'+
                '<td>{!! Form::textarea('comentarioitem[]', null, ['class' => 'form-control', 'placeholder' => 'Cambios realizados','maxlength' => 10000,'rows'=>5 ]) !!}</td>'+
                '</tr>';
        $('tbody').append(tr);
    };

// ELIMINAR FILA
    function eliminarFila(){
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        });
    }
</script>

