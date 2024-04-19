<?php
$bsIcons = true;
$scripts = "<script src='/assets/js/ficheConsult.js' type='module'></script>";
$title = "Consultation fiche";

ob_start();
?>

<style>
    .div-img {
        height: 100px;
    }
</style>
<div class="container">
<div class="row mb-3 row-header">
    <div class="d-flex justify-content-between align-items-center px-0">
    <?php
        if ($_SESSION["role"]==="student"){
            \app\class\Breadcrumb::removeAfter('consultForm');
            \app\class\Breadcrumb::add('consultForm', 'Consulter fiche '. $form->numero, 'bi-search',"/fiche-".$form->numero."/consultation");
            echo \app\class\Breadcrumb::render();
        }else{
            \app\class\Breadcrumb::removeAfter('consultForm');
            \app\class\Breadcrumb::add('consultForm', 'Consulter fiche '. $form->numero, 'bi-search',"/etudiants" . "-" . $student->idUser . "/fiche-".$form->numero."/consultation");
            echo \app\class\Breadcrumb::render();
        }
        ?>
        <a href="/disconnect">
            <button class="btn btn-danger">
                <i class="bi bi-power me-2"></i>Se déconnecter
            </button>
        </a>
    </div>
</div>
    <div class="row" style="background-color: <?= $form->bgColor ?>;">
        <div id="divForm" class="">
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" id="form-form">
            <fieldset id="div-fsTitle" class="border p-2 pb-3 mt-3 mb-4 form-group">
                <legend class="text-center m-0">FICHE D'INTERVENTION N°<?= $form->numero ?></legend>
            </fieldset>
            <fieldset id="div-fsStudent" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label  class="form-label mb-0 pe-none d-none">Intervenant</label>
                </legend>
                <div class="container">
                    <div class="row">
                        <div id="div-studentLastName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="nomIntervenant" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Nom de l'intervenant</label>
                            <div class="div-input input-group">
                            <input id="nomIntervenant" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="text" 
                                <?php if ($form->studentLastName !== null): ?>
                                    value="<?= htmlentities($form->studentLastName) ?>"
                                <?php endif; ?>
                                name="studentLastName">
                            </div> 
                        </div>
                        <div id="div-studentFirstName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="prenomIntervenant" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Prénom de l'intervenant</label>
                            <div class="div-input input-group">
                            <input id="prenomIntervenant" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="text" 
                            <?php if ($form->studentFirstName !== null): ?>
                                value="<?= htmlentities($form->studentFirstName) ?>"
                            <?php endif; ?>
                            name="studentFirstName">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="div-fsApplication" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label  class="form-label mb-0 pe-none d-none">Demande</label>
                </legend>
                <div class="container">
                    <div class="row gy-4">
                        <div id="div-applicantName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="applicantName" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Nom du demandeur</label>
                            <div class="div-input input-group">
                            <input id="applicantName" class="form-control field <?= $form->finish || $_SESSION["role"] == "student" ? 'pe-none' : '' ?>" type="text" 
                                <?php if ( $form->applicantName !== null ): ?>
                                    value="<?= htmlentities($form->applicantName) ?>"
                                <?php endif; ?>
                                name="applicantName">
                            </div>
                        </div>
                        <div id="div-urgencyDegree" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="urgencyDegree" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Degré d'urgence</label>
                            <div class="div-input input-group">
                            <input id="urgencyDegree" class="form-control field <?= $form->finish || $_SESSION["role"] == "student" ? 'pe-none' : '' ?>" type="text" 
                            <?php if (!$form->finish && $_SESSION["role"] != "student"&& $form->urgencyDegree !== null): ?>
                                value="<?= htmlentities($form->urgencyDegree) ?>"
                            <?php endif; ?>
                            name="urgencyDegree">
                            </div>
                        </div>
                        <div id="div-applicationDate" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="applicationDate" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Date de la demande</label>
                            <div class="div-input input-group">
                            <input id="applicationDate" class="form-control field <?= $form->finish || $_SESSION["role"] == "student" ? 'pe-none' : '' ?>" type="date" 
                            <?php if ($form->applicationDate !== null): ?>
                                value="<?= htmlentities($form->applicationDate) ?>"
                            <?php endif; ?>
                            name="applicationDate">
                            </div>
                        </div>
                        <div id="div-location" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="location" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Localisation</label>
                            <div class="div-input input-group">
                            <input id="location" class="form-control field <?= $form->finish || $_SESSION["role"] == "student" ? 'pe-none' : '' ?>" type="text" 
                            <?php if ($form->location !== null): ?>
                                value="<?= htmlentities($form->location) ?>"
                            <?php endif; ?>
                            name="location">

                            </div>
                        </div>
                        <div id="div-description" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="description" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Description de la demande</label>
                            <div class="div-input input-group">
                            <textarea id="description" class="form-control field <?= $form->finish || $_SESSION["role"] == "student" ? 'pe-none' : '' ?>" rows="5" name="description"><?php if ($form->description !== null): ?><?= htmlentities($form->description) ?><?php endif; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="div-fsIntervention" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label  class="form-label mb-0 pe-none d-none">Intervention</label>
                </legend>
                <div class="container">
                    <div class="row gy-4">
                    <div id="div-interventionDate" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="interventionDate" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Date d'intervention</label>
                            <div class="div-input input-group">
                            <input id="interventionDate" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="date" 
                            <?php if ($form->interventionDate !==null): ?>
                                value="<?= htmlentities($form->interventionDate) ?>"
                            <?php endif; ?>
                            name="interventionDate">
                            </div>
                        </div>
                        <div id="div-interventionDuration" class="col-8 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="interventionDuration" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Durée d'intervention</label>
                            <div class="div-input input-group">
                            <input id="interventionDuration" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="time" 
                            <?php if ($form->interventionDuration !== null): ?>
                                value="<?= htmlentities(str_ireplace('h', ':', $form->interventionDuration)) ?>"
                            <?php endif; ?>
                            name="interventionDuration">
                            </div>
                        </div>
                        <div id="div-interventionValidation" class="col-4 d-flex flex-column justify-content-around position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="interventionValidation" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Validation</label>
                            <div class="div-input input-group">
                                <input id="interventionValidation" class="form-check-input field <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->interventionValidation ? "checked" : "" ?> type="checkbox" name="interventionValidation">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="div-fsMaintenanceType" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label  class="form-label mb-0 pe-none d-none">Type de maintenance</label>
                </legend>
                <div class="container">
                    <div class="row gy-2">
                        <div id="div-maintenanceAmeliorative" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenanceAmeliorative" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->maintenanceType===1 ? "checked" : "" ?> name="maintenanceType" type="radio" value="1">
                                <label for="maintenanceAmeliorative" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Améliorative</label>
                            </div>
                        </div>
                        <div id="div-maintenancePreventive" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenancePreventive" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->maintenanceType===2 ? "checked" : "" ?> name="maintenanceType" type="radio" value="2">
                                <label for="maintenancePreventive" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Préventive</label>
                            </div>
                        </div>
                        <div id="div-maintenanceCorrective" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenanceCorrective" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->maintenanceType===3 ? "checked" : "" ?> name="maintenanceType" type="radio" value="3">
                                <label for="maintenanceCorrective" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Corrective</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="div-fsInterventionNature" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label class="form-label mb-0 pe-none d-none">Nature de l'intervention</label>
                </legend>
                <div class="container">
                    <div class="row gy-2">
                        <div id="div-interventionLayout" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionLayout" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->interventionNature===1 ? "checked" : "" ?> name="interventionNature" type="radio" value="1">
                                <label for="interventionLayout" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Aménagements</label>
                            </div>
                        </div>
                        <div id="div-interventionFinition" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionFinition" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->interventionNature===2 ? "checked" : "" ?> name="interventionNature" type="radio" value="2">
                                <label for="interventionFinition" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Finitions</label>
                            </div>
                        </div>
                        <div id="div-interventionHealthFacility" class="col-12 d-flex justify-content-start position-relative p-2"s>
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionHealthFacility" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->interventionNature===3 ? "checked" : "" ?> name="interventionNature" type="radio" value="3">
                                <label for="interventionHealthFacility" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Sanitaires</label>
                            </div>
                        </div>
                        <div id="div-interventionElectricalInstallation" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionElectricalInstallation" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->interventionNature===4 ? "checked" : "" ?> name="interventionNature" type="radio" value="4">
                                <label for="interventionElectricalInstallation" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Installation électrique</label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="div-fsWork" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label class="form-label mb-0 pe-none d-none">Travaux</label>
                </legend>
                <div class="container">
                    <div class="row gy-4">
                    <div id="div-workDone" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="workDone" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Travaux réalisés</label>
                            <div class="div-input input-group">
                            <textarea id="workDone" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" rows="5" name="workDone"><?php if ($form->workDone !== null): ?><?= htmlentities($form->workDone) ?><?php endif; ?></textarea>
                            </div>
                        </div>
                        <div id="div-workNotDone" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="workNotDone" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Travaux non réalisés</label>
                            <div class="div-input input-group">
                            <textarea id="workNotDone" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" rows="5" name="workNotDone"><?php if ($form->workNotDone !== null): ?><?php echo htmlentities($form->workNotDone); ?><?php endif; ?></textarea>
                            </div>
                        </div>
                        <div id="div-newIntervention" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="newIntervention" class="form-check-input field my-0 me-2 <?= $form->finish ? 'pe-none' : '' ?>" <?= $form->newIntervention ? "checked" : "" ?> type="checkbox" name="newIntervention">
                                <label for="newIntervention" class="form-check-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Nécessite une nouvelle intervention</label>
                            </div>
                        </div>         
                    </div>
                </div>
            </fieldset>  
            <fieldset id="div-fsMaterials" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label  class="form-label mb-0 pe-none d-none">Matériaux</label>
                </legend>
                <?php
                    if(!$form->finish) {
                    ?>
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-rm-material" type="button" data-bs-toggle="modal" data-bs-target="#AddMaterialModal">
                        <i class="bi bi-plus-circle me-2"></i>Ajouter un matériau
                    </button>
                    </div>
                    <?php
                         }
                         ?>
                         <div id="impression"></div>
                    <div class="container div-materials" id="div-materials">
                    </div>
            </fieldset>
            <div id="btns-form" class="d-flex justify-content-end mb-3">
                <div class="flex-fill d-flex justify-content-center">
                    <button id="btn-print" class="btn btn-primary" type="button">
                        <i class="bi bi-printer me-2"></i>Imprimer
                    </button>
                </div>
                <?php 
                if(!$form->finish) {
                ?>
                <div class="d-flex">
                    <a href="<?= $_SERVER["REQUEST_URI"] ?>" class="me-3">
                        <button id="btn-cancel" class="btn btn-danger" type="button">
                            <i class="pe-2 bi bi-x-circle"></i>Annuler
                        </button>
                    </a>
                    <button id="btn-submit" class="btn btn-success" type="submit">
                        <i class="pe-2 bi bi-check-circle"></i>Valider
                    </button>
                </div>
                <?php    
                }
                ?>
            </div>
        </form>
        </div>
    </div>
