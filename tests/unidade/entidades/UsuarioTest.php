<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Usuario;

/**
 *
 */
class UsuarioTest extends TestCase
{

  private $usuario;

	public function __construct()
	{
			$this->usuario = new Usuario();
			parent::__construct();
	}

	public function testInstanceAtendente()
	{
			$this->usuario = new Usuario();
			$this->assertInstanceOf(Usuario::class, $this->usuario);
	}


  public function testUsuarioId( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setId(123);
		$usu = $this->usuario->getId();
		$this->assertEquals($usu, 123);
  }

  public function testUsuarioNome()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setNome('dsadsadsa');
		$usu = $this->usuario->getNome();
		$this->assertEquals($usu, 'dsadsadsa');
  }

  public function testUsuarioSenha()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setSenha('123');
		$usu = $this->usuario->getSenha();
		$this->assertEquals($usu, '123');
  }

  public function testUsuarioCpf()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setCpf('123.123.123-12');
		$usu = $this->usuario->getCpf();
		$this->assertEquals($usu, '123.123.123-12');
  }

  // public function testUsuarioDataNascimento()
  // {
  //   $u = $this->createMock(Usuario::class);
  //   $u->method('getDataNascimento')->willReturn(NULL);
  //   $this->assertEquals(NULL, $u->getDataNascimento());
  //
  //   $u = $this->createMock(Usuario::class);
  //   $u->method('setDataNascimento')->willReturn('');
  //   $this->assertEquals('',$u->setDataNascimento('13/02/1998'));
  // }

  public function testUsuarioLogradouro()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setLogradouro('dsadsadsadsadsa');
		$usu = $this->usuario->getLogradouro();
		$this->assertEquals($usu, 'dsadsadsadsadsa');
  }

  public function testUsuarioBairro()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setBairro('dsadsadsa');
		$usu = $this->usuario->getBairro();
		$this->assertEquals($usu, 'dsadsadsa');
  }

  public function testUsuarioCep()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setCep('74000-000');
		$usu = $this->usuario->getCep();
		$this->assertEquals($usu, '74000-000');
  }

  public function testUsuarioCidade()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setCidade('Goiania');
		$usu = $this->usuario->getCidade();
		$this->assertEquals($usu, 'Goiania');
  }

  public function testUsuarioUf()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setUf('GO');
		$usu = $this->usuario->getUf();
		$this->assertEquals($usu, 'GO');
  }

  public function testUsuarioComplemento()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setComplemento('dsadsadsa');
		$usu = $this->usuario->getComplemento();
		$this->assertEquals($usu, 'dsadsadsa');
  }

  public function testUsuarioTelefone()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setTelefone('(66)99998-9999');
		$usu = $this->usuario->getTelefone();
		$this->assertEquals($usu, '(66)99998-9999');
  }

  public function testUsuarioEmail()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setEmail('test@test.com.br');
		$usu = $this->usuario->getEmail();
		$this->assertEquals($usu, 'test@test.com.br');
  }

  public function testUsuarioNomeMae()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->usuario->setNomeMae('adsadsadsad');
		$usu = $this->usuario->getNomeMae();
		$this->assertEquals($usu, 'adsadsadsad');
  }

  public function testUsuarioInformacoes()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
    $this->usuario->setInformacoes('dsadsadsadsadsadsadsadsadsa');
    $usu = $this->usuario->getInformacoes();
    $this->assertEquals($usu, 'dsadsadsadsadsadsadsadsadsa');
  }

  // public function testUsuarioDataCadastro()
  // {
  //   $u = $this->createMock(Usuario::class);
  //   $u->method('getDataCadastro')->willReturn(NULL);
  //   $this->assertEquals(NULL, $u->getDataCadastro());
  //
  //   $u = $this->createMock(Usuario::class);
  //   $u->method('setDataCadastro')->willReturn('');
  //   $this->assertEquals('',$u->setDataCadastro('17102017'));
  // }
}

 ?>
