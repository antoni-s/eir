package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-NomeVazio {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-NomeVazio() throws Exception {
		selenium.open("/");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=idu", "32332");
		selenium.type("name=horaAbertura", "4");
		selenium.type("name=horaFechamento", "5");
		selenium.type("name=logradouro", "teste14");
		selenium.type("name=bairro", "teste32");
		selenium.type("name=complemento", "teste124");
		selenium.type("name=cidade", "teste");
		selenium.click("//button[@type='submit']");
		assertEquals("Este campo não pode ser vazio", selenium.getText("id=nome-error"));
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
