@extends('../base')
@section('content')
<style type="text/css" href="http://seiyria.com/bootstrap-slider/dependencies/css/highlightjs-github-theme.css"></style>
<script type="text/javascript" href="http://seiyria.com/bootstrap-slider/js/bootstrap-slider.js"></script>
<div class="form_pago container">
    <h2>Pagos</h2>
<div class="form-group">
    <div class="dropdown" style="width: 100%; text-align: left">
        <button style="width: 100%;text-align: left;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tipo de pago
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%; text-align: left">

            <option>Compras por internet</option>
            <option>Instituciones y Empresas</option>
            <option>Servicios públicos</option>
        </div>
      </div>
</div>
<div class="dropdown" style="width: 100%; text-align: left">
    <button style="width: 100%;text-align: left;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proveedor
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%; text-align: left">
        <option>Luz del sur</option>
        <option>Enel</option>
    </div>
</div>

<div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingresa tu código">
</div>
<fieldset class="form-group lista_pagos">
        <h4></h4>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
        18.50
      </label>
    </div>
</fieldset>


<input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
</div>

<style>
    .dropdown-toggle::after {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: .255em;
    vertical-align: .255em;
    content: "";
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-bottom: 0;
    border-left:.3em solid transparent;
    float:right;
    margin-top: 5px;
}
#ex1Slider .slider-selection {
    background: #BABABA;
}
</style>
@section('scripts')
<script type="text/javascript">
    $('#ex1').slider({
    formatter: function(value) {
        return 'Current value: ' + value;
    }
});
</script>
@endsection