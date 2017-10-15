<?php

namespace App\Controllers;

use App\Lib\ConversorMonetario;
use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Lib\Utilidade;
use App\Models\DAO\AtendenteDAO;
use App\Models\Entidades\Atendente;
use App\Models\DAO\UnidadeDAO;
use App\Models\Entidades\Unidade;
use App\Models\Validacao\AtendenteValidador;

class AtendenteController extends Controller
{
    public function index($params)
    {
        $atendenteDAO = new AtendenteDAO();

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = 6;

        // if(isset($_GET['buscaAtendente'])){

            $listaAtendentes      = $atendenteDAO->buscaComPaginacao($_GET['buscaAtendente'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaAtendentes);

            self::setViewParam('buscaAtendente', $_GET['buscaAtendente']);
            self::setViewParam('paginacao', $paginacao->criandoLink($_GET['buscaAtendente']));
            self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaAtendente']));

            self::setViewParam('listaAtendentes'  , $listaAtendentes['resultado']);

        // }

        $this->render('/atendente/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $unidadeDAO = new UnidadeDAO();
        $unidade = $unidadeDAO->listar();

        if(!$unidade){
            Sessao::gravaMensagem("Nenhuma Unidade Cadastrada");
            $this->redirect('/atendente');
        }

        self::setViewParam('unidades', $unidade);

        $this->render('/atendente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Atendente = new Atendente();
        $Atendente->setNome($_POST['nome']);
        // $Atendente->setStatus($_POST['status']);
        // $Atendente->setPreco(ConversorMonetario::realParaDolar($_POST['preco']));
        // $Atendente->setAtendente($_POST['atendente']);
        $Atendente->setCpf($_POST['cpf']);
        $Atendente->setMatricula($_POST['matricula']);
        $Atendente->setLogradouro($_POST['logradouro']);
        $Atendente->setBairro($_POST['bairro']);
        $Atendente->setCep($_POST['cep']);
        $Atendente->setCidade($_POST['cidade']);
        $Atendente->setUf($_POST['uf']);
        $Atendente->setComplemento($_POST['complemento']);
        $Atendente->setTelefone($_POST['telefone']);
        $Atendente->setEmail($_POST['email']);
        // $Atendente->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $atendenteValidador = new AtendenteValidador();
        $resultadoValidacao = $atendenteValidador->validar($Atendente);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/atendente/cadastro');
        }

        $atendenteDAO = new AtendenteDAO();

        if($atendenteDAO->validaCpf($Atendente->getCpf()))
        {
            Sessao::gravaErro(['CPF já existe.']);
            $this->redirect('/atendente/cadastro');
        }

        $atendenteDAO->salvar($Atendente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/atendente');

    }

    public function edicao($params)
    {
        $id = $params[0];

        $atendenteDAO = new AtendenteDAO();

        $atendente = $atendenteDAO->listar($id);

        if(!$atendente){
            Sessao::gravaMensagem("Atendente inexistente");
            $this->redirect('/atendente');
        }

        $unidadeDAO = new UnidadeDAO();
        $unidade = $unidadeDAO->listar();

        self::setViewParam('atendente',$atendente);
        self::setViewParam('unidades',$unidade);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaAtendente']));

        $this->render('/atendente/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }

    public function atualizar()
    {

        $Atendente = new Atendente();
        $Atendente->setId($_POST['id']);
        $Atendente->setNome($_POST['nome']);
        // $Atendente->setStatus($_POST['status']);
        // $Atendente->setPreco(ConversorMonetario::realParaDolar($_POST['preco']));
        // $Atendente->setAtendente($_POST['atendente']);
        $Atendente->setCpf($_POST['cpf']);
        $Atendente->setMatricula($_POST['matricula']);
        $Atendente->setLogradouro($_POST['logradouro']);
        $Atendente->setBairro($_POST['bairro']);
        $Atendente->setCep($_POST['cep']);
        $Atendente->setCidade($_POST['cidade']);
        $Atendente->setUf($_POST['uf']);
        $Atendente->setComplemento($_POST['complemento']);
        $Atendente->setTelefone($_POST['telefone']);
        $Atendente->setEmail($_POST['email']);
        // $Atendente->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $atendenteValidador = new AtendenteValidador();
        $resultadoValidacao = $atendenteValidador->validar($Atendente);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/atendente/edicao/'.$_POST['id']);
        }

        $atendenteDAO = new AtendenteDAO();

        $AtendenteSelecionado = $atendenteDAO->listar($Atendente->getId());

        if($atendenteDAO->validaCpf($Atendente->getCpf()) &&
            ($AtendenteSelecionado->getCpf() != $Atendente->getCpf()))
        {
            Sessao::gravaErro(['CPF já existe.']);
            $this->redirect('/atendente/edicao/'.$_POST['id'].'?buscaAtendente='.$_GET['buscaAtendente'].'&paginaSelecionada='.$_GET['paginaSelecionada']);
        }

        $atendenteDAO->atualizar($Atendente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/atendente/?buscaAtendente='.$_GET['buscaAtendente']);

    }

    public function exclusao($params)
    {
        $id = $params[0];

        $atendenteDAO = new AtendenteDAO();

        $atendente = $atendenteDAO->listar($id);

        if(!$atendente){
            Sessao::gravaMensagem("Atendente inexistente");
            $this->redirect('/atendente');
        }

        self::setViewParam('atendente',$atendente);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaAtendente']));

        $this->render('/atendente/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $Atendente = new Atendente();
        $Atendente->setId($_POST['id']);

        $atendenteDAO = new AtendenteDAO();

        if(!$atendenteDAO->excluir($Atendente)){
            Sessao::gravaMensagem("Atendente inexistente");
            $this->redirect('/atendente');
        }

        Sessao::gravaMensagem("Atendente excluida com sucesso!");

        $this->redirect('/atendente/');

    }
}
