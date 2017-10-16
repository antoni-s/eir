package com.example.tests;

import com.thoughtworks.selenium.*;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;
import java.util.regex.Pattern;

public class UC_CriarUser-CPFVazio {
	private Selenium selenium;

	@Before
	public void setUp() throws Exception {
		selenium = new DefaultSelenium("localhost", 4444, "*chrome", "http://mfs-eir.herokuapp.com/");
		selenium.start();
	}

	@Test
	public void testUC_CriarUser-CPFVazio() throws Exception {
		selenium.open("/unidade/cadastro");
		selenium.click("link=Lista de Unidades");
		selenium.waitForPageToLoad("30000");
		selenium.click("link=Adicionar");
		selenium.waitForPageToLoad("30000");
		selenium.type("name=nome", "abcd");
		selenium.type("name=idu", "abcd");
		selenium.type("name=horaAbertura", "3");
		selenium.type("name=horaFechamento", "4");
		selenium.type("name=logradouro", "abcd");
		selenium.type("name=bairro", "abcd");
		selenium.type("name=complemento", "abcd");
		selenium.type("name=cidade", "abcd");
		assertEquals("AC AL AM AP BA CE DF ES GO MG MG MS MT PA PB PE PI PR RJ RN RO RR RS SC SE SP TO", selenium.getText("name=uf"));
		assertEquals("", selenium.getText("name=cep"));
		assertEquals("Este campo não pode ser vazio", selenium.getText("id=cep-error"));
		selenium.click("//button[@type='submit']");
	}

	@After
	public void tearDown() throws Exception {
		selenium.stop();
	}
}
