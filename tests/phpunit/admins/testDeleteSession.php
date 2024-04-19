<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\UploadImg;
use App\Controllers\AdminController;

final class TestDeleteSession extends TestCase {

    private $controller;
    private $uploadMock;


    public function setUp(): void {
        $_SESSION["role"] = "educator-admin";
        $_SESSION["training"] = "1";
        $_SESSION["id"] = 17;
        $this->uploadMock = $this->createMock(UploadImg::class);
        $this->uploadMock->method('upload')->willReturn(true);
        $this->controller = new AdminController($this->uploadMock);
        define('PHPUNIT_RUNNING', true);
        DataBase::getInstance()->exec("INSERT INTO Session (idSession, wording, theme, description, timeBegin, timeend, idTraining)
        VALUES (1500, 'Wording session', 'Serrurerie', 'azertyuiop qsdfghjklm wxcvbn', '2023-10-28T08:00', null, 1)");


    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Session WHERE idSession= 1500");
        $_POST = [];
        define('PHPUNIT_RUNNING', false);

    }

    public function testSuccess(){
        $_POST= [
            "idSession" => "1500",   
        ];
        $this->controller->delete_Session();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = 1500");
        $this->assertEquals(0,$res->rowCount());
    }

    public function testRoleUser(){
        $_SESSION["role"] === "student"; //error here
        $_POST= [
            "idSession" => "1500", 
        ];
        $this->expectException(\Exception::class);
        $this->controller = new SAdminController(null);

    }

    public function testIdSessionNotExist(){
        $_POST= [
            "idSession" => "1500", 
        ];
        $this->controller->delete_Session();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(0,$res->rowCount());

    }

   

}
?>