<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Model\Setting as Setting;

class SettingsController extends BaseController
{

    public function index()
    {
      $settingUser = new Setting();
      $data = [
        'accounts'  => ($settingUser->getAccounts()),
        'rounds'   => ($settingUser->getRounds()),
        'settingUser' =>  $settingUser
      ];
      return \View::make('settings.index')->with($data);
    }

    public function create()
    {
        return \View::make('settings.create');
    }

    public function getBanks()
    {
      return ["BCP", "BBVA", "SBP"];
    }


}