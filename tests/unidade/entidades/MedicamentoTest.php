<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Medicamento;

/**
 *
 */
class MedicamentoTest extends TestCase
{
  public function testMedicamentoId( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getId')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getId());
  }

}


 ?>
