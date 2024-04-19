<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\{
    ExportExcel,
    Feedback
};
use App\Controllers\SAdminController;

final class TestUpdateTraining extends TestCase {

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
            "wording"  => "UnTestQuiTest", 
            "description"  => "nbvcxw mlkjhgfdsq poiuytreza", //modif here
            "qualifLevel"  => "BUT"  //modif here
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $training = $res->fetch();
        $this->assertEquals("nbvcxw mlkjhgfdsq poiuytreza",$training->description);
        $this->assertEquals("BUT",$training->qualifLevel);
    }

    public function testInvalidParams(){
        $_POST= [
            "idTraining" => "5", 
            "wordingDFGH"  => "UnTestQuiTest", //error here
            "description"  => "nbvcxw mlkjhgfdsq poiuytreza", //modif here 
            "qualifLevel"  => "BUT" //modif here 
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $training = $res->fetch();
        $this->assertEquals("azertyuiop qsdfghjklm wxcvbn",$training->description);
        $this->assertEquals("CAP",$training->qualifLevel);
    }

    public function testAddTrainingRoleAdmin(){
        $_SESSION["role"]="educator";
        $_POST= [
            "idTraining" => "5", 
            "wordingDFGH"  => "UnTestQuiTest", 
            "description"  => "nbvcxw mlkjhgfdsq poiuytreza", //modif here 
            "qualifLevel"  => "BUT" //modif here   
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $training = $res->fetch();
        $this->assertEquals("azertyuiop qsdfghjklm wxcvbn",$training->description);
        $this->assertEquals("CAP",$training->qualifLevel);
    }

    public function testTrainingNotExist(){
        $_POST= [
            "idTraining" => "500", //error here
            "wordingDFGH"  => "UnTestQuiTest", 
            "description"  => "nbvcxw mlkjhgfdsq poiuytreza", //modif here 
            "qualifLevel"  => "BUT" //modif here   
        ];
        $this->controller->add_training();
        $res = Database::getInstance()->query("SELECT * FROM Training WHERE idTraining = 5");
        $training = $res->fetch();
        $this->assertEquals("azertyuiop qsdfghjklm wxcvbn",$training->description);
        $this->assertEquals("CAP",$training->qualifLevel);
    }
    
    

}
?>