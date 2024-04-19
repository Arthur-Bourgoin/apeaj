<?php
$title = "Page Information session";
$bsIcons = true;
$scripts = "<script src = '/assets/js/admin/details-session.js' type = 'module'></script>
<script src='/assets/js/account.js' type='module'></script>";
?>

<?php ob_start(); ?>
<div class="container">

<div class="row mx-0">
        <h2 class="text-center mt-3">
         <?= !empty($session) ? htmlentities($session->wording) : "" ?>
        </h2>
        <div class="d-flex justify-content-between align-items-center px-0">
            <div>
                <?php
                    \app\class\Breadcrumb::removeAfter('infoSession');
                    \app\class\Breadcrumb::add('infoSession', $session->wording,'bi-folder', "/sessions-".$session->idSession);
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

<div class="mt-2">
    <?= app\class\Feedback::getMessage() ?>
</div>

<div class="row mx-0 mt-2 my-3">
    <div class="form-floating px-0">
        <div class="form-control" id="descriptionSession">
            <?= htmlentities($session->description) ?>
        </div>
        <label for="descriptionSession">Description</label>
    </div>
</div>

<div class="row mx-0 mb-4">
    <div class="d-flex align-items-center justify-content-start px-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalModifierSession" title="Modifier la session">
            <i class="bi bi-pencil"></i>
        </button>
        <?php if(isset($_SESSION["role"]) && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])) { ?>
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="ms-3">
                <button type="submit" class="btn btn-primary btn-delete-session " title="Supprimer la session"><i class="bi bi-trash"></i></button>
                <input type="hidden" name="action" value="deleteSession">
                <input type="hidden" name="idSession" value="<?= $session->idSession ?>">
            </form>
        <?php } ?>
        <?php
        if (!empty($session) && $session->state === 2 && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])) { ?>
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="ms-3">
                <button type="submit" class="btn btn-primary btn-close-session" title="Fermer la session"> <i class="bi bi-x-lg"></i></button>
                <input type="hidden" name="action" value="closeSession">
                <input type="hidden" name="idSession" value="<?= $session->idSession ?>">
            </form>
        <?php  }elseif(!empty($session) && $session->state === 1 && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])){ ?>
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="ms-3">
                <button type="submit" class="btn btn-primary btn-re-open-session " title="Ouvrir la session"> <i class="bi bi-key"></i> </button>
                <input type="hidden" name="action" value="reOpenSession">
                <input type="hidden" name="idSession" value="<?= $session->idSession ?>">
            </form>
        <?php } 
        if (!empty($session) && $session->state === 2 && strtotime($session->timeBegin) > time()  && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])) { ?>
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="ms-3">
                <button type="submit" class="btn btn-primary btn-plan-session " title="Planifier la session"> <i class="bi bi-calendar-check "></i></button>
                <input type="hidden" name="action" value="planSession">
                <input type="hidden" name="idSession" value="<?= $session->idSession ?>">
            </form>
        <?php  }elseif(!empty($session) && $session->state === 3 && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])){ ?>
            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="ms-3">
                <button type="submit" class="btn btn-primary btn-unplan-session " title="Supprimer la planification de session"> <i class="bi bi-calendar-x "></i> </button>
                <input type="hidden" name="action" value="unPlanSession">
                <input type="hidden" name="idSession" value="<?= $session->idSession ?>">
            </form>
        <?php } ?>
    </div>
</div>

<div class="row">
    <?php 
    if( !empty($forms)){
        foreach ($forms as $form) { ?>
            <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <a title="Consulter la fiche"
                            href="/etudiants-<?= htmlentities($form->student->idUser) ?>/fiche-<?= htmlentities($form->form->numero) ?>">
                            <i class="bi bi-file-earmark-text" style="font-size: 5rem;"></i>
                        </a>
                        <h5 class="card-title mt-3">
                            <?= htmlentities($form->student->lastName . " " . $form->student->firstName) ?>
                        </h5>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
    <?php if (!empty($session) && $session->state !== 1 && in_array($_SESSION["role"], ["educator-admin", "super-admin"])){ ?>
        <div class="col-6 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#NewFormForStudent">
                        <i class="bi bi-plus-circle" style="font-size: 5rem;"></i>
                    </a>
                    <h5 class="card-title mt-3">Ajouter une fiche</h5>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="ModalModifierSession" tabindex="-1" aria-labelledby="ModalModifierSessionLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalModifierSessionLabel">Modifier la session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="action" name="action" value="updateSession">
                        <input type="hidden" class="form-control" id="idSession" name="idSession"
                            value="<?= $session->idSession ?>">
                        <input type="hidden" class="form-control" id="idTraining" name="idTraining" value=1>
                        <label for="sessionName" class="form-label">Nom de la session</label>
                        <input type="text" class="form-control" id="sessionName" name="wording"
                            value="<?= htmlentities($session->wording) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="theme" class="form-label">Thème</label>
                        <input type="text" class="form-control" id="theme" name="theme"
                            value="<?= htmlentities($session->theme) ?>" required>
                    </div>
                    <?php if ($session->state === 2) { ?>
                        <div class="mb-3">
                            <label for="startTime" class="form-label">Date/Heure de début</label>
                            <input type="datetime-local" class="form-control" id="startTime" name="timeBegin"
                                value="<?= htmlentities($session->timeBegin) ?>" required>
                            <!-- Affichage de la date de début modifiable si la date de fin n'est pas définie -->
                        </div>
                    <?php } else { ?>
                        <div class="mb-3">
                            <label for="startTime-readonly" class="form-label">Date/Heure de début</label>
                            <input type="datetime-local" class="form-control" id="startTime-readonly" name="timeBegin"
                                value="<?= htmlentities($session->timeBegin) ?>" readonly required>
                            <!-- Rendre la date de début non modifiable si la date de fin est définie -->
                        </div>
                    <?php } ?>
                    <?php if ($session->state === 1) { ?>
                        <div class="mb-3">
                            <label for="endTime-readonly" class="form-label">Date/Heure de fin</label>
                            <input type="datetime-local" class="form-control" id="endTime-readonly" name="timeEnd"
                                value="<?= htmlentities($session->timeEnd) ?>" readonly>
                            <!-- Affichage de la date de fin dans un champ 'readonly' si elle est définie -->
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description"
                            name="description" required><?= htmlentities($session->description) ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel btn-danger me-2" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-2"></i>Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="NewFormForStudent" tabindex="-1" aria-labelledby="NewFormForStudentLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewFormForStudentLabel">Liste des étudiants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr class="tr-body" data-id="<?= $student->idUser ?>">
                                <td>
                                    <?= htmlentities($student->lastName) ?>
                                </td>
                                <td>
                                    <?= htmlentities($student->firstName) ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    const currentUser = <?= json_encode($currentUser) ?>;
</script>

<?php
require("../app/views/modalAccount.php");
$content = ob_get_clean();
require("../app/views/layout.php");
?>