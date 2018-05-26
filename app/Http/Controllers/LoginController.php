<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.inicio');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $usuario = $request->get('usuario');
        $password = $request->get('password');



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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function traerCategoriasPago(Request $request)
    {


    }


    public function traerEmpresasPorCategoriasPago(Request $request)
    {
        $categoriaId = $request->get('categoriaId');


    }

    public function traerMontoAPagar(Request $request)
    {
        $empresaId = $request->get('empresaId');
        $codigo = $request->get('codigo');


    }

    public function pago(Request $request)
    {
        $cuentaId = $request->get('cuentaId');
        $empresaId = $request->get('empresaId');
        $codigo = $request->get('codigo');
        $monto = $request->get('monto');
        $tipoRedondeo = $request->get('tipoRedondeo');


        //pago a empresa

        //deposito de redondeo


    }
}
