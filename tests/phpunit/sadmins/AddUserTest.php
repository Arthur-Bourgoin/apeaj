<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Controllers\SAdminController;

final class AddUserTest extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new SAdminController(null);
        $_SESSION["role"]="super-admin";
        $_FILES = ["picture" => []];
    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Users WHERE idUser = '4000'");
        $_POST = [];
    }

    public function testAddRoleAdmin(){
        $_SESSION["role"] = "educator";
        $_POST= [
            "idUser" => "4000", 
            "login"  => "fred.loc", 
            "lastName"  => "Loc", 
            "firstName"  => "Fred",  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1"
        ];
        $this->controller->add_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = '4000'");
        $this->assertEquals(0,$res->rowCount());
    }
    



    public function testSuccess() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "fred.loc", 
            "lastName"  => "Loc", 
            "firstName"  => "Fred",  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1"
        ];
        $this->controller->add_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = '4000'");
        $this->assertEquals(1,$res->rowCount());
    }

    

    public function testInvalidParams() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "fred.loc", 
            "lastNamezzz"  => "Loc", //error here
            "firstName"  => "Fred",  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1"
        ];
        $this->controller->add_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = '4000'");
        $this->assertEquals(0,$res->rowCount());
    }

    public function testInvalidPWD() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "fred.loc", 
            "lastName"  => "Loc", 
            "firstName"  => "Fred",  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "122456", //error here
            "role"  => "student", 
            "idTraining"  => "1"
        ];
        $this->controller->add_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = '4000'");
        $this->assertEquals(0,$res->rowCount());
    }

    public function testTrainingNotExist() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "fred.loc", 
            "lastName"  => "Loc", 
            "firstName"  => "Fred",  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456",
            "role"  => "student", 
            "idTraining"  => "500" //error here
        ];
        $this->controller->add_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = '4000'");
        $this->assertEquals(0,$res->rowCount());
    }

}
?>