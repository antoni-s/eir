package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class UCCriarAtendenteUnidadeVazio {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://mfs-eir.herokuapp.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testUCCriarAtendenteUnidadeVazio() throws Exception {
    driver.get(baseUrl + "/");
    driver.findElement(By.linkText("EIR")).click();
    driver.findElement(By.linkText("Cadastro de Atendente")).click();
    driver.findElement(By.name("nome")).clear();
    driver.findElement(By.name("nome")).sendKeys("Funcionario Adam");
    driver.findElement(By.name("cpf")).clear();
    driver.findElement(By.name("cpf")).sendKeys("4456789");
    driver.findElement(By.name("matricula")).clear();
    driver.findElement(By.name("matricula")).sendKeys("45678987");
    driver.findElement(By.name("telefone")).clear();
    driver.findElement(By.name("telefone")).sendKeys("98764588");
    driver.findElement(By.name("email")).clear();
    driver.findElement(By.name("email")).sendKeys("enbvuo@hotmail.com");
    driver.findElement(By.name("logradouro")).clear();
    driver.findElement(By.name("logradouro")).sendKeys("rua 44");
    driver.findElement(By.name("bairro")).clear();
    driver.findElement(By.name("bairro")).sendKeys("jd. b");
    driver.findElement(By.name("complemento")).clear();
    driver.findElement(By.name("complemento")).sendKeys("qd. 77 lt.99");
    driver.findElement(By.name("cidade")).clear();
    driver.findElement(By.name("cidade")).sendKeys("alINS");
    new Select(driver.findElement(By.name("uf"))).selectByVisibleText("PI");
    driver.findElement(By.xpath("//button[@type='submit']")).click();
    try {
      assertEquals("Selecione uma unidade", driver.findElement(By.id("unidade-error")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
