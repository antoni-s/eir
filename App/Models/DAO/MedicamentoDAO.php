<?php

namespace App\Models\DAO;

use App\Models\Entidades\Medicamento;
use App\Models\Paginacao;

class MedicamentoDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaMedicamento, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        // LIKE '%$buscaMedicamento%' OR descricao
        $whereBusca = " WHERE nome
                                LIKE '%$buscaMedicamento%' OR codigoBarras = '$buscaMedicamento'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM medicamento $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM medicamento as medicamento $whereBusca LIMIT $inicio,$totalPorPagina"
            // "SELECT medicamento.*, unidade.nome AS unidadeNome
            //   FROM medicamento medicamento
            //   INNER JOIN unidade unidade ON medicamento.unidade = unidade.id
            //   $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Medicamento::class)];

    }
    public  function validaCodigoBarras($codigoBarras)
    {
        if($codigoBarras) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM medicamento WHERE codigoBarras = '$codigoBarras'"
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
                "SELECT * FROM medicamento WHERE id = $id"
            );

            return $resultado->fetchObject(Medicamento::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM medicamento'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Medicamento::class);
        }

        return false;
    }

    public  function salvar(Medicamento $medicamento)
    {
        try {

            $nome           = $medicamento->getNome();
            $codigoBarras   = $medicamento->getCodigoBarras();
            $composicao     = $medicamento->getComposicao();
            $tipo           = $medicamento->getTipo();
            $dose           = $medicamento->getDose();
            $informacoes    = $medicamento->getInformacoes();

            return $this->insert(
                'medicamento',
                // ":nome,:status,:preco,:unidade,:ean,:descricao",
                ":nome,:codigoBarras,:composicao,:tipo,:dose,:informacoes",
                [
                    ':nome'=>$nome,
                    ':codigoBarras'=>$codigoBarras,
                    ':composicao'=>$composicao,
                    ':tipo'=>$tipo,
                    ':dose'=>$dose,
                    ':informacoes'=>$informacoes
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Medicamento $medicamento)
    {
        try {

            $nome           = $medicamento->getNome();
            $codigoBarras   = $medicamento->getCodigoBarras();
            $composicao     = $medicamento->getComposicao();
            $tipo           = $medicamento->getTipo();
            $dose           = $medicamento->getDose();
            $informacoes    = $medicamento->getInformacoes();

            return $this->update(
                'medicamento',
                // "nome = :nome,status = :status, preco = :preco, unidade = :unidade, ean = :ean, descricao = :descricao",
                "nome = :nome, codigoBarras = :codigoBarras, composicao = :composicao, tipo = :tipo,
                  dose = :dose, informacoes = :informacoes",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':codigoBarras'=>$codigoBarras,
                    ':composicao'=>$composicao,
                    ':tipo'=>$tipo,
                    ':dose'=>$dose,
                    ':informacoes'=>$informacoes
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Medicamento $medicamento)
    {
        try {
            $id = $medicamento->getId();

            return $this->delete('medicamento',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
