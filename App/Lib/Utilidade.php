<?php

namespace App\Lib;

use App\Lib\Sessao;
use App\Models\DAO\UnidadeDAO;
use App\Models\Entidades\Unidade;

class Utilidade
{
    private $resultado;

    public function __construct()
    {
        $unidadeDAO = new UnidadeDAO();
        $this->resultado = $unidadeDAO->listar();
        return $this->resultado;
    }
}
?>
