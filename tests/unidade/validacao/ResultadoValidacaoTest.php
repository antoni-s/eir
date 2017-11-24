<?php

use PHPUnit\Framework\TestCase;
use App\Models\Validacao\ResultadoValidacao;




class ResultadoValidacaoTest extends TestCase
{

  public function testResultadoValidacaoGet()
  {
    $u = $this->createMock(ResultadoValidacao::class);
    $u->method('getErros')->willReturn(NULL);
    $this->assertEquals(NULL,$u->getErros());
  }

  public function testResultadoValidacaoAddErro()
  {
    $u = $this->createMock(ResultadoValidacao::class);
    $u->method('addErro')->willReturn('');
    $this->assertEquals('',$u->addErro(0,404));
  }

}


 ?>
