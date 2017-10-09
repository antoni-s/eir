<?php

namespace App\Controllers;

use App\Lib\ConversorMonetario;
use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Models\DAO\UnidadeDAO;
use App\Models\Entidades\Unidade;
use App\Models\Validacao\UnidadeValidador;

class ProdutoController extends Controller
{
    public function index($params)
    {
        $unidadeDAO = new UnidadeDAO();

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = 6;

        // if(isset($_GET['buscaUnidade'])){

            $listaUnidades      = $unidadeDAO->buscaComPaginacao($_GET['buscaUnidade'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaUnidades);

            self::setViewParam('buscaUnidade', $_GET['buscaUnidade']);
            self::setViewParam('paginacao', $paginacao->criandoLink($_GET['buscaUnidade']));
            self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUnidade']));

            self::setViewParam('listaUnidades'  , $listaUnidades['resultado']);

        // }

        $this->render('/unidade/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/unidade/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Unidade = new Unidade();
        $Unidade->setNome($_POST['nome']);
        // $Unidade->setStatus($_POST['status']);
        // $Unidade->setPreco(ConversorMonetario::realParaDolar($_POST['preco']));
        // $Unidade->setUnidade($_POST['unidade']);
        $Unidade->setEan($_POST['ean']);
        // $Unidade->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $unidadeValidador = new UnidadeValidador();
        $resultadoValidacao = $unidadeValidador->validar($Unidade);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/unidade/cadastro');
        }

        $unidadeDAO = new UnidadeDAO();

        if($unidadeDAO->validaEan($Unidade->getEan()))
        {
            Sessao::gravaErro(['Código EAN já existe.']);
            $this->redirect('/unidade/cadastro');
        }

        $unidadeDAO->salvar($Unidade);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto');

    }

    public function edicao($params)
    {
        $id = $params[0];

        $unidadeDAO = new UnidadeDAO();

        $unidade = $unidadeDAO->listar($id);

        if(!$unidade){
            Sessao::gravaMensagem("Unidade inexistente");
            $this->redirect('/unidade');
        }

        self::setViewParam('unidade',$unidade);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUnidade']));

        $this->render('/unidade/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }

    public function atualizar()
    {

        $Unidade = new Unidade();
        $Unidade->setId($_POST['id']);
        $Unidade->setNome($_POST['nome']);
        // $Unidade->setStatus($_POST['status']);
        // $Unidade->setPreco(ConversorMonetario::realParaDolar($_POST['preco']));
        // $Unidade->setUnidade($_POST['unidade']);
        $Unidade->setEan($_POST['ean']);
        // $Unidade->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $unidadeValidador = new UnidadeValidador();
        $resultadoValidacao = $unidadeValidador->validar($Unidade);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/unidade/edicao/'.$_POST['id']);
        }

        $unidadeDAO = new UnidadeDAO();

        $UnidadeSelecionado = $unidadeDAO->listar($Unidade->getId());

        if($unidadeDAO->validaEan($Unidade->getEan()) &&
            ($UnidadeSelecionado->getEan() != $Unidade->getEan()))
        {
            Sessao::gravaErro(['Código EAN já existe.']);
            $this->redirect('/unidade/edicao/'.$_POST['id'].'?buscaUnidade='.$_GET['buscaUnidade'].'&paginaSelecionada='.$_GET['paginaSelecionada']);
        }

        $unidadeDAO->atualizar($Unidade);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/produto/?buscaUnidade='.$_GET['buscaUnidade']);

    }

    public function exclusao($params)
    {
        $id = $params[0];

        $unidadeDAO = new UnidadeDAO();

        $unidade = $unidadeDAO->listar($id);

        if(!$unidade){
            Sessao::gravaMensagem("Unidade inexistente");
            $this->redirect('/unidade');
        }

        self::setViewParam('unidade',$unidade);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUnidade']));

        $this->render('/unidade/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $Unidade = new Unidade();
        $Unidade->setId($_POST['id']);

        $unidadeDAO = new UnidadeDAO();

        if(!$unidadeDAO->excluir($Unidade)){
            Sessao::gravaMensagem("Unidade inexistente");
            $this->redirect('/unidade');
        }

        Sessao::gravaMensagem("Unidade excluido com sucesso!");

        $this->redirect('/unidade/');

    }
}