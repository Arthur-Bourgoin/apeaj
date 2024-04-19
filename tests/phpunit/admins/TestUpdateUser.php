<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\Feedback;
use App\Controllers\AdminController;

final class TestUpdateUser extends TestCase {

    private $controller;

    public function setUp(): void {
        $this->controller = new AdminController(null);
        $_SESSION["role"] !== "student";
        $_FILES = ["picture" => []];
        Database::getInstance()-> exec("INSERT INTO ()
                                        VALUES ()")

    }

    public function tearDown(): void {
        Database::getInstance()->exec("");
        $_POST = [];
    }

    public function testSucess(){

    }

    public function testInvalidParamsUsers(){

    }

}
?>