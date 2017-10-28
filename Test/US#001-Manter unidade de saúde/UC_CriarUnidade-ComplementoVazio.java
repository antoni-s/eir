package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-ComplementoVazio {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-ComplementoVazio() throws Exception {
		selenium.open("/unidade/cadastro");
		selenium.click("link=Home");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "test");
		selenium.type("name=idu", "test");
		selenium.type("name=horaAbertura", "4");
		selenium.type("name=horaFechamento", "5");
		selenium.type("name=logradouro", "test");
		selenium.type("name=bairro", "test");
		selenium.type("name=cidade", "test");
		selenium.select("name=uf", "label=PE");
		selenium.click("//button[@type='submit']");
		assertEquals("Este campo não pode ser vazio", selenium.getText("id=complemento-error"));
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
