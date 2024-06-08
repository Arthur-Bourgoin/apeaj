<?php

namespace app\controllers;

use app\models\{
    AdminModel,
    SessionModel,
    UserModel,
    FormModel,
    CommentFormModel,
    PictureModel,
    CommentStudentModel,
    TrainingModel,
    ElementFormModel,
    DisplayElementModel,
    MaterialModel,
    AudioModel
};
use app\class\ {
    Feedback,
    UploadImg
};
use PHPUnit\Framework\Constraint\IsEmpty;

class AdminController extends UserController
{
    public function __construct(?UploadImg $upload) {
        if ($_SESSION["role"] === "student") {
            if(PHPUNIT_RUNNING) {
                throw new \Exception("Redirection due to incorrect role");
            } else {
                require("../app/views/error403.php");
                exit();
            }
        }
        parent::__construct($upload);
    }

    public function home()
    {
        $currentUser = UserModel::getUser($_SESSION['id']);
        $training = TrainingModel::getTraining($_SESSION["training"]);
        $students = UserModel::getStudents($training->idTraining);
        $sessions = SessionModel::getSessions($training->idTraining);
        require("../app/views/admins/home.php");
    }

    public function help()
    {
        if ($_SESSION["role"]==="educator-admin"){
            require ("../app/views/admins/aide_admin.php");
        }else{
            require ("../app/views/admins/aide_adminsimple.php");
        }
    }

    public function infoSession(int $id)
    {
        $students = UserModel::getStudents($_SESSION["training"]);
        $forms = FormModel::getFormsBySession($id);
        $session = SessionModel::getSession($id);
        $currentUser = UserModel::getUser($_SESSION['id']);
        require("../app/views/admins/details-session.php");
    }

    public function infoStudent(int $id)
    {
        if(!UserModel::existUser($id)) {
            require("../app/views/error404.php");
            exit();
        }
        $sessions = SessionModel::getSessions($_SESSION["training"]);
        $student = UserModel::getUser($id);
        $comments =CommentStudentModel::getComments($id);
        $currentForms = FormModel::getCurrentForm($id);
        $finishedForms = FormModel::getFinishedForms($id);
        $plannedForms = FormModel::getPlannedForms($id);
        $currentUser = UserModel::getUser($_SESSION["id"]);
        require("../app/views/admins/details.php");
    }

    public function progression($id){
        $student = UserModel::getUser($id);
        $forms = FormModel::getForms($id);
        $currentUser = UserModel::getUser($_SESSION["id"]);
        $tabLevels=[];
        $tabNotes=[]; 
        $tablink=[];
        foreach($forms as $form){
            $dateFormatted = date('d/m/Y', strtotime($form->form->creationDate));
            $tabLevels[$dateFormatted] = $form->avgLevels;
            $tabNotes[$dateFormatted] = $form->avgNotes;
            $tablink[$dateFormatted] = "/etudiants-{$student->idUser}/fiche-{$form->form->numero}";
        } 
        require("../app/views/admins/progression.php");
    }

    public function infoForm(int $idStudent, int $idForm)
    {   
        $student = UserModel::getUser($idStudent);
        $form = FormModel::getForm($idForm, $idStudent);
        $currentUser = UserModel::getUser($_SESSION['id']);
        $audios = AudioModel::getAudioComments($idStudent,$idForm);
        require("../app/views/admins/fiche-info.php");
    }

