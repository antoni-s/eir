package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class UCExcluirAtendenteVoltar {
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
  public void testUCExcluirAtendenteVoltar() throws Exception {
    driver.get(baseUrl + "/atendente/");
    driver.findElement(By.linkText("EIR")).click();
    driver.findElement(By.linkText("Lista de Atendentes")).click();
    driver.findElement(By.xpath("//tr[3]/td[7]/a[2]/span")).click();
    driver.findElement(By.linkText("Voltar")).click();
    try {
      assertEquals("Toggle navigation EIR \n Home Lista de Unidades Cadastro de Unidade Lista de Atendentes Cadastro de Atendente Lista de Usuários Cadastro de Usuário \n \n Adicionar \n Buscar \n \n \n \n \n Nome CPF Matricula Unidade Endereço Data Cadastro Jo 3334567 56456465 31 Rua J, Itapo�, 656565, 74940510, Aparecida de Goi�nia, GO 15/10/2017 Editar Excluir Funcionario Adam 829212120 283283828383 31 Rua X , Qd. 22 Lt.04 - Cidade Sluns, Sluns, 000, 75493123, Goiânia, GO 26/11/2017 Editar Excluir Funcionario Adam 4567890 987656789 31 rua 44 Lt. 33, Setor Lunis, qd. 77 lt.94, 34543534, Goiânia, GO 26/11/2017 Editar Excluir loni 4567888 98765456789 31 rua 44, dfghjkl, lingh, 45678976, e4567896544, PI 26/11/2017 Editar Excluir loni 78907890 4567890 31 56789, 567890, 56789, 56789087, 67u8i90, AC 26/11/2017 Editar Excluir Loncas 0 39393 31 999999999999999999, 23e23, 2323, 24323423, 23452345, AC 26/11/2017 Editar Excluir \n « Anterior 1 de 1Próxima »\n\n \n \n \n Rodapé :)", driver.findElement(By.cssSelector("body")).getText());
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
