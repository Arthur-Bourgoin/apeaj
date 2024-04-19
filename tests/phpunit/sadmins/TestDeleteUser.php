<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\{
    ExportExcel,
    Feedback
};
use App\Controllers\SAdminController;

final class TestDeleteUser extends TestCase {

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

    public function testDeleteRole(){
        $_SESSION["role"] = "educator";
        $_POST= [
            "idUser" => "4000"
        ];
        $this->controller->delete_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $this->assertEquals(1, $res->rowCount());
    }
    



    public function testSuccess() {
        $_POST= [
            "idUser" => "4000"
        ];
        $this->controller->delete_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $this->assertEquals(0, $res->rowCount());     
    }

    

    public function testIssetParams() {
        $_POST= [];
        $this->controller->update_user();
        $res = Database::getInstance()->query("SELECT * FROM Users WHERE idUser = 4000");
        $this->assertEquals(1, $res->rowCount());     

    }

}
?>