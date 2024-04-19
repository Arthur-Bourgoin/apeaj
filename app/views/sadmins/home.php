<?php
$bsIcons = true;
$title = "Accueil";
$scripts = "<script src='./assets/js/sadmin/home.js' type='module'></script>
            <script src='./assets/js/account.js' type='module'></script>";
define("PATH", "/assets/images/trainings/");
ob_start();
\app\class\Breadcrumb::clear();
\app\class\Breadcrumb::add('Home', "Accueil", 'bi bi-house','/');
?>

<div class="container">
    <div class="row mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center p-0">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraining"> 
                <i class="bi bi-file-plus me-2"></i>Ajouter une formation 
            </button>
            <!-- Bouton de menu déroulant pour les breakpoints inférieurs -->
            <button class="btn btn-secondary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-controls="navbarCollapse">
                <i class="bi bi-list"></i>
            </button>
            
            <!-- Div à afficher comme menu déroulant -->
            <div class="collapse d-md-flex align-items-center" id="navbarCollapse">
                <!-- Contenu visible par défaut -->
                <a href="/disconnect" class="btn btn-danger d-md-block d-none">
                    <i class="bi bi-power me-2"></i>Se déconnecter
                </a>
                <!-- Contenu du menu déroulant -->
                <a href="/disconnect" class="btn btn-danger d-md-none">
                    <i class="bi bi-power"></i>
                </a>
                <button class="btn" id="openModalProfilButton" data-bs-toggle="modal" data-bs-target="#profileConsultation">
                    <i class="bi bi-person-circle" style="font-size: 3rem;"></i> 
                </button>
            </div>
        </div>
    </div>

    <!-- 
    ########################################
    #####      AFFICHAGE FEEDBACK      #####
    ########################################
    -->
    <?= app\class\Feedback::getMessage() ?>

    <?php
    if(is_array($trainings)) {
        foreach ($trainings as $training) {
            echo $training->getCardHome();
        }
    }
    ?>

    <!-- Modal ajout utilisateur-->
    <div class="modal fade" id="newUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= $_SERVER["REQUEST_URI"]?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addUser">
                <input type="hidden" name="idTraining">
                    
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUserLabel">Ajouter utilisateur</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center align-items-center" style="height: 156px;">
                                <label for="inputImgUser" class="h-100 d-flex align-items-center justify-content-center my-3">
                                    <img id="imgUser" src="/assets/images/users/user.png" class="object-fit-contain mw-100 mh-100" style="cursor: pointer;" alt="Image de l'utilisateur">
                                </label>
                                <input id="inputImgUser" type="file" class="d-none" name="picture">
                            </div>

                            <div class="col-8 d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <label for="inputLastName">Nom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                        <input id="inputLastName" type="text" class="form-control" name="lastName" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="inputFirstName">Prénom</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                        <input id="inputFirstName" type="text" class="form-control" name="firstName" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <label for="inputTypePwd" class="form-label">Type de mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <select class="form-select selectTypePwd" id="inputTypePwd" name="typePwd">
                                        <option value="1">Texte</option>
                                        <option value="2">Code</option>
                                    </select>
                                </div>
                            </div>

                            <div class="textField">
                                <div class="col-12 mt-3">
                                    <label for="inputPwd" class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input id="inputPwd" type="password" class="form-control input-pwd" name="pwd" required>
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="inputConfirmPwd" class="form-label">Confirmation du mot de passe</label>
                                    <div class="input-group">
                                        <input id="inputConfirmPwd" type="password" class="form-control input-pwd" name="verifPwd" required>
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="codeField">
                                <div class="col-12 mt-3">
                                    <label for="inputPwd" class="form-label">Code</label>
                                    <div class="input-group">
                                        <input id="inputPwd" type="password" class="form-control input-pwd" name="pwd" pattern="[0-9]{4,6}" required>
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="inputConfirmPwd" class="form-label">Confirmation du code</label>
                                    <div class="input-group">
                                        <input id="inputConfirmPwd" type="password" class="form-control input-pwd" name="verifPwd" pattern="[0-9]{4,6}" required>
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Selection du type d'utilisateur -->
                            <div class="col-12 my-3">
                                <label class="form-label" for="inputRole">Rôle de l'utilisateur</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                    <select class="form-select" id="inputRole" name="role">
                                        <option value="student">Élève</option>
                                        <option value="educator">Educateur</option>
                                        <option value="educator-admin">Educateur administrateur</option>
                                        <option value="CIP">CIP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-2"></i>Annuler
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Valider
                                </button>
                            </div>
                        </div>  
                    </div>  
                </div>
            </form>
        </div>
    </div>



    <!-- Add Training-->
    <div class="modal fade" id="newTraining" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newTrainingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= $_SERVER ["REQUEST_URI"]?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addTraining">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newTrainingLabel">Ajouter formation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">     
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center align-items-center" style="height: 156px;">
                                <label for="inputImgTraining" class="h-100 d-flex align-items-center justify-content-center my-3">
                                    <img id="imgTraining" src="/assets/images/users/user.png" class="object-fit-contain mw-100 mh-100" style="cursor: pointer;" alt="Photo de la formation">
                                </label>
                                <input id="inputImgTraining" type="file" class="d-none" name="picture">
                            </div>
                            <div class="col-8">
                                <div class="">
                                    <label for="inputName" class="form-label">Nom de la formation</label>
                                    <input id="inputName" type="text" class="form-control" name="wording" required>
                                </div>
                                <div class="">
                                    <label for="inputLevel" class="form-label">Niveau de la formation</label>
                                    <input id="inputLevel" type="text" class="form-control" name="qualifLevel" required>
                                </div>
                            </div>
                            <div class="col-12 my-3">
                                <label for="inputDescription" class="form-label">Description Formation</label>                                        
                                <textarea class="form-control" id="inputDescription" rows="3" name="description" required></textarea>
                            </div>
                
                            <div class="modal-footer">
                                <button type="button" class="me-3 btn btn-danger" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-2"></i>Annuler
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Valider
                                </button>
                            </div>
                        </div>      
                    </div>  
                </div>
            </form>
        </div>  
    </div>

    <?php require("../app/views/modalAccount.php") ?>
       
</div>
<script>
    const currentUser = <?= json_encode($currentUser) ?>;
</script>


<?php
$content = ob_get_clean();

require("../app/views/layout.php");