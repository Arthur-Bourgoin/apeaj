<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\{
    ExportExcel,
    Feedback
};
use App\Controllers\SAdminController;

final class TestDeleteTraining extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new SAdminController(null);
        $_SESSION["role"]="super-admin";
        $_FILES = ["picture" => []];
        DataBase::getInstance()->exec("INSERT INTO Training (idTraining, wording, description, qualifLevel)
        VALUES (5, 'UnTestQuiTest', 'azertyuiop qsdfghjklm wxcvbn', 'CAP')");

    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Training WHERE idTraining = 5");
        $_POST = [];
    }


    public function testSuccess() {
        $_POST= [
            "idTraining" => "5", 
        ];
        $this->controller->delete_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $this->assertEquals(0, $res->rowCount());

    }

    public function testInvalidParams(){
        $_POST= [
            "idTrainingggg" => "5", 
           
        ];
        $this->controller->delete_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $this->assertEquals(1, $res->rowCount());

    }

    public function testTrainingNotExist(){
        $_POST= [] ;
        $this->controller->delete_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $this->assertEquals(0, $res->rowCount());
    }

    
    

}
?>