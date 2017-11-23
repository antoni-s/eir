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
                         ->setMethods(['setId'])
                         ->getMock();

    $u->expects($this->once())
                 ->method('setId')
                 ->with($this->equalTo('123'));

  }

}


 ?>
