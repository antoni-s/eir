<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\LoginDAO;
use App\Models\Entidades\Login;
use App\Models\Validacao\LoginValidador;

class LoginController extends Controller
{
    public function index()
    {
        $this->render('login/index');
    }

		public function logar()
		{
			$Login = new Login();
			$Login->setEmail($_POST['email']);
			$Login->setPassword($_POST['password']);

			Sessao::gravaFormulario($_POST);

			$loginValidador = new LoginValidador();
			$resultadoValidacao = $loginValidador->validar($Login);

			if($resultadoValidacao->getErros()){
					Sessao::gravaErro($resultadoValidacao->getErros());
					$this->redirect('/login/index');
			}

			$loginDAO = new LoginDAO();
			$loginResponse = $loginDAO->validaLogin(
				$Login->getEmail(), $Login->getPassword()
			);

			if(!$loginResponse)
			{
					Sessao::gravaErro(['Email e/ou senha inválido']);
					$this->redirect('/login/index');
			}

			Sessao::iniciarSessao(
				$loginResponse['id'],
				$loginResponse['nome'],
				$loginResponse['tipo']
			);

			Sessao::limpaFormulario();
			Sessao::limpaMensagem();
			Sessao::limpaErro();

			$this->redirect('/usuario/index');
		}

		public function logout()
		{
			Sessao::encerrarSessao();
			$this->redirect('/home/index');
		}
}
