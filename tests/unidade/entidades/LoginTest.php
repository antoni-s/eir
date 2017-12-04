<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Login;

/**
 *
 */
class LoginTest extends TestCase
{
  private $login;

	public function __construct()
	{
			$this->login = new Login();
			parent::__construct();
	}

	public function testInstanceLogin()
	{
			$this->login = new Login();
			$this->assertInstanceOf(Login::class, $this->login);
	}

  public function testLoginEmail( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->login->setEmail('oi@teste.com');
		$loginEmail = $this->login->getEmail();
		$this->assertEquals($loginEmail, 'oi@teste.com');
  }

	public function testLoginPassword( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->login->setPassword('qwe123');
		$loginPassword = $this->login->getPassword();
		$this->assertEquals($loginPassword, 'qwe123');
  }

}


 ?>
