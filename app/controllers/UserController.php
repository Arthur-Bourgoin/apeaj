<?php

namespace app\controllers;
use config\Database;
use app\models\UserModel;
use app\class\UploadImg;


class UserController {

    protected $upload;

    public function __construct(?UploadImg $upload) {
        if(!isset($_SESSION["training"])) {
            header("Location: /choix-formation");
            exit();
        }
        if(!isset($_SESSION["id"])) {
            header("Location: /connexion");
            exit();
        }
        $this->upload = empty($upload) ? new UploadImg() : $upload;
    }

    public function home() {
        if($_SESSION["role"] === "student") {
            $controller = new StudentController(null);
            $controller->home();
        } elseif(in_array($_SESSION["role"], ["educator", "educator-admin", "CIP"])) {
            $controller = new AdminController(null);
            $controller->home();
        } elseif($_SESSION["role"] === "super-admin") {
            $controller = new SAdminController(null);
            $controller->home();
        } else {
            echo "Erreur normalement impossible";
            exit();
        }
    }

    public function help() {
        if($_SESSION["role"] === "student") {
            $controller = new StudentController(null);
            $controller->help();
        } elseif(in_array($_SESSION["role"], ["educator", "educator-admin", "CIP"])) {
            $controller = new AdminController(null);
            $controller->help();
        } elseif($_SESSION["role"] === "super-admin") {
            $controller = new SAdminController(null);
            $controller->help();
        } else {
            echo "Erreur normalement impossible";
            exit();
        }
    }
    
    public function homePOST() {
        // if ($_SESSION["role"] === "student") 
        // {
        //     $controller = new StudentController();
        //     $controller->home();
        // } 
        if (in_array($_SESSION["role"], ["educator", "educator-admin", "CIP"]))
        {
            $controller = new AdminController(null);
            if(isset($_POST["action"])) {
                switch($_POST["action"]) {
                    case "addSession":
                        $controller->add_session();
                        break;
                    case "addPicto":
                        $controller->add_picto();
                        break;
                    case "addMaterial":
                        $controller->add_material();
                        break;
                    case "updateStudent":
                    case "updateAccount":
                        $controller->update_user();
                        break;
                    
                }
            }
        } 
        elseif($_SESSION["role"] === "super-admin") 
        {
            $controller = new SAdminController(null);
            if(isset($_POST["action"])) {
                switch($_POST["action"]) {
                    case "updateAccount":
                        $controller->update_user();
                        break;
                    case "addTraining":
                        $controller->add_training();
                        break;
                    case "deleteTraining":
                        $controller->delete_training();
                        break;
                    case "exportTraining":
                        $controller->export_training();
                        break;
                    case "addUser":
                        $controller->add_user();
                        break;
                }
            }
        }
        header("Location: /");
    }

}