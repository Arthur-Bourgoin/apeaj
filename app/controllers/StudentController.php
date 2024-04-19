<?php

namespace app\controllers;
use app\models\{
    FormModel,
    UserModel,
    CommentFormModel,
    PictureModel,
    MaterialModel,
    DisplayElementModel,
    AudioModel
};
use app\class\ {
    Feedback,
    UploadImg
};



class StudentController extends UserController {

    public function __construct(?UploadImg $upload) {
        parent::__construct($upload);
        if($_SESSION["role"] !== "student") {
            if(PHPUNIT_RUNNING) {
                throw new \Exception("Redirection due to incorrect role");
            } else {
                require("../app/views/error403.php");
                exit();
            }
        }
    }

    public function home() {
        $student = UserModel::getUser($_SESSION['id']);
        $finishedForms = FormModel::getFinishedForms($student->idUser);
        $currentForms = FormModel::getCurrentForm($student->idUser);
        require("../app/views/students/home_student.php");
    }

    public function help()
    {
        require ("../app/views/students/aide_student.php");
    }

    public function infoForm(int $numero) {
        if(!FormModel::existForm($numero, $_SESSION["id"])) {
            require("../app/views/error404.php");
            exit();
        }
        $student = UserModel::getUser($_SESSION["id"]);
        $form = FormModel::getForm($numero, $student->idUser);
        $audios = AudioModel::getAudioComments($_SESSION["id"],$numero);
        require("../app/views/students/fiche-info.php");
    }

