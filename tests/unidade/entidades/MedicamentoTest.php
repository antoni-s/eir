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

    $m = $this->createMock(Medicamento::class);
    $m->method('setId')->willReturn('');
    $this->assertEquals('', $m->setId(1234));
  }

  public function testMedicamentoNome( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getNome')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getNome());

    $m = $this->createMock(Medicamento::class);
    $m->method('setNome')->willReturn('');
    $this->assertEquals('', $m->setNome('dsadsadsa'));
  }

  public function testMedicamentoCodigoBarras( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getCodigoBarras')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getCodigoBarras());

    $m = $this->createMock(Medicamento::class);
    $m->method('setCodigoBarras')->willReturn('');
    $this->assertEquals('', $m->setCodigoBarras(123456789));
  }

  public function testMedicamentoComposicao( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getComposicao')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getComposicao());

    $m = $this->createMock(Medicamento::class);
    $m->method('setComposicao')->willReturn('');
    $this->assertEquals('', $m->setComposicao("dsadsadsa"));
  }

  public function testMedicamentoTipo( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getTipo')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getTipo());

    $m = $this->createMock(Medicamento::class);
    $m->method('setTipo')->willReturn('');
    $this->assertEquals('', $m->setTipo('ewqewqewqewqewq'));
  }

  public function testMedicamentoDose( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getDose')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getDose());

    $m = $this->createMock(Medicamento::class);
    $m->method('setDose')->willReturn('');
    $this->assertEquals('', $m->setDose('1/8 hrs'));
  }

  public function testMedicamentoDataAtualizacao( )
  {
    $m = $this->createMock(Medicamento::class);
    $m->method('getDataAtualizacao')->willReturn(NULL);
    $this->assertEquals(NULL, $m->getDataAtualizacao());

    $m = $this->createMock(Medicamento::class);
    $m->method('setDataAtualizacao')->willReturn('');
    $this->assertEquals('', $m->setDataAtualizacao('14/03/2016'));
  }

}


 ?>
