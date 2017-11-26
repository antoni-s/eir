package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class UCPesquisarAtendenteBuscaComExito {
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
  public void testUCPesquisarAtendenteBuscaComExito() throws Exception {
    driver.get(baseUrl + "/");
    driver.findElement(By.linkText("EIR")).click();
    driver.findElement(By.linkText("Lista de Atendentes")).click();
    driver.findElement(By.name("buscaAtendente")).clear();
    driver.findElement(By.name("buscaAtendente")).sendKeys("a");
    driver.findElement(By.xpath("//button[@type='submit']")).click();
    try {
      assertEquals("Nome CPF Matricula Unidade Endereço Data Cadastro Funcionario Adam 829212120 283283828383 31 Rua X , Qd. 22 Lt.04 - Cidade Sluns, Sluns, 000, 75493123, Goiânia, GO 26/11/2017 Editar Excluir Funcionario Adam 4567890 987656789 31 rua 44 Lt. 33, Setor Lunis, qd. 77 lt.94, 34543534, Goiânia, GO 26/11/2017 Editar Excluir Loncas 0 39393 31 999999999999999999, 23e23, 2323, 24323423, 23452345, AC 26/11/2017 Editar Excluir \n « Anterior 1 de 1Próxima »", driver.findElement(By.cssSelector("div.col-md-12.col-lg-12")).getText());
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
