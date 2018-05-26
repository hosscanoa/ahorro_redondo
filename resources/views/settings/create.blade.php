<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ahorro Redondo(Nuevo)</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <div class="container">
        <h1>Seleccionar Nuevo Banco</h1>
        <div class="row">
          <div class="col-md-12">
            <a href="">Agregar nuevo</a>
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
    </body>
</html>
