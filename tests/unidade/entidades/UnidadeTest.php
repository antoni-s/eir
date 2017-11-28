<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Unidade;

//include_once __DIR__.'/../../../App/Models/Entidades/Unidade.php';

/**
 *
 */

class UnidadeTest extends TestCase
{

  private $unidade;

	public function __construct()
	{
			$this->unidade = new Unidade();
			parent::__construct();
	}

	public function testInstanceAtendente()
	{
			$this->unidade = new Unidade();
			$this->assertInstanceOf(Unidade::class, $this->unidade);
	}

  public function testUnidadeId( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setId(123);
		$uni = $this->unidade->getId();
		$this->assertEquals($uni, 123);
  }

  public function testUnidadeNome()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setNome('dsadsadsa');
		$uni = $this->unidade->getNome();
		$this->assertEquals($uni, 'dsadsadsa');
  }

  public function testUnidadeIdu()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setIdu('123');
		$uni = $this->unidade->getIdu();
		$this->assertEquals($uni, '123');
  }

  public function testUnidadeLogradouro()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setLogradouro('dsadsadsadsadsa');
		$uni = $this->unidade->getLogradouro();
		$this->assertEquals($uni, 'dsadsadsadsadsa');
  }

  public function testUnidadeBairro()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setBairro('dsadsadsa');
		$uni = $this->unidade->getBairro();
		$this->assertEquals($uni, 'dsadsadsa');
  }

  public function testUnidadeCep()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setCep('74000-000');
		$uni = $this->unidade->getCep();
		$this->assertEquals($uni, '74000-000');
  }

  public function testUnidadeCidade()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setCidade('Goiania');
		$uni = $this->unidade->getCidade();
		$this->assertEquals($uni, 'Goiania');
  }

  public function testUnidadeUf()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setUf('GO');
		$uni = $this->unidade->getUf();
		$this->assertEquals($uni, 'GO');
  }

  public function testUnidadeComplemento()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setComplemento('dsadsadsa');
		$uni = $this->unidade->getComplemento();
		$this->assertEquals($uni, 'dsadsadsa');
  }

  public function testUnidadeHoraAbertura()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setHoraAbertura('10:00');
		$uni = $this->unidade->getHoraAbertura();
		$this->assertEquals($uni, '10:00');
  }

  public function testUnidadeHoraFechamento()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->unidade->setHoraFechamento('17:00');
		$uni = $this->unidade->getHoraFechamento();
		$this->assertEquals($uni, '17:00');
  }

  public function testUnidadeDataCadastro()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getDataCadastro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getDataCadastro());

    $u = $this->createMock(Unidade::class);
    $u->method('setDataCadastro')->willReturn('');
    $this->assertEquals('',$u->setDataCadastro('17/10/2017'));
  }

}

 ?>
