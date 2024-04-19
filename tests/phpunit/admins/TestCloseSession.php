<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\Feedback;
use App\Controllers\AdminController;

final class TestCloseSession extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new AdminController(null);
        $_SESSION["role"] !== "student";
        $_FILES = ["picture" => []];
        DataBase::getInstance()->exec("INSERT INTO Session (idSession, wording, theme, description, timeBegin, timeend, idTraining)
        VALUES (1500, 'Wording session', 'Serrurerie', 'azertyuiop qsdfghjklm wxcvbn', '2023-10-28T08:00', null, 1)");

    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Session WHERE idSession= '1500'");
        $_POST = [];
    }

    public function testSuccess(){
        $_POST= [
            "timeend" => "2023-10-30T09:30", 
  
        ];
        $this->controller->closeSession();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'
        AND timeend = '2023-10-30T09:30' ");
        $this->assertEquals(1,$res->rowCount());
    }

    public function testRoleUser(){
        $_SESSION["role"] === "student"; //error here
        $_POST= [
            "timeend" => "2023-10-30T09:30",
  
        ];
        $this->controller->closeSession();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'
        AND timeend IS NULL");
        $this->assertEquals(1,$res->rowCount());

    }

}
?>