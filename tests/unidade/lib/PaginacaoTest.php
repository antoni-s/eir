<?php

use PHPUnit\Framework\TestCase;
use App\Lib\Paginacao;




class PaginacaoTest extends TestCase
{

	public function __construct()
	{
			parent::__construct();
	}

    public function testCriacaoDeString()
    {
        $query = Paginacao::criandoQuerystring("hello", "world");

        $this->assertEquals("?paginaSelecionada=hello&buscaUnidade=world", $query);
    }



}


 ?>
