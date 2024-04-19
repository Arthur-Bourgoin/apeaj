<?php

use Config\Database;
use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\Feedback;
use App\Controllers\AdminController;

final class TestAddCommentStudent extends TestCase {
    private $controller;

    public function setUp(): void {
        $this->controller = new AdminController(null);
        $_SESSION["role"] !== "student";
        $_FILES = ["picture" => []];
        


    }

    public function tearDown(): void {
        Database::getInstance()->exec("DELETE FROM Session WHERE idCommentForm= 5000");
        $_POST = [];
    }

    public function testSuccess() {
        $_POST = [
            "idCommentForm" => 5000,
            "wording" => "Commentaire 5000",
            "text" => "Texte du commentaire 5000",
            "audio" => null,
            "admin" => false,
            "idAuthor" => 13,
            "idStudent" => 1,
            "numero" => 1,
            "lastModif" => "2024-01-10T010:30",
            "note" => 15,


        ];
        $this->controller->add_commentStudent();
        $res = Database::getInstance()->query("SELECT * FROM CommentForm WHERE idCommentForm = '5000'")
        $this->assertEquals(1,$res->rowCount());
    }

    public function testInvalidParams() {
        $_POST = [
            "idCommentForm" => 5000,
            "wording" => "Commentaire 5000",
            "textghjk" => "Texte du commentaire 5000",
            "audio" => null,
            "admin" => false,
            "idAuthor" => 13,
            "idStudent" => 1,
            "numero" => 1,
            "lastModif" => "2024-01-10T010:30",
            "note" => 15,
        ];
        $this->controller->add_commentStudent();
        $res = Database::getInstance()->query("SELECT * FROM CommentForm WHERE idCommentForm = '5000'")
        $this->assertEquals(0,$res->rowCount());
    }

    public function testStudentNotExist() {
        $_POST = [
            "idCommentForm" => 5000,
            "wording" => "Commentaire 5000",
            "text" => "Texte du commentaire 5000",
            "audio" => null,
            "admin" => false,
            "idAuthor" => 13,
            "idStudent" => 150000,
            "numero" => 1,
            "lastModif" => "2024-01-10T010:30",
            "note" => 15,
        ];
        $this->controller->add_commentStudent();
        $res = Database::getInstance()->query("SELECT * FROM CommentForm WHERE idCommentForm = '5000'")
        $this->assertEquals(0,$res->rowCount());
    }

    public function testRoleUser(){
        $_SESSION["role"] === "student"; //error here
        $_POST= [
            "idCommentForm" => 5000,
            "wording" => "Commentaire 5000",
            "text" => "Texte du commentaire 5000",
            "audio" => null,
            "admin" => false,
            "idAuthor" => 13,
            "idStudent" => 1,
            "numero" => 1,
            "lastModif" => "2024-01-10T010:30",
            "note" => 15,
        ];
        $this->controller->deleteSession();
        $res = Database::getInstance()->query("SELECT * FROM Session WHERE idSession = '1500'");
        $this->assertEquals(1,$res->rowCount());

    }
}
