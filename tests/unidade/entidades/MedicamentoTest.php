<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Medicamento;

/**
 *
 */
class MedicamentoTest extends TestCase
{
  private $medicamento;

	public function __construct()
	{
			$this->medicamento = new Medicamento();
			parent::__construct();
	}

	public function testInstanceAtendente()
	{
			$this->medicamento = new Medicamento();
			$this->assertInstanceOf(Medicamento::class, $this->medicamento);
	}

  public function testMedicamentoId( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setId(1234);
		$med = $this->medicamento->getId();
		$this->assertEquals($med, 1234);
  }

  public function testMedicamentoNome( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setNome('dsadsadsa');
		$med = $this->medicamento->getNome();
		$this->assertEquals($med, 'dsadsadsa');
  }

  public function testMedicamentoCodigo( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setCodigo('123456789');
		$med = $this->medicamento->getCodigo();
		$this->assertEquals($med, '123456789');
  }

  public function testMedicamentoComposicao( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setComposicao('dsadsadsa');
		$med = $this->medicamento->getComposicao();
		$this->assertEquals($med, 'dsadsadsa');
  }

  public function testMedicamentoTipo( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setTipo('dsadsadsa');
		$med = $this->medicamento->getTipo();
		$this->assertEquals($med, 'dsadsadsa');
  }

  public function testMedicamentoDose( )
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setDose('dsa');
		$med = $this->medicamento->getDose();
		$this->assertEquals($med, 'dsa');
  }

	public function testMedicamentoInformacoes( )
	{
		fwrite(STDOUT, __METHOD__ . "\n");
		$this->medicamento->setInformacoes('dssdd');
		$med = $this->medicamento->getInformacoes();
		$this->assertEquals($med, 'dssdd');
	}

}


 ?>
