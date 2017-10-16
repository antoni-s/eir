package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-HrFechamentoMaiorHrAbertura {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-HrFechamentoMaiorHrAbertura() throws Exception {
		selenium.open("/unidade");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "teste2");
		selenium.type("name=idu", "teste2");
		selenium.type("name=horaAbertura", "5");
		selenium.type("name=horaFechamento", "2");
		selenium.type("name=logradouro", "teste2");
		selenium.type("name=bairro", "teste2");
		selenium.type("name=complemento", "teste2");
		selenium.type("name=cidade", "teste2");
		selenium.click("//button[@type='submit']");
		assertEquals("Horário de Fechamento menor que o Horário de Abertura", selenium.getText("id=horaFechamento-error"));
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
