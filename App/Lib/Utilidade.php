<?php

namespace App\Lib;

use App\Lib\Sessao;
use App\Models\DAO\UnidadeDAO;
use App\Models\Entidades\Unidade;

class Utilidade
{
    public function __construct()
    {
      $unidadeDAO = new UnidadeDAO();
      return $unidadeDAO->listar();
    }
}
?>
