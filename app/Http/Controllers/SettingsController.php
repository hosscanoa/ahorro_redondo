<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use App\Usuario;
use App\Banco;
use App\Cuenta;
use App\Deseo;

class SettingsController extends Controller
{

    public function index()
    {
      $settingUser = Usuario::find(1);
      $bancos = Banco::all();
      $deseos = Deseo::all();
      $data = [
        'accounts'  => ($settingUser->cuentas),
        'banks' => ($bancos),
        'deseos' => ($deseos)
      ];
      return \View::make('settings.index') -> with($data);
    }

    public function store(Request $request)
    {
      $bank = $request->input('bank');
      $creditcard = $request->input('creditcard');
      $numberpassword = $request->input('numberpassword');

      dd($request);

      $client = new GuzzleHttp\Client();

      $res = $client->request('GET', "https://ahorra-redondo.herokuapp.com/getAccounts");

      if ($res->getStatusCode() == '200')
      {
        return $res->getBody();
      }
    }
    
    public function vista()
    {
        return \View::make('settings.pago');
    }


    public function saveAccounts(Request $request)
    {
      $settingUser = Usuario::find(1);
      $accounts = $request->input('accounts');
      $bank = $request->input('bank');

      foreach ($accounts as $account)
      {
        $modelaccount = new Cuenta;
        $modelaccount->numero = $account;
        $modelaccount->banco_id = $bank;
        $modelaccount->estado_id = '1';
        $modelaccount->save();
        $settingUser->cuentas()->attach($modelaccount);
      }

      return 'true';
    }

    public function desactivateAccount(Request $request)
    {
      $idCuenta = (int) $request->input('idCuenta');
      $cuenta = Cuenta::find($idCuenta);
      $cuenta->estado_id = '0';
      $cuenta->save();
      return 'ok';
    }

}