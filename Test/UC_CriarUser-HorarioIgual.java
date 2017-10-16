package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-HorarioIgual {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-HorarioIgual() throws Exception {
		selenium.open("/");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "teste1");
		selenium.type("name=idu", "teste1");
		selenium.type("name=horaAbertura", "14");
		selenium.type("name=logradouro", "teste1");
		selenium.type("name=bairro", "teste1");
		selenium.type("name=complemento", "teste1");
		selenium.type("name=cidade", "teste1");
		selenium.select("name=uf", "label=GO");
		selenium.click("//button[@type='submit']");
		selenium.type("name=horaFechamento", "14");
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
