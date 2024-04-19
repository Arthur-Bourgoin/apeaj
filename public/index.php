<?php

require_once("../vendor/autoload.php");

use app\controllers\ {
    ConnexionController,
    UserController,
    StudentController,
    AdminController,
    SAdminController
};
use app\class\ExportExcel;

session_start();


if(!in_array($_SERVER["REQUEST_URI"], ["/choix-formation", "/connexion"])) {
    if(!isset($_SESSION["training"])) {
        header("Location: /choix-formation");
        exit();
    } elseif(!isset($_SESSION["id"])) {
        header("Location: /connexion");
        exit();
    }
}

$router = new AltoRouter();
//$router->setBasePath("/public/");

$router->map("GET", "/[i:id]", function ($id) {
    $forms = App\Models\FormModel::getForms($id);
    foreach($forms as $form) {
        var_dump($form);
        echo "</br></br>";
    }
});

/*######################################################################################
                                      CONNECTION
#######################################################################################*/
$router->map("GET", "/choix-formation", function () {
    $controller = new ConnexionController();
    $controller->selectTraining();
});
$router->map("POST", "/choix-formation", function () {
    $controller = new ConnexionController();
    $controller->saveTraining();
});
$router->map("GET", "/connexion", function () {
    $controller = new ConnexionController();
    $controller->login();
});
$router->map("POST", "/connexion", function () {
    $controller = new ConnexionController();
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "verifLogin":
                $controller->verifLogin();
                break;
            case "disconnectTraining":
                $controller->disconnect();
                break;
        }
    }
     else {
        $controller->login();
     }
});
$router->map("GET", "/disconnect", function() {
    $controller = new ConnexionController();
    $controller->disconnect();
});

/*######################################################################################
                                      HOME/AIDE
#######################################################################################*/
$router->map("GET", "/", function () {
    $controller = new UserController(null);
    $controller->home();
});
$router->map("GET", "/accueil", function () {
    $controller = new UserController(null);
    $controller->home();
});
$router->map("POST", "/", function () {
    $controller = new UserController(null);
    $controller->homePOST();
});
$router->map("POST", "/accueil", function () {
    $controller = new UserController(null);
    $controller->homePOST();
});
$router->map("GET", "/aide", function () {
    $controller = new UserController(null);
    $controller->help();
});

/*######################################################################################
                                      STUDENT
#######################################################################################*/
$router->map("GET", "/fiche-[i:id]", function ($id) {
    $controller = new StudentController(null);
    $controller->infoForm($id);
});
$router->map("POST", "/fiche-[i:id]", function ($id) {
    $controller = new StudentController(null);
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "addComment":
                $controller->add_comment();
                break;
            case "updateComment":
                $controller->update_comment();
                break;
            case "deleteComment":
                $controller->delete_comment();
                break;
            case "addPicture":
                $controller->add_picture($id);
                break;
            case "deletePicture":
                $controller->delete_picture();
                break;
            case "addAudio":
                $controller->addAudio($id);
                break;
            case "deleteAudioComment":
                $controller->deleteCommentAudio();
                break;
        }
    header("Location: " . $_SERVER["REQUEST_URI"]);
    } else {
        $controller->infoForm($id);
    }
});
// $router->map("GET", "/fiche-[i:id]/consulter", function ($id) {
//     $controller = new StudentController();
//     $controller->consultForm($id);
// });
$router->map("GET", "/fiche-[i:id]/consultation", function ($id) {
    $controller = new StudentController(null);
    $controller->consultForm($id);
});
$router->map("POST", "/fiche-[i:id]/consultation", function ($id) {
    $controller = new StudentController(null);
    $controller->update_form($id);
});

