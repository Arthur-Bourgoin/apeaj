<?php
namespace app\controllers;
use app\models\TrainingModel;
use app\models\UserModel;
use app\class\ExportExcel;
use app\class\Feedback;
use app\class\UploadImg;

class SAdminController extends UserController {

    public function __construct(?UploadImg $upload) {
        if($_SESSION["role"] !== "super-admin") {
            if(PHPUNIT_RUNNING) {
                throw new \Exception("Redirection due to incorrect role");
            } else {
                require("../app/views/error403.php");
                exit();
            }
        }
        parent::__construct($upload);
    }

    public function home() {
        $trainings = TrainingModel::getTrainings();
        $currentUser = UserModel::getUser($_SESSION["id"]);
        require("../app/views/sadmins/home.php");
    }

    public function help()
    {
        require ("../app/views/sadmins/aide_superadmin.php");
    }

    public function infoTraining(int $idTraining) {
        if(!TrainingModel::existTraining($idTraining)) {
            require("../app/views/error404.php");
            exit();
        }
        $currentUser = UserModel::getUser($_SESSION["id"]);
        $admins = UserModel::getAdminsByTrainingWithoutSA($idTraining);
        $students = UserModel::getStudents($idTraining);
        $training = TrainingModel::getTraining($idTraining);
        require("../app/views/sadmins/formation.php");
    }

    public function add_user() {
        if(!$this->verifUser() || empty($_FILES["picture"]["name"])) {
            Feedback::setError("Les informations de l'utilisateur ne sont pas valides.");
        }
        else {
            if($this->upload->upload($_FILES["picture"], "./assets/images/users/")) {
                $_POST["picture"] = $this->upload->getUniqName();
                UserModel::addUser($_POST);
            }
        }
    }

    public function update_user() {
        if($_POST["action"] === "updateAccount")
            $_POST["role"] = $_SESSION["role"];
        if(empty($_POST["pwd"]) || empty($_POST["verifPwd"])) {
            if($this->verifUser())
                UserModel::updateUser($_POST);
            else
                Feedback::setError("Mise à jour impossible, les informations ne sont pas valides.");
        } else {
            if($this->verifUser() && ($_POST["pwd"] === $_POST["verifPwd"]))
                UserModel::updateUserAndPwd($_POST);
            else
                Feedback::setError("Mise à jour impossible, les informations ne sont pas valides.");
        }
    }

    public function delete_user() {
        if(!isset($_POST["idUser"]))
            Feedback::setError("Une erreur s'est produite lors de la suppression de l'utilisateur.");
        else
            UserModel::deleteUser($_POST["idUser"]);
    }

    public function export_user() {
        if(!isset($_POST["idUser"]))
            Feedback::setError("Une erreur s'est produite lors de l'export de l'utilisateur.");
        else{
            $student = UserModel::getUser($_POST["idUser"]);
            $xls = new ExportExcel();
            $xls->exportUser($_POST["idUser"]);  
            $xls->getFileXLS("".$student->lastName." ".$student->firstName.".xlsx");
        }
    }

    public function add_training() {
        if(!$this->verifTraining() || empty($_FILES["picture"]["name"])) {
            Feedback::setError("Ajout impossible, les informations de la formation ne sont pas valides.");
        }
        else {
            if($this->upload->upload($_FILES["picture"], "./assets/images/trainings/")) {
                $_POST["picture"] = $this->upload->getUniqName();
                TrainingModel::addTraining($_POST);
            }
        }
    }

    public function update_training() {
        if(!$this->verifTraining() || !isset($_POST["idTraining"]))
            Feedback::setError("Mise à jour impossible, les informations ne sont pas valides.");
        else
            TrainingModel::updateTraining($_POST);
    }

    public function delete_training() {
        if(empty($_POST["idTraining"])) {
            Feedback::setError("Une erreur s'est produite lors la suppression de la formation.");
        } else {
            $training = TrainingModel::getTraining($_POST["idTraining"]);
            $xls = new ExportExcel();
            $xls->exportTraining($_POST["idTraining"]);
            $xls->getFileXLS("".$training->wording.".xlsx");
            TrainingModel::deleteTraining($_POST["idTraining"]);
            exit();
        }
    }

    public function export_training() {
        if(!isset($_POST["idTraining"]))
            Feedback::setError("Une erreur s'est produite lors de l'export de la formation.");
        else{
            $training = TrainingModel::getTraining($_POST["idTraining"]);
            $xls = new ExportExcel();
            $xls->exportTraining($_POST["idTraining"]);
            $xls->getFileXLS("".$training->wording.".xlsx");
        }
    }

    private function verifTraining(){
        return (
            !empty($_POST["wording"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["qualifLevel"])
        );
    }

    private function verifUser(){
        return (
            !empty($_POST["lastName"]) &&
            !empty($_POST["firstName"]) &&
            !empty($_POST["typePwd"])
        );        
    }
    

}