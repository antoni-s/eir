<?php

use App\Models\Entidades\Atendente;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class AtendenteTest extends TestCase
{

	private $atendente;

	public function __construct()
	{
			$this->atendente = new Atendente();
			parent::__construct();
	}

	public function testInstanceAtendente()
	{
			$this->atendente = new Atendente();
			$this->assertInstanceOf(Atendente::class, $this->atendente);
	}

  public function testGetEmptyId()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$id = $this->atendente->getId();
		$this->assertEquals($id, NULL);
  }

	public function testGetId()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setId(1);
		$id = $this->atendente->getId();
		$this->assertEquals($id, 1);
	}

  public function testAtendenteNome()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setNome('Maria');
		$id = $this->atendente->getNome();
		$this->assertEquals($id, 'Maria');
  }

  public function testAtendenteCpf()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setCpf('123.123.123-12');
		$id = $this->atendente->getCpf();
		$this->assertEquals($id, '123.123.123-12');
  }

  public function testAtendenteMatricula()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setMatricula('123456');
		$id = $this->atendente->getMatricula();
		$this->assertEquals($id, '123456');
  }

  public function testAtendenteUnidade()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setUnidade('23456');
		$id = $this->atendente->getUnidade();
		$this->assertEquals($id, '23456');
  }

  public function testAtendenteUnidadeNome()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setUnidadeNome('dsadadsa');
		$id = $this->atendente->getUnidadeNome();
		$this->assertEquals($id, 'dsadadsa');
  }

  public function testAtendenteLogradouro()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setLogradouro('dsadsadsadsadsa');
		$id = $this->atendente->getLogradouro();
		$this->assertEquals($id, 'dsadsadsadsadsa');
  }

  public function testAtendenteBairro()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setBairro('dsadsadsa');
		$id = $this->atendente->getBairro();
		$this->assertEquals($id, 'dsadsadsa');
  }

  public function testAtendenteCep()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setCep('74000-000');
		$id = $this->atendente->getCep();
		$this->assertEquals($id, '74000-000');
  }

  public function testAtendenteCidade()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setCidade('Goiania');
		$id = $this->atendente->getCidade();
		$this->assertEquals($id, 'Goiania');
  }

  public function testAtendenteUf()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setUf('GO');
		$id = $this->atendente->getUf();
		$this->assertEquals($id, 'GO');
  }

  public function testAtendenteComplemento()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setComplemento('dsadsadsa');
		$id = $this->atendente->getComplemento();
		$this->assertEquals($id, 'dsadsadsa');
  }

  public function testAtendenteTelefone()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setTelefone('(66)99998-9999');
		$id = $this->atendente->getTelefone();
		$this->assertEquals($id, '(66)99998-9999');
  }

  public function testAtendenteEmail()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setEmail('test@test.com.br');
		$id = $this->atendente->getEmail();
		$this->assertEquals($id, 'test@test.com.br');
  }

  public function testAtendenteDataCadastro()
  {
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->atendente->setDataCadastro('17102017');
		$id = $this->atendente->getDataCadastro();
		$this->assertEquals($id, '17102017');
  }

}

 ?>