/*######################################################################################
                                      ADMIN
#######################################################################################*/
$router->map("GET", "/choix-modele-fiche", function () {
    $controller = new AdminController(null);
    $id = 1;
    $controller->chooseTemplate($id);
});
$router->map("GET", "/etudiants-[i:id]", function ($id) {
    $controller = new AdminController(null);
    $controller->infoStudent($id);
});
$router->map("POST", "/etudiants-[i:id]", function ($id) {
    $controller = new AdminController(null);
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "updateAccount":
                $controller->update_user();
            case "updateUser":
                $controller->update_user();
                break;
            case "addComment":
                $controller->add_commentStudent();
                break;
            case "updateComment":
                $controller->update_commentStudent();
                break;
            case "deleteComment":
                $controller->delete_commentStudent();
                break;
        }
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
});
$router->map("GET", "/sessions-[i:id]", function ($id) {
    $controller = new AdminController(null);
    $controller->infoSession($id);
});
$router->map("POST", "/sessions-[i:id]", function ($id) {
    $controller = new AdminController(null);
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "updateAccount":
                $controller->update_user();
                break;
            case "updateSession":
                $controller->update_session();
                break;
            case "deleteSession":
                $controller->delete_session();
                break;
            case "closeSession":
                $controller->closeSession();
                break;
            case "reOpenSession":
                $controller->reOpenSession();
                break;
            case "planSession":
                $controller->planSession();
                break;
            case "unPlanSession":
                $controller->unPlanSession();
                break;
            }
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
});
$router->map("GET", "/etudiants-[i:idS]/fiche-[i:idF]", function ($idS, $idF) {
    $controller = new AdminController(null);
    $controller->infoForm($idS, $idF);
});
$router->map("POST", "/etudiants-[i:idS]/fiche-[i:idF]", function ($idS, $idF) {
    $controller = new AdminController(null);
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "finishForm":
                $controller->finishForm();
                break;
            case "deleteForm":
                $controller->delete_form();
                break;
            case "addComment":
                $controller->add_commentForm();
                break;
            case "updateComment":
                $controller->update_commentForm();
                break;
            case "deleteComment":
                $controller->delete_commentForm();
                break;
            case "addPicture":
                $controller->add_picture($idS, $idF);
                break;
            case "deletePicture":
                $controller->delete_picture();
                break;
            case "updateAccount":
                $controller->update_user();
                break;
            case "openForm":
                $controller->openForm();
                break;
            case "addAudio":
                $controller->addAudio($idS,$idF);
                break;
            case "deleteAudioComment":
                $controller->deleteCommentAudio();
                break;
        }
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
});
$router->map("GET", "/etudiants-[i:idS]/fiche-[i:idF]/consultation", function ($idS, $idF) {
    $controller = new AdminController(null);
    $controller->consultForm($idS, $idF);
});
$router->map("POST", "/etudiants-[i:idS]/fiche-[i:idF]/consultation", function ($idS, $idF) {
    $controller = new AdminController(null);
    $controller->updateForm($idS, $idF);
});
$router->map("GET", "/etudiants-[i:idS]/creer-fiche", function ($idS) {
    $controller = new AdminController(null);
    $controller->createForm($idS);
});
$router->map("POST", "/etudiants-[i:idS]/creer-fiche", function ($idS) {
    if(isset($_POST["action"])) {
        $controller = new AdminController(null);
        switch($_POST["action"]) {
            case "createForm":
                $controller->save_createForm($idS);
                break;
            case "addPicto":
                $controller->add_picto();
                break;
        }
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
});
$router->map("GET", "/etudiants-[i:idS]/progression", function($idS) {
    $controller = new AdminController(null);
    $controller->progression($idS);
});
$router->map("POST", "/etudiants-[i:idS]/progression", function($idS) {
    $controller = new AdminController(null);
        $controller->update_user();
        header("Location: " . $_SERVER["REQUEST_URI"]);
});

/*######################################################################################
                                      SUPER ADMIN
#######################################################################################*/
$router->map("GET", "/formation-[i:id]", function ($id) {
    $controller = new SAdminController(null);
    $controller->infoTraining($id);
});
$router->map("POST", "/formation-[i:id]", function ($id) {
    $controller = new SAdminController(null);
    if(isset($_POST["action"])) {
        switch($_POST["action"]) {
            case "updateAccount":
                $controller->update_user();
                break;
            case "updateTraining":
                $controller->update_training();
                break;
            case "deleteTraining":
                $controller->delete_training();
                break;
            case "addUser":
                $controller->add_user();
                break;
            case "updateAdmin":
                $controller->update_user();
                break;
            case "deleteUser":
                $controller->delete_user();
                break;
            case "exportUser":
                $controller->export_user();
                break;
        }
        header("Location: " . $_SERVER["REQUEST_URI"]);
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
});


$match = $router->match();
if($match != null) {
    call_user_func_array($match['target'], $match['params']);
} else {
    require("../app/views/error404.php");
}
