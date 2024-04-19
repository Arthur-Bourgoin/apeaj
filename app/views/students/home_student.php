<?php $title = "Page Accueil Elève";
$bsIcons = true
?>
<?php ob_start(); 
\app\class\Breadcrumb::clear();
\app\class\Breadcrumb::add('Home', "Accueil", 'bi bi-house','/');
?>
<div class="container mt-5">
    <?php if(!empty($student)) { ?>
        <div class="row mb-4">
            <h1>Bienvenue <?=htmlentities($student->firstName)?> !</h1>
            <div class="d-flex justify-content-end align-items-end">
                <a href="/disconnect">
                    <button class="btn btn-danger">
                        <i class="bi bi-power me-2"></i> Se déconnecter
                    </button>
                </a>
            </div>
        </div>
    <?php } ?>
    <?php if(!empty($currentForms)) { ?>
        <div class="container-current mb-4">
            <div class="row align-items-center">
                <p class="col-lg-3 col-sm-5 col-6 m-0 fs-4">Fiches courantes</p>
                <hr class="border m-auto col-lg-9 col-sm-7 col-6 border-3 border-dark opacity-75" />
            </div>
            <div class="row">
                <?php foreach($currentForms as $form) { ?>
                    <div class="col-md-3 col-sm-4 col-6 text-center">
                        <i class="bi bi-file-earmark-text" style="font-size: 8rem;"></i>
                        <div>
                            <h4 class="col-12"><?=htmlentities($form->session->wording)?></h4>
                            <a href="fiche-<?=$form->form->numero?>">
                                <button type="button" class="btn btn-primary col-6 mt-2" title="Consulter la fiche en cours"><i class="bi bi-pencil-square"></i></button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php if(!empty($finishedForms)) { ?>
        <div class="container-finish mb-5 mt-2">
            <div class="row align-items-center">
                <p class="col-lg-3 col-sm-5 col-6 m-0 fs-4">Fiches terminées</p>
                <hr class="border m-auto col-lg-9 col-sm-7 col-6 border-3 border-dark opacity-75" />
            </div>
            <div class="row">
                <?php foreach ($finishedForms as $finish) { ?>
                    <div class="col-md-3 col-sm-4 col-6 text-center">
                        <i class="bi bi-file-earmark-text" style="font-size: 8rem;"></i>
                        <div>
                            <h4><?=htmlentities($finish->session->wording)?></h4>
                            <a href="fiche-<?=$finish->form->numero?>">
                                <button type="button" class="btn btn-primary col-6 mt-2" title="Consulter la fiche"><i class="bi bi-eye"></i></button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<?php 
$content = ob_get_clean();
require("../app/views/layout.php");