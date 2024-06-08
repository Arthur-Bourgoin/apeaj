<?php
$bsIcons = true;
$title = "Consultation Formation";
$scripts = "<script src='./assets/js/sadmin/formation.js' type='module'></script>
            <script src='./assets/js/account.js' type='module'></script>";
ob_start();
?>

<div class="container">
    <div class="mx-0 d-flex align-items-center justify-content-between">
        <div>
            <?php
                \app\class\Breadcrumb::removeAfter('Formation');
                \app\class\Breadcrumb::add('Formation', $training->wording, 'bi bi-book', '/formation-'.$training->idTraining);
                echo \app\class\Breadcrumb::render();
            ?>
        </div>
        
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


    <?= app\class\Feedback::getMessage() ?>

    <?php if(!empty($training)) { ?>
        <div class="row mx-0 mt-2 border border-2 border-black rounded py-2">
            <div class="col-5 col-lg-4 d-flex justify-content-center align-items-center my-2" style="height: 200px;">
                <img src="<?= htmlentities($training->picture) ?>" class="object-fit-contain mw-100 mh-100" alt="Image formation">
            </div>
            <div class="col-7 col-lg-3 d-flex flex-column justify-content-evenly align-items-center mb-2">
                <div>
                    <span>Niveau de qualification</span>
                    <div class="border rounded mt-2 p-2"><?= htmlentities($training->qualifLevel)?></div>
                </div>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateTraining">
                        <i class="bi bi-pencil-square me-2"></i>Modification
                    </button>
                </div>
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                    <input type="hidden" name="action" value="deleteTraining">
                    <input type="hidden" name="idTraining" value="<?= htmlentities($training->idTraining) ?>">
                    <button type="submit" class="btn btn-primary btn-removed-training">
                        <i class="bi bi-trash me-2"></i>Suppression
                    </button>
                </form>
            </div>
            <div class="col-12 col-lg-5 d-flex flex-column mb-2">
                <span>Description de la formation</span>  
                <div class="border rounded h-100 mt-2 p-2"><?= htmlentities($training->description)?></div>
            </div>
        </div>
    <?php } ?>

    <div class="row mx-0">
      <div class="d-flex justify-content-between p-0 mt-4">
        <button id="btn-newUser" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUser"> 
          <i class="bi bi-person-plus-fill me-2"></i>Nouvel utilisateur
        </button>
      </div>
    </div>

    <div class="row mx-0">
      <div class="d-flex justify-content-between p-0 my-4">
        <div class="fw-bold fs-4">Liste des éducateurs de la formation</div>
      </div>
    </div>
    <!-- Liste des educateur de la formation -->
    <div class="row g-3">
      <?php
      if(is_array($admins)) {
        foreach($admins as $admin) {
          echo $admin->getCardTemplateSAdmin();
        }
      }
      ?>
    </div>

    <!-- Liste des étudiants de la formation -->
    <div class="row mx-0">
      <div class="d-flex justify-content-between p-0 my-4">
        <div class="fw-bold fs-4">Liste des étudiants de la formation</div>
      </div>
    </div>

    <div class="row g-3 mb-4">
      <?php
      if(is_array($students)) {
        foreach($students as $student) {
          echo $student->getCardTemplateSAdmin();
        }
      }
      ?>
    </div>

    
    <div class="modal fade" id="updateTraining" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newTrainingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= $_SERVER["REQUEST_URI"]?>" method="POST">
                <input type="hidden" name="action" value="updateTraining">
                <input type="hidden" name="idTraining" value="<?= $training->idTraining ?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newTrainingLabel">Ajouter formation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">     
                        <div class="row">
                            <!--Selection de l'image -->
                            <div class="col-4">
                                <label for="inputImgTraining">
                                    <img id="imgTraining" src="<?= $training->picture ?>" class="w-100 border border-black border-2 rounded" alt="Photo de la formation">
                                </label>
                                <input id="inputImgTraining" type="file" class="d-none" name="imgTraining">
                            </div>   
                            <div class="col-8">
                                <div class="">
                                    <label for="inputName" class="form-label">Nom de la formation</label>
                                    <input id="inputName" type="text" class="form-control" name="wording" value="<?= htmlentities($training->wording) ?>" required>
                                </div>
                                <div class="">
                                    <label for="inputLevel" class="form-label">Niveau de la formation</label>
                                    <input id="inputLevel" type="text" class="form-control" name="qualifLevel" value="<?= htmlentities($training->qualifLevel) ?>" required>
                                </div>
                            </div>
                            <div class="col-12 my-3">
                                <label for="inputDescription" class="form-label">Description Formation</label>                                        
                                <textarea class="form-control" id="inputDescription" rows="3" name="description" required><?= htmlentities($training->description) ?></textarea>
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

    <!-- Modal ajout utilisateur-->
    <div class="modal fade" id="newUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= $_SERVER["REQUEST_URI"]?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addUser">
                <input type="hidden" name="idTraining" value="<?= $training->idTraining ?>">
                    
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUserLabel">Ajouter utilisateur</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center align-items-center" style="height: 156px;">
                                <label for="inputImgUserAdd" class="h-100 d-flex align-items-center justify-content-center my-3">
                                    <img id="imgUserAdd" class="object-fit-contain mw-100 mh-100" style="cursor: pointer;" alt="Image de l'utilisateur">
                                </label>
                                <input id="inputImgUserAdd" type="file" class="d-none" name="picture">
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
                                    <label for="inputPwdText" class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input id="inputPwdText" type="password" class="form-control input-pwd" name="pwd" required>
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="inputConfirmPwd" class="form-label">Confirmation du mot de passe</label>
                                    <div class="input-group">
                                        <input id="inputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd" required>
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
                                        <input id="inputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd" pattern="[0-9]{4,6}" required>
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

    
    <!-- Modal modifier utilisateur-->
    <div class="modal fade" id="updateUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= $_SERVER["REQUEST_URI"]?>" method="POST">
                <input type="hidden" name="action" value="updateAdmin">
                <input id="idUser" type="hidden" name="idUser">
                <input type="hidden" name="idTraining" value="<?= $training->idTraining ?>">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUserLabel">Ajouter utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="inputImgUserUpdate">
                                    <img id="imgUserUpdate" class="w-100 border" alt="Image de l'utilisateur">
                                </label>
                                <input id="inputImgUserUpdate" type="file" class="d-none" name="picture">
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
                                        <input id="inputPwd" type="password" class="form-control input-pwd" name="pwd">
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="inputConfirmPwd" class="form-label">Confirmation du mot de passe</label>
                                    <div class="input-group">
                                        <input id="inputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd">
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="codeField">
                                <div class="col-12 mt-3">
                                    <label for="inputPwd" class="form-label">Code</label>
                                    <div class="input-group">
                                        <input id="inputPwd" type="password" class="form-control input-pwd" name="pwd" pattern="[0-9]{4,6}">
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="inputConfirmPwd" class="form-label">Confirmation du code</label>
                                    <div class="input-group">
                                        <input id="inputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd" pattern="[0-9]{4,6}">
                                        <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-3">
                                <label class="form-label" for="inputRole">Rôle de l'utilisateur</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                    <select class="form-select selectRole" id="inputRole" name="role">
                                        <option value="student">Élève</option>
                                        <option value="educator">Educateur</option>
                                        <option value="educator-admin">Educateur administrateur</option>
                                        <option value="CIP">CIP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-danger me-2 btn-cancel" data-bs-dismiss="modal">
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
    const adminsTab = <?= json_encode($admins) ?>;
    const currentUser = <?= json_encode($currentUser) ?>;
</script>


<?php
$content = ob_get_clean(); //On récupère le contenu bufferisé

require("../app/views/layout.php");