    public function consultForm(int $idF) {
        $student = UserModel::getUser($_SESSION["id"]);
        $form = FormModel::getSimpleForm($idF, $_SESSION["id"]);
        if(empty($form)) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la fiche.");
            header("Location: /");
            exit();
        }
        $materials = MaterialModel::getMaterials($idF, $_SESSION["id"]);
        $types =MaterialModel::getAllTypes();
        $allmaterials = MaterialModel::getAllMaterials();
        $elements = DisplayElementModel::getDisplayElements($idF, $_SESSION["id"]);
        $jsonMaterials = json_encode($materials);
        $jsonAllMaterials = json_encode($allmaterials);
        require("../app/views/ficheConsult.php");
    }

    public function add_comment() {
        $_POST["admin"] = false;
        if(!$this->verifComment($_POST))
            Feedback::setError("Ajout impossible, les informations entrées sont invalides.");
        else
            CommentFormModel::addComment($_POST,$_SESSION["id"]);
    }

    public function update_comment() {
        $_POST["admin"] = false;
        if(!$this->verifComment($_POST) || empty($_POST["idCommentForm"]))
            Feedback::setError("Erreur lors de la modification du commentaire");
        else
            CommentFormModel::updateComment($_POST);
    }

    public function delete_comment() {
        if(empty($_POST["idCommentForm"]))
            Feedback::setError("Une erreur s'est produite lors de la suppression du commentaire.");
        else
            CommentFormModel::deleteComment($_POST["idCommentForm"]);
    }

    public function add_picture($idForm) {
        $_POST['numero'] = $idForm;
        $_POST['idStudent'] = $_SESSION["id"];
        $_POST['idAuthor'] = $_SESSION["id"];
        if(empty($_POST["title"]))
            Feedback::setError("Vous n'avez pas renseigné le titre de la photo.");
        elseif(empty($_FILES["picture"]["name"]))
            Feedback::setError("Vous n'avez pas renseigné de photo.");
        else
            if($this->upload->upload($_FILES["picture"], "./assets/images/pictures/")) {
                $_POST["path"] = $this->upload->getUniqName();
                PictureModel::addPicture($_POST);
            }
    }

    public function addAudio($id){
        $_POST["audio"] = uniqid('', true) . ".mp3";
        $_POST["idAuthor"]=$_SESSION["id"];
        $_POST["idStudent"]=$_SESSION["id"];
        $_POST["numero"]=$id;
        $uploadDir = './assets/audio/';
        if((move_uploaded_file($_FILES["audio"]["tmp_name"], $uploadDir . $_POST["audio"])) && (AudioModel::addAudio($_POST))){
            Feedback::setSuccess("Ajout de l'audio enregistré");
        }else{
            Feedback::setError("Une erreur s'est produite lors de l'enregistrement de l'audio");
        } 
    }

    public function deleteCommentAudio(){
        if(empty($_POST["idCommentAudio"]))
            Feedback::setError("Une erreur est survenue durant la suppression.");
        else{
            unlink("./assets/audio/". AudioModel::getAudioComment($_POST["idCommentAudio"])->audio);
            AudioModel::deleteAudioComment($_POST["idCommentAudio"]);
        }
    }
    public function delete_picture() {
        if(empty($_POST["idPicture"])) {
            Feedback::setError("Une erreur s'est produite lors de la suppression.");
            return;
        }
        $picture = PictureModel::getPicture($_POST["idPicture"]);
        if(empty($picture)) {
            Feedback::setError("Une erreur s'est produite lors de la suppression.");
            return;
        }
        if (unlink("./assets/images/pictures/" . $picture->path))
            PictureModel::deletePicture($_POST["idPicture"]);
        else
            Feedback::setError("Erreur lors de la suppresion de l'image.");    
    }

    public function update_form(int $numero) {
        $_POST["interventionValidation"] = isset($_POST["interventionValidation"]);
        $_POST["maintenanceType"] = isset($_POST["maintenanceType"]) ? $_POST["maintenanceType"] : 0;
        $_POST["interventionNature"] = isset($_POST["interventionNature"]) ? $_POST["interventionNature"] : 0;
        $_POST["newIntervention"] = isset($_POST["newIntervention"]);
        $_POST["materials"] = json_decode($_POST["json"], true);
        if(!$this->verifFormUpdate($_POST)) {
            Feedback::setError("Mise à jour de la fiche impossible, les données ne sont pas valides.");
        } else {
            $_POST["numero"] = $numero;
            $_POST["idStudent"] = $_SESSION["id"];
            if(!FormModel::updateForm($_POST)) {
                Feedback::setError("Une erreur s'est produite lors de la mise à jour de la fiche.");
            } else {
                MaterialModel::deleteMaterials($numero,$_SESSION["id"]);
                foreach($_POST["materials"] as $material) {
                    if($material != 0) {
                        MaterialModel::addMaterial($numero, $_SESSION["id"], $material["idMaterial"]);
                    }
                }
                Feedback::setSuccess("Mise à jour de la fiche enregistrée.");
            }
        }
        header("Location: " . dirname($_SERVER["REQUEST_URI"]));
    }
    private function verifComment(array $args){
        return (
            !empty($args["wording"]) &&
            !empty($args["text"]) &&
            isset($args["note"])  &&
            ctype_digit($args["note"])
        );
    }

    private function verifForm(array $args) {
        return (
            isset($_POST["studentLastName"]) &&
            isset($_POST["studentFirstName"]) &&
            isset($_POST["applicantName"]) &&
            isset($_POST["applicationDate"]) &&
            isset($_POST["location"]) &&
            isset($_POST["description"]) &&
            isset($_POST["urgencyDegree"]) &&
            isset($_POST["interventionDate"]) &&
            isset($_POST["interventionDuration"]) &&
            isset($_POST["interventionValidation"]) &&
            isset($_POST["maintenanceType"]) &&
            isset($_POST["interventionNature"]) &&
            isset($_POST["workDone"]) &&
            isset($_POST["workNotDone"]) &&
            isset($_POST["newIntervention"])
        );
    }
    private function verifFormUpdate(array $args) {
        return (
            isset($_POST["studentLastName"]) &&
            isset($_POST["studentFirstName"]) &&
            isset($_POST["applicantName"]) &&
            isset($_POST["applicationDate"]) &&
            isset($_POST["location"]) &&
            isset($_POST["description"]) &&
            isset($_POST["urgencyDegree"]) &&
            isset($_POST["interventionDate"]) &&
            isset($_POST["interventionDuration"]) &&
            isset($_POST["interventionValidation"]) &&
            isset($_POST["maintenanceType"]) &&
            isset($_POST["interventionNature"]) &&
            isset($_POST["workDone"]) &&
            isset($_POST["workNotDone"]) &&
            isset($_POST["newIntervention"])
        );
    }

}