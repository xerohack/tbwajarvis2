<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.rut.js') }}"></script>
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



<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
