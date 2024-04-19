# Generated by Selenium IDE
import pytest
import time
import json
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.common.exceptions import NoSuchElementException


script_ajout = """
<script>
    var redDiv = document.createElement('div');
    redDiv.classList.add('red-div');
    document.body.appendChild(redDiv);
</script>
"""

class TestInjectmodifcomStudent():
  def setup_method(self, method):
    self.driver = webdriver.Chrome()
    self.vars = {}
    self.driver.implicitly_wait(2)

  
  def teardown_method(self, method):
    self.driver.quit()
  
  def test_injectmodifcomStudent(self):
    self.driver.get("https://apeaj.alwaysdata.net/choix-formation")
    self.driver.set_window_size(517, 816)
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(1) > .divTraining").click()
    element = self.driver.find_element(By.ID, "btn-admin")
    actions = ActionChains(self.driver)
    actions.move_to_element(element).perform()
    self.driver.find_element(By.ID, "btn-admin").click()
    element = self.driver.find_element(By.CSS_SELECTOR, "body")
    actions = ActionChains(self.driver)
    actions.move_to_element(element).perform()
    self.driver.find_element(By.ID, "loginAdmin").click()
    self.driver.find_element(By.ID, "loginAdmin").send_keys("daniel.lucroy")
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div:nth-child(4) > .btn-number:nth-child(2)").click()
    self.driver.find_element(By.CSS_SELECTOR, ".row:nth-child(2) > div > .btn-success").click()
    self.driver.find_element(By.ID, "eleves-tab").click()
    self.driver.find_element(By.CSS_SELECTOR, ".col-lg-3:nth-child(1) .btn:nth-child(1) > .bi").click()
    element = self.driver.find_element(By.CSS_SELECTOR, ".px-2 > .bi-pencil")
    actions = ActionChains(self.driver)
    actions.move_to_element(element).perform()
    self.driver.find_element(By.CSS_SELECTOR, ".px-2 > .bi-pencil").click()
    element = self.driver.find_element(By.CSS_SELECTOR, "body")
    actions = ActionChains(self.driver)
    actions.move_to_element(element).perform()
    self.driver.find_element(By.ID, "formText").click()
    self.driver.find_element(By.ID, "ModalUpdateComs").click()
    self.driver.find_element(By.ID, "formText").send_keys(script_ajout)
    self.driver.find_element(By.CSS_SELECTOR, "#ModalUpdateComs .modal-body").click()
    self.driver.find_element(By.CSS_SELECTOR, "#ModalUpdateComs .btn-success").click()

    
    # Vérifier si la div red-div est présente
    div_presente = self.est_div_red_presente()
    # Si la div est présente, le test échoue
    assert not div_presente, "La div red-div a été créée après l'injection du script"


  def est_div_red_presente(self):
      try:
          self.driver.find_element(By.CSS_SELECTOR, ".red-div")
          return True
      except NoSuchElementException:
          return False