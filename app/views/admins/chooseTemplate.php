<?php
$title = "Modèles Fiche";
$bsIcons = true;
define("PATH_PDF",'./assets/pdf/templates/');
?>

<?php ob_start(); ?>
<div class="container my-5">
    <div class="row mb-5 align-items-center">
        <h2 class="col-3 m-0">Choix du modèle</h2>
        <hr class="border m-auto col-9 border-3 border-dark opacity-75" />
    </div>
    <div class="row">
        <?php

        // Stockage de la liste des fichiers pdf dans le dossier
        foreach ($formTemplates as $formTemplate) { 
        ?>
            <div class="container choose col-4">
                <div class="row pdf col-12 d-flex justify-content-center">
                    <div class="pdf col-8 position-relative p-0 m-5">
                        <embed src="<?=PATH_PDF.$formTemplate->form->numero?>.pdf#toolbar=0&view=Fit" type="application/pdf" width="100%" height="388rm">
                        <a href="<?=PATH_PDF.$formTemplate->form->numero?>.pdf" target="_blank">
                            <span class="zoom position-absolute top-100 start-100 translate-middle bg-primary rounded rounded-circle py-1 px-3"><i class="bi bi-eye text-white" style="font-size: 2.5rem;"></i></span>
                        </a>
                    </div>
                </div>
                <div class="row pdf col-12 mb-4 d-flex text-center">
                    <h5 class=""><?= $formTemplate->form->title ?></h5>
                </div> 
            </div>
        <?php
        }
        ?>
        <style>
            .choose:hover {
                background-color: #D4D4D4;
            }
            .zoom {
                transform: scale(1.5);
                transition: transform 0.3s ease;
            }
        </style>

    <!--
    <a href="/etudiants/<?= htmlentities($student->lastName) ?>-<?= htmlentities($student->firstName) ?>-<?= htmlentities($student->idUser) ?>/creer-fiche">
        <button type="button" class="btn btn-primary col-10 my-5">Choix du template</button>
    </a>
    <div class="div-test bg-success position-relative m-5">
        <p>tu texte ou un pdf</p>
        <span class="position-absolute top-100 start-100 translate-middle"><i class="bi bi-eye bg-primary rounded rounded-circle mx-3" style="font-size: 1.5rem;"></i></span>
    </div>
    -->

</div>

<?php $content = ob_get_clean();
require("../app/views/layout.php");
?>