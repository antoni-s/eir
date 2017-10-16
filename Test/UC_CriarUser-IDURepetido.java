package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_IDURepetido {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_IDURepetido() throws Exception {
		selenium.open("/");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "teste");
		selenium.type("name=idu", "teste");
		selenium.type("name=horaAbertura", "09:00");
		selenium.type("name=horaFechamento", "10:00");
		selenium.type("name=logradouro", "teste");
		selenium.type("name=bairro", "teste");
		selenium.type("name=complemento", "teste");
		selenium.type("name=cidade", "teste");
		selenium.select("name=uf", "label=PE");
		selenium.select("name=uf", "label=PA");
		selenium.click("//button[@type='submit']");
		selenium.waitForPageToLoad("30000");
		assertEquals("× Código IDU já existe.", selenium.getText("css=div.alert.alert-warning"));
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
