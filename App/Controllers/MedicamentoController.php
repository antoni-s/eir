Medicamento<?php

namespace App\Controllers;

use App\Lib\ConversorMonetario;
use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Lib\Utilidade;
use App\Models\DAO\MedicamentoDAO;
use App\Models\Entidades\Medicamento;
use App\Models\Validacao\MedicamentoValidador;

class MedicamentoController extends Controller
{
    public function index($params)
    {
        $medicamentoDAO = new MedicamentoDAO();

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = 6;

        // if(isset($_GET['buscaMedicamento'])){

            $listaMedicamentos      = $medicamentoDAO->buscaComPaginacao($_GET['buscaMedicamento'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaMedicamentos);

            self::setViewParam('buscaMedicamento', $_GET['buscaMedicamento']);
            self::setViewParam('paginacao', $paginacao->criandoLink($_GET['buscaMedicamento']));
            self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaMedicamento']));

            self::setViewParam('listaMedicamentos'  , $listaMedicamentos['resultado']);

        // }

        $this->render('/medicamento/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {

        $this->render('/medicamento/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Medicamento = new Medicamento();
        $Medicamento->setNome($_POST['nome']);
        $Medicamento->setCodigoBarras($_POST['codigoBarras']);
        $Medicamento->setComposicao($_POST['composicao']);
        $Medicamento->setTipo($_POST['tipo']);
        $Medicamento->setDose($_POST['dose']);
        $Medicamento->setInformacoes($_POST['informacoes']);

        Sessao::gravaFormulario($_POST);

        $medicamentoValidador = new MedicamentoValidador();
        $resultadoValidacao = $medicamentoValidador->validar($Medicamento);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/medicamento/cadastro');
        }

        $medicamentoDAO = new MedicamentoDAO();

        if($medicamentoDAO->validaCodigoBarras($Medicamento->getCodigoBarras()))
        {
            Sessao::gravaErro(['Código de barras já existe.']);
            $this->redirect('/medicamento/cadastro');
        }

        $medicamentoDAO->salvar($Medicamento);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/medicamento');

    }

    public function edicao($params)
    {
        $id = $params[0];

        $medicamentoDAO = new MedicamentoDAO();

        $medicamento = $medicamentoDAO->listar($id);

        if(!$medicamento){
            Sessao::gravaMensagem("Medicamento inexistente");
            $this->redirect('/medicamento');
        }

        self::setViewParam('medicamento',$medicamento);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaMedicamento']));

        $this->render('/medicamento/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }

    public function atualizar()
    {

        $Medicamento = new Medicamento();
        $Medicamento->setId($_POST['id']);
        $Medicamento->setNome($_POST['nome']);
        $Medicamento->setCodigoBarras($_POST['codigoBarras']);
        $Medicamento->setComposicao($_POST['composicao']);
        $Medicamento->setTipo($_POST['tipo']);
        $Medicamento->setDose($_POST['dose']);
        $Medicamento->setInformacoes($_POST['informacoes']);

        Sessao::gravaFormulario($_POST);

        $medicamentoValidador = new MedicamentoValidador();
        $resultadoValidacao = $medicamentoValidador->validar($Medicamento);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/medicamento/edicao/'.$_POST['id']);
        }

        $medicamentoDAO = new MedicamentoDAO();

        $MedicamentoSelecionado = $medicamentoDAO->listar($Medicamento->getId());

        if($medicamentoDAO->validaCodigoBarras($Medicamento->getCodigoBarras()) &&
            ($MedicamentoSelecionado->getCodigoBarras() != $Medicamento->getCodigoBarras()))
        {
            Sessao::gravaErro(['Código de barras já existe.']);
            $this->redirect('/medicamento/edicao/'.$_POST['id'].'?buscaMedicamento='.$_GET['buscaMedicamento'].'&paginaSelecionada='.$_GET['paginaSelecionada']);
        }

        $medicamentoDAO->atualizar($Medicamento);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/medicamento/?buscaMedicamento='.$_GET['buscaMedicamento']);

    }

    public function exclusao($params)
    {
        $id = $params[0];

        $medicamentoDAO = new MedicamentoDAO();

        $medicamento = $medicamentoDAO->listar($id);

        if(!$medicamento){
            Sessao::gravaMensagem("Medicamento inexistente");
            $this->redirect('/medicamento');
        }

        self::setViewParam('medicamento',$medicamento);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaMedicamento']));

        $this->render('/medicamento/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $Medicamento = new Medicamento();
        $Medicamento->setId($_POST['id']);

        $medicamentoDAO = new MedicamentoDAO();

        if(!$medicamentoDAO->excluir($Medicamento)){
            Sessao::gravaMensagem("Medicamento inexistente");
            $this->redirect('/medicamento');
        }

        Sessao::gravaMensagem("Medicamento excluido com sucesso!");

        $this->redirect('/medicamento/');

    }
}
