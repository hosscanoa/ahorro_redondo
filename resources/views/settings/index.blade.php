@extends('../base')
@section('content')

<h2>Seleccionar Proveedor</h1>
<div class="row">
    <div class="col-md-12" style="margin-bottom: 15px;">
        <a class="btn btn-success   " data-toggle="modal" data-target="#modal-new" style="cursor: pointer;" id="add-new-bank">
            <i class="fas fa-plus"></i> Agregar nuevo</a>
        <a class="btn btn-success   " data-toggle="modal" data-target="#deseos" style="cursor: pointer;" id="add-new-bank">
            <i class="far fa-smile"></i> Agregar Deseos</a>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th class="text-center">#</th>
                <th>Cuenta</th>
                <th>Nombre Banco</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach (($accounts) as $account)
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
                @endforeach
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
                        <label for="creditcard">Nombre de lo que quieres</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="creditcard">Monto</label>
                        <input type="text" class="form-control" id="creditcard">
                    </div>
                    <div class="form-group">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ESTADO
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <ul>
                                    <li>ACTIVO</li>
                                    <li>INACTIVO</li>
                                </ul>
                            </div>
                          </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/settings/index.js') }}"></script>

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
                        <div class="make-switch switch-small" style="display: inline-flex">
                            <h6>SI</h6> <input type="checkbox" checked="true" data-checkbox="VALUE1" class="alert-status"> <h6>NO</h6>
                          </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
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
    </style>

