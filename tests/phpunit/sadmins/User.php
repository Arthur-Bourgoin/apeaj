<?php

use PHPUnit\Framework\TestCase;
use Config\Database;
use App\Class\{
    ExportExcel,
    Feedback
};
use App\Controllers\SAdminController;

final class User extends TestCase {

    public function testSuccess() {
        $this->assertEquals(1, 1);
    }

    public function testFailure() {
        $this->assertEquals(1, 2);
    }

}
?>