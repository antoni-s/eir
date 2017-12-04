<?php

namespace App\Controllers;

use App\Lib\ConversorMonetario;
use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Lib\Utilidade;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;
use App\Models\DAO\UnidadeDAO;
use App\Models\Entidades\Unidade;
use App\Models\Validacao\UsuarioValidador;

class UsuarioController extends Controller
{
    public function index($params)
    {

				// Controle de acesso

				$user = Sessao::retornaSessao();

				if (!$user) {
					$this->redirect('/home');
				}

				if ($user['tipo'] != 2) {
					$this->redirect('/usuario/edicao/'.$user['id']);
				}

				// ---------------------

        $usuarioDAO = new UsuarioDAO();

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = 6;

        // if(isset($_GET['buscaUsuario'])){

            $listaUsuarios      = $usuarioDAO->buscaComPaginacao($_GET['buscaUsuario'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaUsuarios);

            self::setViewParam('buscaUsuario', $_GET['buscaUsuario']);
            self::setViewParam('paginacao', $paginacao->criandoLink($_GET['buscaUsuario']));
            self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUsuario']));

            self::setViewParam('listaUsuarios'  , $listaUsuarios['resultado']);

        // }

        $this->render('/usuario/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Usuario = new Usuario();
        $Usuario->setNome($_POST['nome']);
        $Usuario->setCpf($_POST['cpf']);
        $Usuario->setSenha($_POST['senha']);
        $Usuario->setLogradouro($_POST['logradouro']);
        $Usuario->setBairro($_POST['bairro']);
        $Usuario->setCep($_POST['cep']);
        $Usuario->setCidade($_POST['cidade']);
        $Usuario->setUf($_POST['uf']);
        $Usuario->setComplemento($_POST['complemento']);
        $Usuario->setTelefone($_POST['telefone']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setNomeMae($_POST['nomeMae']);
        $Usuario->setInformacoes($_POST['informacoes']);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($Usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/cadastro');
        }

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->validaCpf($Usuario->getCpf()))
        {
            Sessao::gravaErro(['CPF já existe.']);
            $this->redirect('/usuario/cadastro');
        }

        $usuarioDAO->salvar($Usuario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/usuario');

    }

    public function edicao($params)
    {
        $id = $params[0];

				$user = Sessao::retornaSessao();

				if (!$user) {
					$this->redirect('/home');
				}

				if ($user['tipo'] != 2) {
					if ($user['id'] != $id) {
						$this->redirect('/home');
					}
				}

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if(!$usuario){
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario',$usuario);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUsuario']));

        $this->render('/usuario/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }

    public function atualizar()
    {

				$user = Sessao::retornaSessao();

				if (!$user) {
					$this->redirect('/home');
				}

				if ($user['tipo'] != 2) {
					if ($user['id'] != $_POST['id']) {
						$this->redirect('/home');
					}
				}

        $Usuario = new Usuario();
        $Usuario->setId($_POST['id']);
        $Usuario->setNome($_POST['nome']);
        $Usuario->setCpf($_POST['cpf']);
        $Usuario->setSenha($_POST['senha']);
        $Usuario->setLogradouro($_POST['logradouro']);
        $Usuario->setBairro($_POST['bairro']);
        $Usuario->setCep($_POST['cep']);
        $Usuario->setCidade($_POST['cidade']);
        $Usuario->setUf($_POST['uf']);
        $Usuario->setComplemento($_POST['complemento']);
        $Usuario->setTelefone($_POST['telefone']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setNomeMae($_POST['nomeMae']);
        $Usuario->setInformacoes($_POST['informacoes']);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($Usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/edicao/'.$_POST['id']);
        }

        $usuarioDAO = new UsuarioDAO();

        $UsuarioSelecionado = $usuarioDAO->listar($Usuario->getId());

        if($usuarioDAO->validaCpf($Usuario->getCpf()) &&
            ($UsuarioSelecionado->getCpf() != $Usuario->getCpf()))
        {
            Sessao::gravaErro(['CPF já existe.']);
            $this->redirect('/usuario/edicao/'.$_POST['id'].'?buscaUsuario='.$_GET['buscaUsuario'].'&paginaSelecionada='.$_GET['paginaSelecionada']);
        }

        $usuarioDAO->atualizar($Usuario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/usuario/?buscaUsuario='.$_GET['buscaUsuario']);

    }

    public function exclusao($params)
    {
        $id = $params[0];

				$user = Sessao::retornaSessao();

				if (!$user) {
					$this->redirect('/home');
				}

				if ($user['tipo'] != 2) {
					if ($user['id'] != $id) {
						$this->redirect('/home');
					}
				}

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if(!$usuario){
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario',$usuario);
        self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['buscaUsuario']));

        $this->render('/usuario/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {

				$user = Sessao::retornaSessao();

				if (!$user) {
					$this->redirect('/home');
				}

				if ($user['tipo'] != 2) {
					if ($user['id'] != $_POST['id']) {
						$this->redirect('/home');
					}
				}

        $Usuario = new Usuario();
        $Usuario->setId($_POST['id']);

        $usuarioDAO = new UsuarioDAO();

        if(!$usuarioDAO->excluir($Usuario)){
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        Sessao::gravaMensagem("Usuario excluido com sucesso!");

        $this->redirect('/usuario/');

    }
}
