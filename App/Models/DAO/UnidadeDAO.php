<?php

namespace App\Models\DAO;

use App\Models\Entidades\Unidade;
use App\Models\Paginacao;

class UnidadeDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaUnidade, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        $whereBusca = " WHERE nome
                                LIKE '%$buscaUnidade%' OR descricao
                                LIKE '%$buscaUnidade%' OR ean = '$buscaUnidade'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM unidade $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM unidade as unidade $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Unidade::class)];

    }
    public  function validaEan($ean)
    {
        if($ean) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM Unidade WHERE ean = '$ean'"
            );

            return $resultado->fetch()['total'];
        }else{
           return false;
        }

        return false;
    }
    public  function listar($id = null)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT * FROM unidade WHERE id = $id"
            );

            return $resultado->fetchObject(Unidade::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM unidade'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Unidade::class);
        }

        return false;
    }

    public  function salvar(Unidade $unidade)
    {
        try {

            $nome           = $unidade->getNome();
            // $status         = $unidade->getStatus();
            // $preco          = $unidade->getPreco();
            // $unidade        = $unidade->getUnidade();
            $ean            = $unidade->getEan();
            // $descricao      = $unidade->getDescricao();

            return $this->insert(
                'unidade',
                // ":nome,:status,:preco,:unidade,:ean,:descricao",
                ":nome,:ean",
                [
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$unidade,
                    ':ean'=>$ean,
                    // ':descricao'=>$descricao
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Unidade $unidade)
    {
        try {

            $id             = $unidade->getId();
            $nome           = $unidade->getNome();
            // $status         = $unidade->getStatus();
            // $preco          = $unidade->getPreco();
            // $unidade        = $unidade->getUnidade();
            $ean            = $unidade->getEan();
            // $descricao      = $unidade->getDescricao();

            return $this->update(
                'unidade',
                // "nome = :nome,status = :status, preco = :preco, unidade = :unidade, ean = :ean, descricao = :descricao",
                "nome = :nome, ean = :ean",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$unidade,
                    ':ean'=>$ean,
                    // ':descricao'=>$descricao,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Unidade $unidade)
    {
        try {
            $id = $unidade->getId();

            return $this->delete('unidade',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
