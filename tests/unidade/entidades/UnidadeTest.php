<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Unidade;

//include_once __DIR__.'/../../../App/Models/Entidades/Unidade.php';

/**
 * Testes para a classe Unidades / Entidades.
 */

class UnidadeTest extends TestCase
{


  public function testUnidadeId( )
  {
    $u = $this->createMock(Unidade::class);

    $u->method('getId')->willReturn(NULL);

    $this->assertEquals(NULL, $u->getId());

    $u = $this->createMock(Unidade::class);
    $u->method('setId')->willReturn('');
    $this->assertEquals('',$u->setId(123));

  }

  public function testUnidadeNome()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getNome')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getNome());

    $u = $this->createMock(Unidade::class);
    $u->method('setNome')->willReturn('');
    $this->assertEquals('',$u->setNome('dsadsadsa'));
  }

  public function testUnidadeIdu()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getIdu')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getIdu());

    $u = $this->createMock(Unidade::class);
    $u->method('setIdu')->willReturn('');
    $this->assertEquals('',$u->setIdu(123));
  }

  public function testUnidadeLogradouro()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getLogradouro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getLogradouro());

    $u = $this->createMock(Unidade::class);
    $u->method('setLogradouro')->willReturn('');
    $this->assertEquals('',$u->setLogradouro('dsadsadsadsadsa'));
  }

  public function testUnidadeBairro()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getBairro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getBairro());

    $u = $this->createMock(Unidade::class);
    $u->method('setBairro')->willReturn('');
    $this->assertEquals('',$u->setBairro('dsadsadsa'));
  }

  public function testUnidadeCep()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getCep')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCep());

    $u = $this->createMock(Unidade::class);
    $u->method('setCep')->willReturn('');
    $this->assertEquals('',$u->setCep(74000-000));
  }

  public function testUnidadeCidade()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getCidade')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCidade());

    $u = $this->createMock(Unidade::class);
    $u->method('setCidade')->willReturn('');
    $this->assertEquals('',$u->setCidade('Goiânia'));
  }

  public function testUnidadeUf()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getUf')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getUf());

    $u = $this->createMock(Unidade::class);
    $u->method('setUf')->willReturn('');
    $this->assertEquals('',$u->setUf('GO'));
  }

  public function testUnidadeComplemento()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getComplemento')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getComplemento());

    $u = $this->createMock(Unidade::class);
    $u->method('setComplemento')->willReturn('');
    $this->assertEquals('',$u->setComplemento('dsadsadsa'));
  }

  public function testUnidadeHoraAbertura()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getHoraAbertura')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getHoraAbertura());

    $u = $this->createMock(Unidade::class);
    $u->method('setHoraAbertura')->willReturn('');
    $this->assertEquals('',$u->setHoraAbertura('10:00'));
  }

  public function testUnidadeHoraFechamento()
  {
    $u = $this->createMock(Unidade::class);
    $u->method('getHoraFechamento')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getHoraFechamento());

    $u = $this->createMock(Unidade::class);
    $u->method('setHoraFechamento')->willReturn('');
    $this->assertEquals('',$u->setHoraFechamento('17:00'));
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
