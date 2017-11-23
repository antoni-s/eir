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

  }

}


 ?>