</div>


<script>
    const elements = <?= json_encode($elements) ?>;
    const materials = <?= json_encode($materials) ?>;
</script>

<template id="template-materials-1">
    <?php
    foreach($materials as $material) {
    ?>
    <div class="row  border border-black border-2 rounded p-1 my-3 div-material">
        <div class="col-6 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src="<?= "/assets/images/materials/" . $material->picture ?>" class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <button class="btn btn-primary me-2" type="button" data-bs-toggle="collapse" data-bs-target="<?= "#collapse" . $material->idMaterial ?>"><i class="bi bi-info-circle"></i></button>
            <?php
            if(!$form->finish) {
            ?>
            <button class="btn btn-danger" type="button" data-material-id="<?= $material->idMaterial ?>"><i class="bi bi-trash"></i></button>
            <?php
            }
            ?>                
            <button class="btn btn-primary btn-audio-material ms-2" type="button"><i class="bi bi-volume-up"></i></button>
        </div>
        <div class="col-12 collapse p-2" id="<?= "collapse" . $material->idMaterial ?>">
            <div class="border border-black rounded p-2">
                <?= $material->description ?>
            </div>
        </div>
    </div>
    <?php } ?>
</template>

<template id="template-materials-2">
    <?php
    foreach($materials as $material) {
    ?>
    <div class="row border border-black border-2 rounded p-1 my-3 div-material">
        <div class="col-4 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src="<?= "/assets/images/materials/" . $material->picture ?>" class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-8 d-flex flex-column justify-content-evenly">
            <div class="d-flex justify-content-center div-label">
                <p class="mb-0 text-center div-label"><?= $material->wording ?></p>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary me-2" type="button" data-bs-toggle="collapse" data-bs-target="<?= "#collapse" . $material->idMaterial ?>"><i class="bi bi-info-circle"></i></button>
                <?php
                if(!$form->finish) {
                ?>
                <button class="btn btn-danger" type="button" data-material-id="<?= $material->idMaterial ?>"><i class="bi bi-trash"></i> </button>
                <?php
                }
                ?>                
                <button class="btn btn-primary btn-audio-material ms-2" type="button"><i class="bi bi-volume-up"></i></button>
            </div>
        </div>
        <div class="col-12 collapse p-2" id="<?= "collapse" . $material->idMaterial ?>">
            <div class="border border-black rounded p-2">
                <?= $material->description ?>
            </div>
        </div>
    </div>
    <?php } ?>
