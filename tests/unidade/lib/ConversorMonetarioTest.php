<?php

use PHPUnit\Framework\TestCase;
use App\Lib\ConversorMonetario;




class ConversorMonetarioTest extends TestCase
{
  private $conversorMonetario;

	public function __construct()
	{
			$this->conversorMonetario = new ConversorMonetario();
			parent::__construct();
	}

	public function testInstanceConversorMonetario()
	{
			$this->conversorMonetario = new ConversorMonetario();
			$this->assertInstanceOf(ConversorMonetario::class, $this->conversorMonetario);
	}

    public function testConversaoDeDolarParaReal()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $precoEmDolar = 10984.23;
        $this->assertEquals("10.984,23", ConversorMonetario::dolarParaReal($precoEmDolar));
    }

    public function testConversaoDeRealParaDolar()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $precoEmReal = "1.932,25";
        $this->assertEquals("1932.25", ConversorMonetario::realParaDolar($precoEmReal));
    }

}


 ?>
