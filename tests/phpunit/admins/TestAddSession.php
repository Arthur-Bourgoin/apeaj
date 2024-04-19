<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\Feedback;
use App\Controllers\AdminController;

final class TestAddSession extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new AdminController(null);
        $_SESSION["role"] !== "student";
        $_FILES = ["picture" => []];
        

    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Session WHERE idSession= '1500'");
        $_POST = [];
    }

    public function testSuccess(){
        $_POST= [
            "idSession" => "1500", 
            "wording"  => "Wording session",
            "theme" => "Serrurerie",
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "idTraining" => "1"
  
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(1,$res->rowCount());
    }

    public function testInvalidParamsUsers(){
        $_POST= [
            "idSessiondfsfd" => "1500", //error here
            "wording"  => "Wording session",
            "theme" => "Serrurerie",
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "idTraining" => "1"
  
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(0,$res->rowCount());
    }

    public function testRoleUser(){
        $_SESSION["role"] === "student"; //error here
        $_POST= [
            "idSessiond" => "1500", 
            "wording"  => "Wording session",
            "theme" => "Serrurerie",
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "idTraining" => "1"
  
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(0,$res->rowCount());

    }

    public function testAddTrainingExist(){
        DataBase::getInstance()->exec("INSERT INTO Session (idSession, wording, theme, description, timeBegin, timeend, idTraining)
        VALUES (1500, 'Wording session', 'Serrurerie', 'azertyuiop qsdfghjklm wxcvbn', '2023-10-28T08:00', '2023-10-30T09:30', 1)");
        $_POST= [
            "idSession" => "1500", //error here
            "wording"  => "Wording session",
            "theme" => "Serrurerie",
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "timeBegin" => "2023-10-28T08:00",
            "timeend" => "2023-10-30T09:30",
            "idTraining" => "10000"
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(1,$res->rowCount())
    }

}
?>