</template>

<template id="template-materials-3">
   <?php
    foreach($materials as $material) {
    ?>
    <div class="row border border-black border-2 rounded p-2 my-3 div-material">
        <div class="col-12 col-sm-8 d-flex justify-content-center div-label">
            <p class="mb-0 d-flex align-items-center justify-content-center text-center "><?= $material->wording ?></p>
        </div>
        <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center mt-2 mt-sm-0">
            <button class="btn btn-primary me-2 " type="button" data-bs-toggle="collapse" data-bs-target="<?= "#collapse" . $material->idMaterial ?>"><i class="bi bi-info-circle"></i></button>
            <?php
            if(!$form->finish) {
            ?>
            <button class="btn btn-danger" type="button" data-material-id="<?= $material->idMaterial ?>"><i class="bi bi-trash"></i></button>
            <?php
            }
            ?>
            <button class="btn btn-primary btn-audio-material ms-2" type="button"><i class="bi bi-volume-up"></i></button>
        </div>
        <div class="col-12 collapse p-2" id="<?= "collapse" . $material->idMaterial ?>">
            <div class="border border-black rounded p-2">
                <?= $material->description ?>
            </div>
        </div>
    </div>
    <?php } ?>
</template>
<template id="template-materials-1-add">
    <div class="row  border border-black border-2 rounded p-1 my-3 div-material">
        <div class="col-6 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src=" /assets/images/materials/exemple.png"  class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center material-buttons">
            <button class="btn btn-primary me-2 btn-information" type="button" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
            <button class="btn btn-danger" type="button" data-material-id=""><i class="bi bi-trash"></i></button>             
        </div>
        <div class="col-12 collapse p-2">
            <div class="border border-black rounded p-2 description">

            </div>
        </div>
    </div>
