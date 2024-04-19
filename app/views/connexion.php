<?php

$title = "Page de connexion";
$scripts = "<script src='/assets/js/connexion.js' type='module'></script>";
$bsIcons = true ?>

<?php ob_start(); ?>

<style>
.div-img {
        height: 300px;
    }
</style>
<div class="container">
    <div class="row mb-4">
        <h1 class="text-center">Sélectionner un profil</h1>
        <div class="d-flex justify-content-between px-0">
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                <input type="hidden" name="action" value="disconnectTraining">
                <button class="btn btn-primary">
                    <i class="bi bi-arrow-left-circle me-2"></i>Retour
                </button>
            </form>
            <button class="btn btn-primary" id="btn-admin" data-bs-toggle="modal" data-bs-target="#modalConnexionAdmin">
            <i class="bi bi-person-lock me-2"></i>Éducateur
            </button>
        </div>        
    </div>

    <?= app\class\Feedback::getMessage() ?>

<?php
    if(isset($error)) {
        switch($error) {
            case 1:
                echo "<div class='alert alert-danger'>Une erreur s'est produite lors de l'affichage de la liste des utilisateurs.</div>"; break;
            case 2:
                echo "<div class='alert alert-danger'>Identifiant ou mot de passe incorrect.</div>"; break;
            case 3:
                echo "<div class='alert alert-danger'>Une erreur s'est produite lors de la requête d'authentification.</div>"; break;
        }
    }
    ?>
    <div class="row g-4 mb-4"> 
    <?php 
    if(is_array($students)) {
        foreach ($students as $student) { 
            echo $student->getCardConnexion();
        } 
    }
    ?>
    </div>
</div>


<!-- Modal de connexion de type "texte" -->
<div class="modal fade" id="modalConnexionTexte" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <img class="studentPicture img-thumbnail w-50" alt="Photo de l'étudiant">
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="d-flex flex-column align-items-center w-100">
                    <input type="hidden" name="inputLogin" class="loginStudent">
                    <input type="hidden" name="action" value="verifLogin">
                        <div class="input-group my-4 w-75">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" name="inputPwd" placeholder="Votre mot de passe">
                            <button type="button" class="btn btn-dark btn-show"><i class="bi bi-eye"></i></button>
                        </div>
                    <div class="row d-flex justify-content-center w-100">
                        <button type="button" class="btn btn-danger col-4 me-2" data-bs-dismiss="modal"><i class="pe-2 bi bi-x-circle"></i>Annuler</button>
                        <button type="submit" class="btn btn-success col-4 ms-2"><i class="pe-2 bi bi-check-circle"></i>Se connecter</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal de connexion de type "code numérique" -->
<div class="modal fade" id="modalConnexionCode" tabindex="-1" role="dialog" aria-labelledby="modalConnexionCodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img class="studentPicture img-thumbnail w-50" alt="Photo de l'étudiant">
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="d-flex flex-column align-items-center">
                    <input type="hidden" name="inputLogin" class="loginStudent">
                    <input type="hidden" name="action" value="verifLogin">
                    <div class="input-group my-4 w-75">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control text-center login-code" placeholder="Code numérique" name="inputPwd" pattern="[0-9]{4,6}"/>
                        <button type="button" class="btn btn-show btn-dark"><i class="bi bi-eye"></i></button>
                    </div>
                    <div class="row g-2">
                        <div>
                            <button type="button" class="btn-number col-3 btn btn-dark">1</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">2</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">3</button>
                        </div>
                        <div>
                            <button type="button" class="btn-number col-3 btn btn-dark">4</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">5</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">6</button>
                        </div>
                        <div>
                            <button type="button" class="btn-number col-3 btn btn-dark">7</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">8</button>
                            <button type="button" class="btn-number col-3 btn btn-dark">9</button>
                        </div>
                        <div>
                            <button type="button" class="btn-eraser btn btn-danger col-3"><i class="bi bi-eraser text-white"></i></button>
                            <button type="button" class="btn-number col-3 btn btn-dark">0</button>
                            <button type="submit" class="btn btn-success col-3"><i class="bi bi-check text-white"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal de connexion Admin-->
<div class="modal fade" id="modalConnexionAdmin" tabindex="-1" role="dialog" aria-labelledby="modalConnexionAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Photo de l'étudiant -->
                <img class="adminPicture img-thumbnail w-50" alt="Icone de l'admin">
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="d-flex flex-column align-items-center w-100">
                    <input type="hidden" name="action" value="verifLogin">
                    <div class="input-group w-75 my-3">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input id="loginAdmin" type="texte" class="form-control" placeholder="Votre login" name="inputLogin">
                    </div>

                    <div class="divChange divAdminText d-flex flex-column align-items-center w-100 d-none">
                        <div class="input-group w-75 mb-3">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" placeholder="Votre mot de passe">
                            <button type="button" class="btn btn-show btn-dark"><i class="bi bi-eye"></i></button>
                        </div>
                        <div class="row d-flex justify-content-center w-100">
                            <button type="button" class="btn btn-danger col-4 me-2" data-bs-dismiss="modal"><i class="pe-2 bi bi-x-circle"></i>Annuler</button>
                            <button type="submit" class="btn btn-success col-4 ms-2"><i class="pe-2 bi bi-check-circle"></i>Se connecter</button>
                        </div>
                    </div>

                    <div class="divChange divAdminCode d-flex flex-column align-items-center d-none">
                        <div class="input-group w-75 mb-3">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control pe-none text-center login-code" placeholder="Code numérique"/>
                            <button type="button" class="btn btn-show btn-dark"><i class="bi bi-eye"></i></button>
                        </div>
                        <div class="row g-2">
                            <div>
                                <button type="button" class="btn-number col-3 btn btn-dark">1</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">2</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">3</button>
                            </div>
                            <div>
                                <button type="button" class="btn-number col-3 btn btn-dark">4</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">5</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">6</button>
                            </div>
                            <div>
                                <button type="button" class="btn-number col-3 btn btn-dark">7</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">8</button>
                                <button type="button" class="btn-number col-3 btn btn-dark">9</button>
                            </div>
                            <div>
                                <button type="button" class="btn-eraser btn-danger col-3 btn"><i class="bi bi-eraser text-white"></i></button>
                                <button type="button" class="btn-number col-3 btn btn-dark">0</button>
                                <button type="submit" class="btn btn-success col-3"><i class="bi bi-check text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const studentsTab = <?= json_encode($students) ?>;
    const adminsTab = <?= json_encode($admins) ?>;
</script>

<?php 
$content = ob_get_clean();
require("layout.php");