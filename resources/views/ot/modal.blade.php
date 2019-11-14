<div class="modal fade" id="addCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Cerrar</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
            </div>

            {!! Form::open(['route' => 'cliente.store', 'method' => 'POST']) !!}

            <div class="modal-body"> <!-- MODAL BODY -->
                <h3>Datos de Contacto</h3>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombrecliente">Nombre</label>
                            <input type="text" class="form-control" id="nombrecliente" name="nombrecliente" placeholder="Ingresa nombre" required="required"><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellidocliente">Apellido</label>
                            <input type="text" class="form-control" id="apellidocliente" name="apellidocliente" placeholder="Ingresa Apellidos" required="required"><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emailcliente">Email de contacto</label>
                            <input type="email" class="form-control" id="emailcliente" name="emailcliente" placeholder="Ingresa Correo" required="required"><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="telefonocliente">Teléfono</label>
                            <input type="number" class="form-control" id="telefonocliente" name="telefonocliente" placeholder="Ingresa Teléfono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="areacliente">Area</label>
                            <input type="text" class="form-control" id="areacliente" name="areacliente" placeholder="Ingresa area">
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3>Datos de empresa</h3>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreempresa">Razón social / Nombre</label>
                            <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" placeholder="Ingresa Nombre" required="required"><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rutempresa">Rut</label>
                            <input type="text" class="form-control" id="rutempresa" name="rutempresa" placeholder="Ingresa RUT.: Ej.11111111-1" required="required"><br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="giroempresa">Giro</label>
                            <input type="text" class="form-control" id="giroempresa" name="giroempresa" placeholder="Ingresa Giro" required="required"><br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="direccionempresa">Dirección</label>
                            <input type="text" class="form-control" id="direccionempresa" name="direccionempresa" placeholder="Ingresa Dirección" required="required"><br><br>
                            <input type="hidden" name="agregar" value="agregar">
                        </div>
                    </div>

                    <div class="clearfix"></div>

            </div><!-- MODAL BODY -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