</template>
<template id="template-materials-2-add">
<div class="row  border border-black border-2 rounded p-1 my-3 div-material">
        <div class="col-4 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src="" class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-8 d-flex flex-column justify-content-evenly">
            <div class="d-flex justify-content-center div-label">
                <p class="mb-0 text-center"></p>
            </div>
            <div class="d-flex justify-content-center material-buttons">
                <button class="btn btn-primary me-2 btn-information" type="button" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
                <button class="btn btn-danger" type="button"  data-material-id="" ><i class="bi bi-trash"></i></button>            
            </div>
        </div>
        <div class="col-12 collapse p-2 "id="" >
            <div class="border border-black rounded p-2 description">
            </div>
        </div>
    </div>
</template>
<template id="template-materials-3-add">
<div class="row  border border-black border-2 rounded p-2 my-3 div-material">
        <div class="col-12 col-sm-8 d-flex justify-content-center div-label">
            <p class="mb-0 d-flex align-items-center justify-content-center text-center"></p>
        </div>
        <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center mt-2 mt-sm-0 material-buttons">
            <button class="btn btn-primary me-2 btn-information" type="button" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
            <button class="btn btn-danger" type="button"  data-material-id="" ><i class="bi bi-trash"></i></button>        
        </div>
        <div class="col-12 collapse p-2" >
            <div class="border border-black rounded p-2 description">
            </div>
        </div>
    </div>
</div>
</template>

<div class="modal fade" id="AddMaterialModal" tabindex="-1" aria-labelledby="AddMateriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddMateriaModalLabel">Ajouter un matériau</h5>
        <button type="button" class="btn-close btn-dissmis-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <select id="materialTypeFilter" class="form-select mb-2">
            <option value="">Tous</option>
            <?php foreach($types as $type) { ?>
                <option value="<?= $type ?>"><?= $type ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="materialNameSearch" placeholder="Rechercher par nom..." aria-label="Rechercher par nom" aria-describedby="button-search">
        </div>
        <?php foreach($allmaterials as $material) { ?>
            <div class="row border border-black material-list mb-3 mx-2 rounded" data-material-id="<?= $material->idMaterial ?>">
                <div class="col-4 d-flex justify-content-center align-items-center" style="height: 150px;">
                <img src="<?= "/assets/images/materials/" . $material->picture ?>" class="object-fit-contain mw-100 mh-100">
                </div>
                <div class="col-8 d-flex flex-column justify-content-evenly">
                    <div class="d-flex justify-content-center">
                        <p class="fs-6 mb-0 text-center"><?= $material->wording ?></p>
                    </div>
                </div>
            </div>
    <?php  
        } ?>
        <button type="button" class="btn btn-danger mt-2" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>


<script>
    var materialsA = <?php echo $jsonMaterials; ?>;
    var allMaterials = <?php echo $jsonAllMaterials; ?>;
    var finished = <?php echo $form->finish ?>
</script>
</div>
<?php
$content = ob_get_clean();
require("../app/views/layout.php");
?>


