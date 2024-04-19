<?php
namespace app\controllers;
use config\Database;
use app\models\ {
    TrainingModel,
    UserModel
};
use app\class\Feedback;

class ConnexionController {

    public function selectTraining() {
        Feedback::removeMessage();
        if(isset($_SESSION["training"])) {
            if(isset($_SESSION["role"]))
                header("Location: /");
            else
                header("Location: /connexion");
        } else {
            $trainings = TrainingModel::getTrainings();
            require("../app/views/selectTraining.php");
        }
    }

    public function saveTraining() {
        $_SESSION["training"] = $_POST["idTraining"];
        header("Location: /connexion");
    }

    public function login() {
        if(!isset($_SESSION["training"])) {
            header("Location: /choix-formation");
        } else {
            try {
                if(isset($_SESSION["role"])) {
                    header("Location: /");
                } else {
                    if(!TrainingModel::existTraining($_SESSION["training"])) {
                        unset($_SESSION["training"]);
                        header("Location: /choix-formation");
                    } else {
                        $admins = UserModel::getAdminsByTraining();
                        $students = UserModel::getStudents($_SESSION["training"]);
                        require("../app/views/connexion.php");
                    }
                }
            } catch (\Exception $e) {
                unset($_SESSION["training"]);
                header("Location: /choix-formation");
            }
        }
    }

    public function verifLogin() {
        $user = UserModel::getUserByLogin($_POST["inputLogin"]);
        if(is_int($user) || !password_verify($_POST["inputPwd"], $user->pwd)) {
            Feedback::setError("Identifiant ou mot de passe incorrect.");
            $admins = UserModel::getAdmins();
            $students = UserModel::getStudents($_SESSION["training"]);
            header("Location: /connexion");
        } else {
            $_SESSION["id"] = $user->idUser;
            $_SESSION["role"] = $user->role;
            header("Location: /");
        }
    }

    public function disconnect() {
        session_destroy();
        header("Location: /choix-formation");
        exit();
    }

}