    public function consultForm(int $idStudent, int $numero) {
        $student = UserModel::getUser($idStudent);
        $form = FormModel::getSimpleForm($numero, $idStudent);
        if(empty($form)) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la fiche.");
            header("Location: /");
            exit();
        }
        $materials = MaterialModel::getMaterials($numero, $idStudent);
        $types =MaterialModel::getAllTypes();
        $allmaterials = MaterialModel::getAllMaterials();
        $elements = DisplayElementModel::getDisplayElements($numero, $idStudent);
        $jsonMaterials = json_encode($materials);
        $jsonAllMaterials = json_encode($allmaterials);
        require("../app/views/ficheConsult.php");
    }

    public function update_user() {   
        if($_POST["action"]==="updateAccount") {
            $_POST["role"] = $_SESSION["role"];
            $allowed_roles = array('educator-admin', 'educator', 'CIP', 'super-admin');
        }else {
            $_POST["role"] = "student";
            $allowed_roles = array('educator-admin', 'super-admin');
        }
        if (in_array($_SESSION['role'], $allowed_roles)) {
            if(empty($_POST["pwd"]) || empty($_POST["verifPwd"])) {
                if($this->verifUser($_POST))
                    UserModel::updateUser($_POST);
                else
                    Feedback::setError("Mise à jour impossible, les informations ne sont pas valides.");
            } else {
                if($this->verifUser($_POST) && ($_POST["pwd"] === $_POST["verifPwd"]))
                    UserModel::updateUserAndPwd($_POST);
                else
                    Feedback::setError("Mise à jour impossible, les informations ne sont pas valides.");
            }
        } else {
            Feedback::setError("Vous n'êtes pas autorisé à effectuer cette action.");
        }        
    }


    public function unPlanSession(){
        SessionModel::unPlanSession($_POST["idSession"]);
    }

    public function planSession(){
        SessionModel::planSession($_POST["idSession"]);
    }


    public function add_session() {
        if(!isset($_POST["state"])){
            $_POST["state"]=2;
        }
        if(!$this->verifSession($_POST))
            Feedback::setError("Les informations de la session ne sont pas valides.");
        elseif($_POST["state"] == 3  && (new \DateTime($_POST["timeBegin"])) < new \DateTime())
            Feedback::setError("Une session planifiée ne peux pas commencer avant la date actuelle");
        else
            SessionModel::addSession($_POST);
    }

    public function update_session() {
        $_POST["state"]=SessionModel::getSession($_POST["idSession"])->state;
        if(!$this->verifSession($_POST))
            Feedback::setError("Les informations de la session ne sont pas valides.");
        elseif(SessionModel::getSession($_POST["idSession"])->state == 3  && (new \DateTime($_POST["timeBegin"])) < new \DateTime())
            Feedback::setError("Une session planifiée ne peux pas commencer avant la date actuelle");
        else
            SessionModel::updateSession($_POST);
    }

    public function closeSession() {
        if(!in_array($_SESSION['role'], array('educator-admin', 'super-admin'))) {
            Feedback::setError("Vous n'êtes pas autorisé à réaliser cette action.");
            return;
        }
        if(empty($_POST["idSession"])) {
            Feedback::setError("Vous ne possedez pas les droits");
        }else {
            SessionModel::closeSession($_POST["idSession"]);
        }
    }   

    public function reOpenSession(){
        SessionModel::reOpenSession($_POST["idSession"]); 
    }

    public function openForm(){
        FormModel::openForm($_POST["numero"],$_POST["idStudent"]);
    }

    public function delete_session() {
        if(!in_array($_SESSION['role'], array('educator-admin', 'super-admin'))) {
            Feedback::setError("Vous n'êtes pas autorisé à réaliser cette action.");
            return;
        }
        if (empty($_POST["idSession"])) {
            Feedback::setError("Une erreur s'est produite lors de la suppression de la session.");
        }else {
            SessionModel::deleteSession($_POST["idSession"]);
            header("Location: /");
            exit();
        }
    } 

    public function add_commentStudent() {
        $_POST["idEducator"] = $_SESSION["id"];
        if(empty($_POST["text"]))
            Feedback::setError("Ajout impossible, les informations entrées ne sont pas valides.");
        else
            CommentStudentModel::addComment($_POST);
    }

    public function update_commentStudent() {
        $_POST["idEducator"] = $_SESSION["id"];
        if(empty($_POST["text"])){
            Feedback::setError("Mise à jour impossible, les informations entrées ne sont pas valides.");
        }else
            CommentStudentModel::updateComment($_POST);
    }

    public function delete_commentStudent() {
        if(empty($_POST["idStudent"])) {
            Feedback::setError("Une erreur s'est produite lors de la suppression du commentaire.");
        } else {
            CommentStudentModel::deleteComment($_POST["idStudent"], $_SESSION["id"]);
        }
    }

    public function add_commentForm() {
        $_POST["admin"] = isset($_POST["admin"]) ? 1 : 0;
        $_POST["idAuthor"] = $_SESSION['id'];
        if(!$this->verifComment($_POST)){
            Feedback::setError("Les données du commentaire ne sont pas valides");      
        }
        else
            CommentFormModel::addComment($_POST, $_SESSION["id"]);
    }

    public function update_commentForm() {
        $_POST["admin"] = isset($_POST["admin"]) ? 1 : 0;
        if(!$this->verifComment($_POST)){
            Feedback::setError("Les données du commentaire ne sont pas valides");      
        }
        else
            CommentFormModel::updateComment($_POST);
    }

    public function delete_commentForm() {
        if(empty($_POST["idCommentForm"]))
            Feedback::setError("Une erreur est survenue durant la suppression.");
        else    
            CommentFormModel::deleteComment($_POST["idCommentForm"]);
    }

    public function add_picture($idStudent, $idForm) {
        $_POST['numero'] = $idForm;
        $_POST['idStudent'] = $idStudent;
        $_POST['idAuthor']= $_SESSION['id'];
        if(empty($_POST["title"]))
            Feedback::setError("Vous n'avez pas renseigné le titre de la photo.");
        elseif(empty($_FILES["picture"]["name"]))
            Feedback::setError("Vous n'avez pas renseigné de photo.");
        else{
            if($this->upload->upload($_FILES["picture"], "./assets/images/pictures/")) {
                $_POST["path"] = $this->upload->getUniqName();
                PictureModel::addPicture($_POST);
            }
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

    // public function chooseTemplate($id){
    //     $student = UserModel::getUser($id);
    //     $formTemplates = FormModel::getForms(1000);
    //     require("../app/views/admins/chooseTemplate.php");
    // }

    public function createForm(int $idStudent)
    {
        $student = UserModel::getUser($idStudent);
        $datas = ElementFormModel::getElements();
        $datas = json_encode($datas);
        $dir = opendir("./assets/images/pictos");
        while (false !== ($filename = readdir($dir))) {
            $files[] = $filename;
        }
        closedir($dir);
        unset($files[array_search(".", $files)]);
        unset($files[array_search("..", $files)]);
        $files = array_values($files);
        $pictos = json_encode($files);
        $sessions = SessionModel::getSessionNotFinish();
        require("../app/views/admins/ficheModif.php");
    }

    public function save_createForm(int $idStudent) {
        $elements = json_decode($_POST["json"], true);
        $_POST["idEducator"] = $_SESSION["id"];
        $_POST["numero"] = FormModel::getMaxNumero($idStudent) + 1;
        $_POST["idStudent"] = $idStudent;
        $_POST["creationDate"] = date('Y-m-d H:i:s');
        $_POST["finish"] = 0;
        $_POST["idSession"] = $_POST["idSession"];
        $_POST["newIntervention"] = isset($_POST["newInntervention"]) ? 1 : 0;
        if(!self::verifForm($_POST)) {
            Feedback::setError("Une erreur s'est produite lors de la création de la fiche.");
            return;
        } else {
            if(!FormModel::addForm($_POST)) {
                Feedback::setError("Une erreur s'est produite lors de la création de la fiche.");
            } else {
                foreach($elements as $element) {
                    $element["bold"] = $element["bold"] ? 1 : 0;
                    $element["textToSpeechBool"] = $element["textToSpeechBool"] ? 1 : 0;
                    $element["speechToTextBool"] = $element["speechToTextBool"] ? 1 : 0;
                    $element["active"] = $element["active"] ? 1 : 0;
                    $element["numero"] = $_POST["numero"];
                    $element["idStudent"] = $idStudent;
                    if(!DisplayElementModel::addElement($element)) {
                        Feedback::setError("Une erreur s'est produite lors de la création de la fiche.");
                        return;
                    }
                }
            }
        }
        Feedback::setSuccess("Ajout de la fiche enregistré.");
        header("Location: " . dirname($_SERVER["REQUEST_URI"]));
        exit();
    }

    public function updateForm(int $idStudent, int $numero) {
        $_POST["interventionValidation"] = isset($_POST["interventionValidation"]);
        $_POST["maintenanceType"] = isset($_POST["maintenanceType"]) ? $_POST["maintenanceType"] : 0;
        $_POST["interventionNature"] = isset($_POST["interventionNature"]) ? $_POST["interventionNature"] : 0;
        $_POST["newIntervention"] = isset($_POST["newIntervention"]);
        $_POST["materials"] = json_decode($_POST["json"], true);
        if(!$this->verifFormUpdate($_POST)) {
            Feedback::setError("Mise à jour de la fiche impossible, les données ne sont pas valides.");
        } else {
            $_POST["numero"] = $numero;
            $_POST["idStudent"] = $idStudent;
            if(!FormModel::updateForm($_POST)) {
                Feedback::setError("Une erreur s'est produite lors de la mise à jour de la fiche.");
            } else {
                MaterialModel::deleteMaterials($numero, $idStudent);
                foreach($_POST["materials"] as $material) {
                    if($material != 0) {
                        MaterialModel::addMaterial($numero, $idStudent, $material["idMaterial"]);
                    }
                }
                Feedback::setSuccess("Mise à jour de la fiche enregistrée.");
            }
        }
        header("Location: " . dirname($_SERVER["REQUEST_URI"]));
    }


    public function finishForm() {
        if (in_array($_SESSION['role'], array('educator-admin', 'super-admin'))) {
            if(empty($_POST["numero"]) || empty($_POST["idStudent"]))
                Feedback::setError("Une erreur est survenue.");
            else
                FormModel::finishForm($_POST["numero"], $_POST["idStudent"]);
        } else {
            Feedback::setError("Vous n'avez pas les droits nécessaires pour réaliser cette action.");
        }
    }

    /*
    TODO : réouvrir fiche
    */

    public function delete_form() {
        if (in_array($_SESSION['role'], array('educator-admin', 'super-admin'))) {
            if(empty($_POST["numero"]) || empty($_POST["idStudent"])) {
                Feedback::setError("Une erreur est survenue lors de la suppression de la fiche.");
            }
            else {
                FormModel::deleteForm($_POST["numero"], $_POST["idStudent"]);
                header("Location: " . dirname($_SERVER["REQUEST_URI"]));
                exit();
            }
        } else {
            Feedback::setError("Vous n'avez pas les droits nécessaires pour réaliser cette action.");
        }
    }

    public function add_picto() {
        if(empty($_POST["title"]) || empty($_FILES["picture"]["name"])) {
            Feedback::setError("Une erreur s'est produite lors de l'enregistrement du pictogramme.");
        } else {
            if($this->upload->upload($_FILES["picture"], "./assets/images/pictos/")) {
                // $_POST["path"] = $this->upload->getUniqName();
                Feedback::setSuccess("Ajout du pictogramme enregistré.");
            }
        }
    }

    public function add_material(){
        if(empty($_POST["wording"]) || empty($_FILES["picture"]["name"]) || empty($_POST["description"]) || empty($_POST["type"])) {
            Feedback::setError("Une erreur s'est produite lors de l'enregistrement du matériau.");
        } else {
            if($this->upload->upload($_FILES["picture"], "./assets/images/materials/")) {
                $_POST["picture"]=$this->upload->getUniqName();
                if(MaterialModel::addNewMaterial($_POST)){
                    Feedback::setSuccess("Ajout du matériau enregistré.");  
                }else{
                    Feedback::setError("Une erreur s'est produite lors de l'enregistrement du matériau.");
                }
            }
            else {
                Feedback::setError("Une erreur s'est produite lors de l'enregistrement du matériau.");
            }
            }
        }

    public function addAudio($idS,$idF){
        $_POST["audio"] = uniqid('', true) . ".mp3";
        $_POST["idAuthor"]=$_SESSION["id"];
        $_POST["idStudent"]=$idS;
        $_POST["numero"]=$idF;
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

    
    private function verifSession(array $args){
        return (!empty($args["wording"]) &&
        !empty($args["theme"]) &&
        !empty($args["description"]) &&
        !empty($args["timeBegin"]) &&
        !empty($args["idTraining"]) )&&
        !empty($args["state"]);
    }

    private function verifClosingSession(array $args){
        return ($args["timeBegin"]<$args["timeEnd"]);
    }

    private function verifUser(array $args){
            return (!empty($args["idUser"]) &&
            !empty($args["lastName"]) &&
            !empty($args["firstName"]));
    }

    private function verifComment(array $args){
        return (!empty($args["wording"]) &&
            !empty($args["text"])  &&
            isset($args["note"])  &&
            ctype_digit($args["note"]));
    }

    public function verifForm(array $args) {
        return (
            !empty($_POST["json"]) &&
            !empty($_POST["idEducator"]) &&
            !empty($_POST["idStudent"]) &&
            !empty($_POST["numero"]) &&
            isset($_POST["finish"]) &&
            !empty($_POST["creationDate"]) &&
            !empty($_POST["bgColor"]) &&
            !empty($_POST["idSession"])
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