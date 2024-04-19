<?php
$title = "Page Information Elève";
$bsIcons = true;
$scripts = "<script src='/assets/js/admin/details.js' type = 'module'></script>
<script src='/assets/js/account.js' type='module'></script>";
ob_start(); ?>
<style>
    .comment-container:hover {
        background-color: lightgray;
        cursor: pointer;
    }
</style>

<div class="container ">
    <div class="row mx-0">
        <div class="d-flex justify-content-between align-items-center px-0">
            <div>
                <?php
                    if(\app\class\Breadcrumb::contains('infoForm')){
                        \app\class\Breadcrumb::removeAfter('createForm');
                        \app\class\Breadcrumb::removeAfter('infoForm');
                        \app\class\Breadcrumb::removeAfter('Student');
                        \app\class\Breadcrumb::add('Student', $student->firstName . " " . $student->lastName,'bi-person-fill', "/etudiants"  . "-" . $student->idUser);
                    }else{
                        \app\class\Breadcrumb::removeAfter('createForm');
                        \app\class\Breadcrumb::removeAfter('Student');
                        \app\class\Breadcrumb::add('Student', $student->firstName . " " . $student->lastName,'bi-person-fill', "/etudiants"  . "-" . $student->idUser);
                    }
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
    </div>
    <div class="row mb-4 mx-0">
        <div class="col-3 mt-3 mr-3 px-0">
        <?php if (!empty($student)) { ?>
            <img src="<?= $student->picture ?>" class="img-thumbnail" alt="Photo de l'étudiant 1"> 
        <?php } ?>
        </div>
        <div class="col-9">
            <div class="row mt-3 ms-3 align-items mx-0">
                <?php if (!empty($student)) { ?>
                <div class="col-12 my-3">
                    <h2>
                        <?= htmlentities($student->lastName) ?>
                        <?= htmlentities($student->firstName) ?>
                    </h2>
                </div>
                <div class="col-12 my-3 ">
                    <h5>
                        login: <?= htmlentities($student->login) ?>
                    </h5>
                </div>
                <?php } ?>
                <div class = "row mx-0">
                    <div class = "col-12 col-sm-12 col-md-12">
                        <?php if(isset($_SESSION["role"]) && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])) { ?>
                        <button type="button" class="btn btn-primary me-2 button-update" data-bs-toggle="modal" data-bs-target="#ModalModifie">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <a href="/etudiants-<?=$student->idUser?>/creer-fiche" class="btn btn-primary me-2">
                            <i class="bi bi-file-earmark-plus"></i>
                        </a>
                        <?php } ?>
                        <a href=<?= $_SERVER["REQUEST_URI"] . "/progression" ?> class="btn btn-primary">
                            <i class="bi bi-graph-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= app\class\Feedback::getMessage() ?>

    <?php if (!empty($comments) && is_array($comments)){ ?>
    <div class="row mx-0">
        <h2 class="px-0">Commentaires</h2>
        <?php
        $foundId = false;
        foreach ($comments as $com) {
            echo $com->getTemplateCommentStudent();
            if ($com->educator->idUser === $_SESSION["id"]) {
                $foundId = true;
            }
        }
        ?>
    </div>
    <?php 
    }else
        $foundId = false;
     ?>
    <?php if (!$foundId) { ?>
        <div class="row d-flex mb-3 mx-0">
            <div class="px-0">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalComs">
                    <i class="bi bi-chat-left-text me-2"></i>Nouveau commentaire
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="row mt-2 mx-0">
        <h2 class="px-0">Historique des fiches</h2>
    </div>
    <?php if (!empty($plannedForms)){ ?>
    <div class="row mx-0">
        <h5 class="px-0">Sessions planifiées</h5>
        <?php foreach($plannedForms as $form) { 
            if($form->session->state === 3){ ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
            <a href="/etudiants-<?= htmlentities($form->form->idStudent) ?>/fiche-<?= htmlentities($form->form->numero) ?>">
                <i class="bi bi-file-earmark-text" style="font-size: 5rem"></i>
            </a>
            <div class="col">
                <?= htmlentities($form->session->wording) ?>
            </div>
        </div>
        <?php } }?>
    </div>
    <?php } ?>
    <?php if (!empty($currentForms)){ ?>
    <div class="row mx-0">
        <h5 class="px-0">Sessions courantes</h5>
        <?php foreach($currentForms as $form) { 
            if($form->session->state === 2){ ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
            <a href="/etudiants-<?= htmlentities($form->form->idStudent) ?>/fiche-<?= htmlentities($form->form->numero) ?>">
                <i class="bi bi-file-earmark-text" style="font-size: 5rem"></i>
            </a>
            <div class="col">
                <?= htmlentities($form->session->wording) ?>
            </div>
        </div>
        <?php } }?>
    </div>
    <?php } 
    if (!empty($finishedForms && is_array($finishedForms))){ ?>
    <div class="row mx-0">
        <h5 class="px-0">Sessions terminées</h5>
        <?php
        foreach ($finishedForms as $finishedForm) { ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-3">
                <a
                    href="/etudiants-<?= htmlentities($finishedForm->form->idStudent) ?>/fiche-<?= htmlentities($finishedForm->form->numero) ?>"><i
                        class="bi bi-file-earmark-text" style="font-size: 5rem"></i></a>
                <div>
                    <?= $finishedForm->session->wording ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<!-- Modal update utilisateur-->
<div class="modal fade" id="ModalModifie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UpdateUserLabel" aria-hidden="true" data-type-pwd="<?= htmlentities($student->typePwd) ?>">
    <div class="modal-dialog">
        <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
            <input type="hidden" id="idUser" name="idUser" value=<?= $student->idUser ?> />
            <input type="hidden" name="action" value="updateUser" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserLabel">Modifier utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="inputImgUser">
                                <img id="imgUser" src=<?= $student->picture ?> class="w-100 border" alt="Image de l'utilisateur">
                            </label>
                            <input id="inputImgUser" type="file" class="d-none" name="picture">
                        </div>

                        <div class="col-8 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <label for="inputLastName">Nom</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input id="inputLastName" type="text" class="form-control" name="lastName"
                                        value="<?= htmlentities($student->lastName) ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputFirstName">Prénom</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input id="inputFirstName" type="text" class="form-control" name="firstName"
                                        value="<?= htmlentities($student->firstName) ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="inputTypePwd" class="form-label">Type de mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <select class="form-select selectTypePwd" id="inputTypePwd" name="typePwd">
                                    <option value="1" <?= $student->typePwd === 1 ? 'selected' : "" ?>> Texte </option>
                                    <option value="2" <?= $student->typePwd === 2 ? "selected" : "" ?>> Code </option>
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
                                    <input id="inputVerifPwd" type="password" class="form-control input-pwd"
                                        name="verifPwd">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="codeField">
                            <div class="col-12 mt-3">
                                <label for="inputPwd" class="form-label">Code</label>
                                <div class="input-group">
                                    <input id="inputPwd" type="password" class="form-control input-pwd" name="pwd"
                                        pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="inputConfirmPwd" class="form-label">Confirmation du code</label>
                                <div class="input-group">
                                    <input id="inputVerifPwd" type="password" class="form-control input-pwd"
                                        name="verifPwd" pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center mt-2">
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
<div class="modal fade" id="ModalComs" tabindex="-1" aria-labelledby="ModalComs" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
        <input type="hidden" id="idStudent" name="idStudent" value="<?= $student->idUser ?>" />
        <input type="hidden" name="action" value="addComment" />
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddComment">Ajouter un commentaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" col-12 ">
                    <label for="Formtext" class="form-label pe-none">Contenu</label>
                    <textarea class=" form-control" id="Formtext" name="text" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel btn-danger me-2" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-2"></i>Valider
                </button>
            </div>
        </div>
    </form>
    </div>
</div>

<div class="modal fade" id="ModalUpdateComs" tabindex="-1" aria-labelledby="ModalUpdateComs" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
        <input type="hidden" name="action" value="updateComment" />
        <input type="hidden" id="idStudent" name="idStudent" value="<?= $student->idUser ?>" />
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateComment">Modifier un commentaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" col-12 ">
                    <label for="formText" class="form-label pe-none">Contenu</label>
                    <textarea class=" form-control" id="formText" name="text" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel btn-danger me-2" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-2"></i>Valider
                </button>
            </div>
        </div>
    </form>
    </div>
</div>

<?php 
    require("../app/views/modalAccount.php");
?>
<script>
    const commentsStudentTab = <?= json_encode($comments) ?>;
    const currentUser = <?= json_encode($currentUser) ?>;
    const student =<?= json_encode($student) ?>;
</script>

<?php $content = ob_get_clean();
require("../app/views/layout.php");
?>