<?php

use PHPUnit\Framework\TestCase;

include_once __DIR__.'/../../../App/Models/Entidades/Unidade.php';

/**
 * Testes para a classe Unidades / Entidades.
 */

class UnidadeTest extends TestCase
{


  public function testUnidadeId( )
  {
    $u = $this->getMockBuilder(Unidade::class)
         ->setId('123')
         ->getMock();
    //$u->setId("123");
    //$this->assertEquals('123', $u->getId());

  }

  public function testUnidadeName()
  {
    $u = $this->getMockBuilder(Unidade::class)
         ->setNome('dsadsadsa')
         ->getMock();
    //$u->setUnidade("aaa");
    //$this->assertEquals("aaa", $u->getNome());
  }

}


 ?>
