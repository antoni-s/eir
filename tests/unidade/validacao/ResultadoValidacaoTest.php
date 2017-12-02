<?php

use PHPUnit\Framework\TestCase;
use App\Models\Validacao\ResultadoValidacao;




class ResultadoValidacaoTest extends TestCase
{
  private $resultadoValidacao;

	public function __construct()
	{
			$this->resultadoValidacao = new ResultadoValidacao();
			parent::__construct();
	}

	public function testInstanceResultadoValidacao()
	{
			$this->resultadoValidacao = new ResultadoValidacao();
			$this->assertInstanceOf(ResultadoValidacao::class, $this->resultadoValidacao);
	}


/*
  public function testResultadoValidacaoGet()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$resul = $this->resultadoValidacao->getErros();
		$this->assertEquals($resul, NULL);
  }
  */


  public function testResultadoValidacaoAddErro()
  {
    fwrite(STDOUT, __METHOD__ . "\n");
		$this->resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
  }

}


 ?>
