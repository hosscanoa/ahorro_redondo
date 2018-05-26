<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ahorro Redondo</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container">
        <h1>Seleccionar Proveedor</h1>
        <div class="row">
          <div class="col-md-12">
            <a data-toggle="modal" data-target="#modal-new" style="cursor: pointer;">Agregar nuevo</a>
          </div>
          <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Cuenta</th>
                  <th>Nombre Banco</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class="text-center" scope="row">1</th>
                  <td class="col-md-6">5264-018154</td>
                  <td class="col-md-3"><span class="label label-primary">BCP</span></td>
                  <td>
                    <a href="">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th class="text-center" scope="row">2</th>
                  <td class="col-md-6">5264-018154</td>
                  <td class="col-md-3"><span class="label label-danger">SBP</span></td>
                  <td>
                    <a href="">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <th class="text-center" scope="row">3</th>
                  <td class="col-md-6">5264-018154</td>
                  <td class="col-md-3"><span class="label label-info">BBVA</span></td>
                  <td>
                    <a href="">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Tipo de redondeo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="modal-new">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Agregar nuevo banco</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="new-bank">Banco:</label>
                   <select class="form-control" id="new-bank">
                    <option>SBP</option>
                    <option>BCP</option>
                    <option>BBVA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="creditcard">Numero Tarjeta</label>
                  <input type="text" class="form-control" id="creditcard" placeholder="Numero Tarjeta">
                </div>
                <div class="form-group">
                  <label for="numberpassword">Clave Dinamica</label>
                  <input type="password" class="form-control" id="numberpassword" placeholder="Clave Dinamica">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <script type="text/javascript" src="{{ URL::asset('js/settings/index.js') }}"></script>
    </body>
</html>
