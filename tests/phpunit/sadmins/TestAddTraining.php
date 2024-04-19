<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\UploadImg;
use App\Controllers\SAdminController;

final class TestAddTraining extends TestCase {

    private $controller;
    private $uploadMock;
    
    public function setUp(): void {
        $_SESSION["role"] = "super-admin";
        $_SESSION["training"] = "1";
        $_SESSION["id"] = 17;
        $this->uploadMock = $this->createMock(UploadImg::class);
        $this->uploadMock->method('upload')->willReturn(true);
        $this->controller = new SAdminController($this->uploadMock);
        $_FILES = ["picture" => ["name" => "leNom"]];
        define('PHPUNIT_RUNNING', true);
    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Training WHERE wording = 'UnTestQuiTest' AND description = 'azertyuiop qsdfghjklm wxcvbn' AND qualifLevel = 'CAP'");
        $_POST = [];
        define('PHPUNIT_RUNNING', false);
    }

    public function testSuccess() {
        $_POST= [
            "wording"  => "UnTestQuiTest", 
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "qualifLevel"  => "CAP"  
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE wording = 'UnTestQuiTest' AND description = 'azertyuiop qsdfghjklm wxcvbn' AND qualifLevel = 'CAP'");
        $this->assertEquals(1, $res->rowCount());
    }

    public function testInvalidParams(){
        $_POST= [
            "wordingDFGH"  => "UnTestQuiTest", 
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "qualifLevel"  => "CAP"
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE wording = 'UnTestQuiTest' AND description = 'azertyuiop qsdfghjklm wxcvbn' AND qualifLevel = 'CAP'");
        $this->assertEquals(0, $res->rowCount());
    }

    public function testAddTrainingRoleAdmin(){
        $_SESSION["role"] = "educator";
        $_POST= [
            "wording"  => "UnTestQuiTest", 
            "description"  => "azertyuiop qsdfghjklm wxcvbn", 
            "qualifLevel"  => "CAP"
        ];
        $this->expectException(\Exception::class);
        $this->controller = new SAdminController(null);
    }
    
    

}
?>