package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-Voltar {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-Voltar() throws Exception {
		selenium.open("/unidade");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "Teste4");
		selenium.type("name=idu", "Teste4");
		selenium.type("name=horaAbertura", "5");
		selenium.type("name=horaFechamento", "6");
		selenium.type("name=logradouro", "Teste4");
		selenium.type("name=bairro", "Teste4");
		selenium.type("name=complemento", "Teste4");
		selenium.type("name=cidade", "Teste4");
		selenium.select("name=uf", "label=PI");
		selenium.click("link=Voltar");
		selenium.waitForPageToLoad("30000");
		assertEquals("Toggle navigation EIR \n Home Lista de Unidades Cadastro de Unidade Lista de Atendentes Cadastro de Atendente \n \n Adicionar \n Buscar \n \n \n \n \n Nome IDU Horário de Funcionamento Endereço Data Cadastro Drogaria S�o Jos� 122121 09:02:00 - 16:08:00 456, Itapo�, Vazio, 74940510, 4503, GO 15/10/2017 Editar Excluir 3 3333333333333 00:00:00 - 00:05:56 333333333333333333333, 33333333333333, 44, 44444444, 4444444, RJ 15/10/2017 Editar Excluir teste 0 09:00:00 - 17:00:00 teste, teste, teste, 00000000, teste, AC 15/10/2017 Editar Excluir teste 55543 00:00:33 - 00:00:55 re, er, 423, 25555555, FA, AC 15/10/2017 Editar Excluir \n « Anterior 1 de 1Próxima »\n\n \n \n \n Rodapé :)", selenium.getText("css=body"));
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
