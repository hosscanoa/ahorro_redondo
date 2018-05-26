<?php

namespace App\Http\Model;


class Setting
{

    public $selectedRound = '10';
    private $listAccounts = array();
    private $listRounds = array('1', '5', '10', '15');


    public function getAccounts()
    {
      return($this->listAccounts);
    }


    public function getRounds()
    {
      return($this->listRounds);
    }

}