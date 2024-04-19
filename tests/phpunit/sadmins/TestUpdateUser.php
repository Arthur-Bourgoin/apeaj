<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\{
    ExportExcel,
    Feedback
};
use App\Controllers\SAdminController;

final class TestUpdateUser extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new SAdminController(null);
        $_SESSION["role"]="super-admin";
        $_FILES = ["picture" => []];
        DataBase::getInstance()->exec("INSERT INTO Users (idUsers, login, firstName, lastName, typePwd, pwd, role, idTraining)
                                    VALUES (4000, 'fred.loc', 'Fred', 'Loc', 2, '123456', 'student',1)");
    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Users WHERE idUser = 4000");
        $_POST = [];
    }

    public function testUpdateWithEducator(){
        $_SESSION["role"] = "educator";
        $_POST= [
            "idUser" => "4000", 
            "login"  => "robert.pierre", //modif login
            "lastName"  => "Pierre", //modif lastName
            "firstName"  => "Robert",  //modif firstName
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1" 
        ];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $user = $res->fetch();
        $this->assertEquals("fred",$user->lastName);
        $this->assertEquals("loc",$user->firstName);
        $this->assertEquals("fred.loc",$user->login);
    }
    



    public function testSuccess() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "robert.pierre", //modif login
            "lastName"  => "Pierre", //modif lastName
            "firstName"  => "Robert",  //modif firstName
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1" 
        ];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $user = $res->fetch();
        $this->assertEquals("Pierre",$user->lastName);
        $this->assertEquals("Robert",$user->firstName);
        $this->assertEquals("robert.pierre",$user->login);

        
    }

    

    public function testInvalidParams() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "robert.loc", //modif login
            "lastNamezzz"  => "Loc", //error here
            "firstName"  => "Robert",  //modif firstName  
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456", 
            "role"  => "student", 
            "idTraining"  => "1" 
        ];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $user = $res->fetch();
        $this->assertEquals("fred.loc",$user->login);
        $this->assertEquals("Fred",$user->firstName);
    
    }

    public function testInvalidPWD() {
        $_POST= [
            "idUser" => "4000", 
            "login"  => "robert.pierre", //modif login
            "lastName"  => "Pierre", //modif lastName
            "firstName"  => "Robert",  //modif firstName
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "122456", //error here
            "role"  => "student", 
            "idTraining"  => "1" 
        ];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $user = $res->fetch();
        $this->assertEquals("fred.loc",$user->login);
        $this->assertEquals("loc",$user->lastName);
        $this->assertEquals("fred",$user->firstName);
    
    }

    public function testTrainingNotExist() {
        $_POST= [
            "idUser" => "4000",
            "login"  => "robert.pierre", //modif login
            "lastName"  => "Pierre", //modif lastName
            "firstName"  => "Robert",  //modif firstName 
            "typePwd"  => "2", 
            "pwd"  => "123456",
            "verifPwd" => "123456",
            "role"  => "student", 
            "idTraining"  => "500" //error here
        ];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $user = $res->fetch();
        $this->assertEquals("fred.loc",$user->login);
        $this->assertEquals("loc",$user->lastName);
        $this->assertEquals("fred",$user->firstName);
    
    }

}
?>