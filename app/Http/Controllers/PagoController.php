<?php

namespace App\Http\Controllers;

use App\Ahorro;
use App\Banco;
use App\Pago;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bancos'] = Banco::all();
        $data['redondeos'] = Tabla::where('descripcion', 'pagos')->first()->tipos()->orderBy('valor', 'asc')->get();

        return view('pago', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function tipoServicio(Request $request)
    {
        $bancoId = $request->get('bancoId');
        $tipos = DB::select("select distinct t.id, t.descripcion from 
                                bancos b join bancos_servicios bs on b.id=bs.banco_id
                                join servicios s on bs.servicio_id=s.id
                                join tipos t on s.tipo_id=t.id
                                where b.id=" . $bancoId . "
                                order by descripcion;");

        return $tipos;
    }


    public function traerEmpresas(Request $request)
    {
        $bancoId = $request->get('bancoId');
        $categoriaId = $request->get('categoriaId');

        $empresas = DB::select("select s.id, s.descripcion from 
                    bancos b join bancos_servicios bs on b.id=bs.banco_id
                    join servicios s on bs.servicio_id=s.id
                    join tipos t on s.tipo_id=t.id
                    where b.id=" . $bancoId . " and t.id=" . $categoriaId . "order by descripcion;");
        return $empresas;
    }

    public function traerMontoAPagar(Request $request)
    {
        $empresaId = $request->get('empresaId');
        $codigoPago = $request->get('codigoPago');


    }

    public function pago(Request $request)
    {
        $servicioId = $request->get("servicioId");
        $codigoPago = $request->get("codigoPago");
        $monto = $request->get("monto");
        $tipoId = $request->get("tipoId");
        $cuentaId = $request->get("cuentaId");

        $pago = new Pago();
        $pago->servicio()->associate(Servicio::find($servicioId));
        $pago->codigoPago = $codigoPago;
        $pago->monto = $monto;
        $tipo = Tipo::find($tipoId);
        $pago->tipo()->associate($tipo);
        $pago->fecha = date('Y-m-d H:m:s');
        $pago->cuenta()->associate(Tipo::find($cuentaId));

        $pago->save();

        if ($tipo != 11) {
            $ahorro = new Ahorro();
            $ahorro->pago()->associate(Pago::find($pago));

            $r = round($monto, $tipo->valor);
            if ($r <= $monto) {
                $r += $tipo->incremento;
            }
            $ahorro->monto = $r - $monto;
            $ahorro->save();
        }
    }
}
