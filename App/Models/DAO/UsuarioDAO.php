<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;
use App\Models\Paginacao;

class UsuarioDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaUsuario, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        // LIKE '%$buscaUsuario%' OR descricao
        $whereBusca = " WHERE nome
                                LIKE '%$buscaUsuario%' OR cpf = '$buscaUsuario'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM usuario $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM usuario as usuario $whereBusca LIMIT $inicio,$totalPorPagina"
            // "SELECT usuario.*, unidade.nome AS unidadeNome
            //   FROM usuario usuario
            //   INNER JOIN unidade unidade ON usuario.unidade = unidade.id
            //   $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class)];

    }
    public  function validaCpf($cpf)
    {
        if($cpf) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM usuario WHERE cpf = '$cpf'"
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
                "SELECT * FROM usuario WHERE id = $id"
            );

            return $resultado->fetchObject(Usuario::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM usuario'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
        }

        return false;
    }

    public  function salvar(Usuario $usuario)
    {
        try {

            $nome           = $usuario->getNome();
            $cpf            = $usuario->getCpf();
            $senha          = $usuario->getSenha();
            $logradouro     = $usuario->getLogradouro();
            $bairro         = $usuario->getBairro();
            $cep            = $usuario->getCep();
            $cep            = explode("-", $cep);
            $cep            = $cep[0].$cep[1];
            $cidade         = $usuario->getCidade();
            $uf             = $usuario->getUf();
            $complemento    = $usuario->getComplemento();
            $telefone       = $usuario->getTelefone();
            $email          = $usuario->getEmail();
            $nomeMae        = $usuario->getNomeMae();
            $informacoes    = $usuario->getInformacoes();

            return $this->insert(
                'usuario',
                // ":nome,:status,:preco,:unidade,:ean,:descricao",
                ":nome,:cpf,:senha,:logradouro,:bairro,:cep,
                :cidade,:uf,:complemento,
                :telefone,:email,:nomeMae,:informacoes",
                [
                    ':nome'=>$nome,
                    ':cpf'=>$cpf,
                    ':senha'=>$senha,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    ':telefone'=>$telefone,
                    ':email'=>$email,
                    ':nomeMae'=>$nomeMae,
                    ':informacoes'=>$informacoes
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Usuario $usuario)
    {
        try {

            $id             = $usuario->getId();
            $nome           = $usuario->getNome();
            $cpf            = $usuario->getCpf();
            $senha          = $usuario->getSenha();
            $logradouro     = $usuario->getLogradouro();
            $bairro         = $usuario->getBairro();
            $cep            = $usuario->getCep();
            $cep            = explode("-", $cep);
            $cep            = $cep[0].$cep[1];
            $cidade         = $usuario->getCidade();
            $uf             = $usuario->getUf();
            $complemento    = $usuario->getComplemento();
            $telefone       = $usuario->getTelefone();
            $email          = $usuario->getEmail();
            $nomeMae        = $usuario->getNomeMae();
            $informacoes    = $usuario->getInformacoes();

            return $this->update(
                'usuario',
                // "nome = :nome,status = :status, preco = :preco, unidade = :unidade, ean = :ean, descricao = :descricao",
                "nome = :nome, cpf = :cpf, senha = :senha,
                  logradouro = :logradouro, bairro = :bairro, cep = :cep,
                  cidade = :cidade, uf = :uf, complemento = :complemento,
                  telefone = :telefone, email = :email, nomeMae = :nomeMae,
                  informacoes = :informacoes",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':cpf'=>$cpf,
                    ':senha'=>$senha,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    ':telefone'=>$telefone,
                    ':email'=>$email,
                    ':nomeMae'=>$nomeMae,
                    ':informacoes'=>$informacoes,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Usuario $usuario)
    {
        try {
            $id = $usuario->getId();

            return $this->delete('usuario',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
