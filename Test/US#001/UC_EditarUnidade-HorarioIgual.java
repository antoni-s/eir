package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class UCEditarUnidadeHorarioIgual {
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
  public void testUCEditarUnidadeHorarioIgual() throws Exception {
    driver.get(baseUrl + "/");
    driver.findElement(By.linkText("EIR")).click();
    driver.findElement(By.linkText("Lista de Unidades")).click();
    driver.findElement(By.xpath("(//a[contains(text(),'Editar')])[4]")).click();
    driver.findElement(By.id("horaAbertura")).clear();
    driver.findElement(By.id("horaAbertura")).sendKeys("2222");
    driver.findElement(By.id("horaFechamento")).clear();
    driver.findElement(By.id("horaFechamento")).sendKeys("2222");
    driver.findElement(By.xpath("//button[@type='submit']")).click();
    try {
      assertEquals("Horário de Fechamento menor que o Horário de Abertura", driver.findElement(By.id("horaFechamento-error")).getText());
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
