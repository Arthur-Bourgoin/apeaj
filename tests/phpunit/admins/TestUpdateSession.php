<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\Feedback;
use App\Controllers\AdminController;

final class TestUpdateSession extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new AdminController(null);
        $_SESSION["role"] !== "student";
        $_FILES = ["picture" => []];
        DataBase::getInstance()->exec("INSERT INTO Session (idSession, wording, theme, description, timeBegin, timeend, idTraining)
        VALUES (1500, 'Wording session', 'Serrurerie', 'azertyuiop qsdfghjklm wxcvbn', '2023-10-28T08:00', '2023-10-30T09:30', 1)");
        

    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Session WHERE idSession= '1500'");
        $_POST = [];
    }

    public function testSuccess(){
        $_POST= [
            "idSession" => "1500", 
            "wording"  => "Wording d'une session", //modif here
            "theme" => "Serrurerie avancé",  //modif here
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00", 
            "timeend" => "2023-10-30T09:30",
            "idTraining" => "1"
  
        ];
        $this->controller->update_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $session = $res->fetch();
        $this->assertEquals("Wording d'une session",$session->wording);
        $this->assertEquals("Serrurerie avancé",$session->theme);

    }

    public function testInvalidParamsUsers(){
        $_POST= [
            "idSessiondfsfd" => "1500", 
            "wordinghgfd"  => "Wording session", //error here
            "theme" => "Serrurerie avancé", //modif here
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "timeend" => "2023-10-30T09:30",
            "idTraining" => "1"
  
        ];
        $this->controller->update_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $session = $res->fetch();
        $this->assertEquals("Serrurerie",$session->theme);
    }

    public function testRoleUser(){
        $_SESSION["role"] === "student"; //error here
        $_POST= [
            "idSessiond" => "1500", 
            "wording"  => "Wording d'une session", //modif here
            "theme" => "Serrurerie avancé", //modif here
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "timeend" => "2023-10-30T09:30",
            "idTraining" => "1"
  
        ];
        $this->controller->update_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $session = $res->fetch();
        $this->assertEquals("Wording session",$session->wording);
        $this->assertEquals("Serrurerie",$session->theme);

    }



    public function testAddTrainingExist(){
        Database::getInstance()->exec("DELETE FROM Session WHERE idSession= '1500'");

        $_POST= [
            "idSession" => "1500", //error here
            "wording"  => "Wording session",
            "theme" => "Serrurerie",
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "timeend" => "2023-10-30T09:30",
            "idTraining" => "10000"
        ];
        $this->controller->update_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(0,$res->rowCount())
    }
    

}
?>