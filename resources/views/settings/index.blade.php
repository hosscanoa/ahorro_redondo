@extends('../base')
@section('content')
    <style>
        .pago {
  padding: 40px 0 40px 0;
}

.form_pago {
  background-color: white;
  padding: 15px 30px;
}

.form_pago .selectpicker {
  margin-bottom: 5px

}

.form_pago .selectpicker .tipo_pago {
  width: 100%;
}

.form_pago .selectpicker .proveedor {
  width: 100%;
}
#ex1Slider .slider-selection {
  background: #BABABA;
}
           .dot-green {
             height: 25px;
             width: 25px;
             backgroundcolor: #5cb85c;
             borderradius: 50%;
             display: inlineblock;
           }
           .dot-red {
             height: 25px;
             width: 25px;
             backgroundcolor: #d9534f;
             borderradius: 50%;
             display: inlineblock;
           }
         
    </style>

<h2>Seleccionar Proveedor</h1>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 15px;">
        <a class="btn btn-success   " data-toggle="modal" data-target="#modal-new" style="cursor: pointer;" id="add-new-bank">
            <i class="fas fa-plus"></i> Agregar nuevo</a>
        <a class="btn btn-success   " data-toggle="modal" data-target="#deseos" style="cursor: pointer;" id="add-new-bank">
            <i class="far fa-smile"></i> Agregar Deseos</a>
        <a class="btn btn-success   " data-toggle="modal" data-target="#modal-whises" style="cursor: pointer;" id="btn-whises">Lista de deseos</a>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
                <tr>
                  <th class="text-center">#</th>
                  <th>Cuenta</th>
                  <th>Nombre Banco</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach (($accounts) as $account)
                <tr>
                    <th class="text-center" scope="row">{{ $account->id }}</th>
                    <td class="col-md-3">{{ $account->numero }}</td>
                    <td class="col-md-4"><span class="label label-primary">{{ $account->banco->descripcion }}</span></td>
                    @if ($account->estado_id == '1')
                      <td class="col-md-2"><span class="dot-green"></span></td>
                    @else
                      <td class="col-md-2"><span class="dot-red"></span></td>
                    @endif
                    <td class="col-md-2">
                      <a class="delete-account-in-bank"
                          data-account="{{$account ->id}}"
                          style="cursor: pointer;" data-toggle="modal" data-target="#desactivate-account">
                        <i class="glyphicon glyphicon-remove" style="margin-top: 5px;"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th class="text-center" scope="row">2</th>
                    <td class="col-md-3">5264-018154</td>
                    <td class="col-md-4"><span class="label label-primary">{{ $account->banco->descripcion }}</span></td>
                    <td class="col-md-2"><span class="dot-green"></span></td>
                    <td>
                        <a class="delete-account-in-bank">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
        
    </div>

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deseos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar deseos</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Nombre de lo que quieres</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="text" class="form-control" id="amount">
                    </div>
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status">
                          <option>ACTIVO</option>
                          <option>INACTIVO</option>
                        </select>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-new">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title frm-connect-new-card">Agregar nuevo banco</h4>
              <h4 class="modal-title frm-select-accounts">Seleccionar cuenta</h4>
            </div>
            <div class="modal-body">
              <form class="frm-connect-new-card">
                <div class="form-group">
                  <label for="new-bank">Banco:</label>
                   <select class="form-control" id="new-bank">
                    <option value="-1">Seleccione</option>
                    @foreach ($banks as $bank)
                      <option value="{{ $bank->id }}">{{ $bank->descripcion }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="credit-card">Numero Tarjeta</label>
                  <input type="text" class="form-control" id="credit-card" placeholder="Numero Tarjeta" maxlength="16">
                </div>
                <div class="form-group">
                  <label for="numberpassword">Clave Dinamica</label>
                  <input type="password" class="form-control" id="numberpassword" placeholder="Clave Dinamica" maxlength="10">
                </div>
              </form>
              <div class="frm-select-accounts" id="container-accounts">
                <table class="table table-striped" id="tbl-account-to-add">
                  <thead>
                    <tr>
                      <th>Cuenta</th>
                      <th>Nombre Banco</th>
                      <th>Tipo</th>
                      <th>Seleccionar</th>
                    </tr>
                  </thead>
                  <tbody><tr><td>88888888888888</td><td>BCP</td><td>cuenta Ahorro Soles</td><td><input type="checkbox" class="selected-accounts" data-account="88888888888888"></td></tr><tr><td>99999999999999</td><td>BCP</td><td>Cuenta corriente Soles</td><td><input type="checkbox" class="selected-accounts" data-account="99999999999999"></td></tr></tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default frm-connect-new-card" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary frm-connect-new-card" id="btn-login-bank">Siguiente</button>
              <button type="button" class="btn btn-primary frm-select-accounts" id="btn-select-accounts" disabled="disabled">Seleccionar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="desactivate-account">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Desea desactivar la cuenta?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="id-desactivate">Desactivar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <div class="modal fade" tabindex="-1" role="dialog" id="modal-whises">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Lista de deseos</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="tbl-account-to-add">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Monto</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($deseos as $deseo)
                      <tr>
                        <td class="col-md-3">{{$deseo->descripcion}}</td>
                        <td class="col-md-6">S/ {{$deseo->monto}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/settings/index.js') }}"></script>
   
        <script>
            $('.alert-status').bootstrapSwitch('state', true);
        </script>
    @endsection

