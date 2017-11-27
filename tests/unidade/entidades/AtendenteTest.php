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
		$this.assertEquals($id, NULL);
  }

  public function testAtendenteNome()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getNome')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getNome());

    $u = $this->createMock(Atendente::class);
    $u->method('setNome')->willReturn('');
    $this->assertEquals('',$u->setNome('dsadsadsa'));
  }

  public function testAtendenteCpf()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getCpf')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCpf());

    $u = $this->createMock(Atendente::class);
    $u->method('setCpf')->willReturn('');
    $this->assertEquals('',$u->setCpf('123.123.123-12'));
  }

  public function testAtendenteMatricula()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getMatricula')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getMatricula());

    $u = $this->createMock(Atendente::class);
    $u->method('setMatricula')->willReturn('');
    $this->assertEquals('',$u->setMatricula(123456));
  }

  public function testAtendenteUnidade()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getUnidade')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getUnidade());

    $u = $this->createMock(Atendente::class);
    $u->method('setUnidade')->willReturn('');
    $this->assertEquals('',$u->setUnidade('23456'));
  }

  public function testAtendenteUnidadeNome()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getUnidadeNome')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getUnidadeNome());

    $u = $this->createMock(Atendente::class);
    $u->method('setUnidadeNome')->willReturn('');
    $this->assertEquals('',$u->setUnidadeNome('dsadadsa'));
  }

  public function testAtendenteLogradouro()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getLogradouro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getLogradouro());

    $u = $this->createMock(Atendente::class);
    $u->method('setLogradouro')->willReturn('');
    $this->assertEquals('',$u->setLogradouro('dsadsadsadsadsa'));
  }

  public function testAtendenteBairro()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getBairro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getBairro());

    $u = $this->createMock(Atendente::class);
    $u->method('setBairro')->willReturn('');
    $this->assertEquals('',$u->setBairro('dsadsadsa'));
  }

  public function testAtendenteCep()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getCep')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCep());

    $u = $this->createMock(Atendente::class);
    $u->method('setCep')->willReturn('');
    $this->assertEquals('',$u->setCep(74000-000));
  }

  public function testAtendenteCidade()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getCidade')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCidade());

    $u = $this->createMock(Atendente::class);
    $u->method('setCidade')->willReturn('');
    $this->assertEquals('',$u->setCidade('Goiânia'));
  }

  public function testAtendenteUf()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getUf')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getUf());

    $u = $this->createMock(Atendente::class);
    $u->method('setUf')->willReturn('');
    $this->assertEquals('',$u->setUf('GO'));
  }

  public function testAtendenteComplemento()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getComplemento')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getComplemento());

    $u = $this->createMock(Atendente::class);
    $u->method('setComplemento')->willReturn('');
    $this->assertEquals('',$u->setComplemento('dsadsadsa'));
  }

  public function testAtendenteTelefone()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getTelefone')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getTelefone());

    $u = $this->createMock(Atendente::class);
    $u->method('setTelefone')->willReturn('');
    $this->assertEquals('',$u->setTelefone('(66)99998-9999'));
  }

  public function testAtendenteEmail()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getEmail')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getEmail());

    $u = $this->createMock(Atendente::class);
    $u->method('setEmail')->willReturn('');
    $this->assertEquals('',$u->setEmail('test@test.com.br'));
  }

  public function testAtendenteDataCadastro()
  {
    $u = $this->createMock(Atendente::class);
    $u->method('getDataCadastro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getDataCadastro());

    $u = $this->createMock(Atendente::class);
    $u->method('setDataCadastro')->willReturn('');
    $this->assertEquals('',$u->setDataCadastro('17/10/2017'));
  }

}

 ?>
