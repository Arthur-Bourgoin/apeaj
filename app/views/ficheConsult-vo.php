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
<div class="row mb-3">
    <div class="d-flex justify-content-between align-items-center px-0">
        <?php
        if ($_SESSION["role"]==="student"){
            \app\class\Breadcrumb::removeAfter('consultForm');
            \app\class\Breadcrumb::add('consultForm', 'Consulter fiche '. $form->numero, "/fiche-".$form->numero."/consultation", 'bi-search');
            echo \app\class\Breadcrumb::render();
        }else{
            \app\class\Breadcrumb::removeAfter('consultForm');
            \app\class\Breadcrumb::add('consultForm', 'Consulter fiche '. $form->numero, "/etudiants" . "-" . $student->idUser . "/fiche-".$form->numero."/consultation", 'bi-search');
            echo \app\class\Breadcrumb::render();
        }
        ?>
        <div>
            <a href="/disconnect">
                <button class="btn btn-danger">
                    <i class="bi bi-power me-2"></i> Se déconnecter
                </button>
            </a>            
        </div>
    </div>
</div>
    <div class="row" style="background-color: <?= $form->bgColor ?>;">
        <div id="divForm" class="">
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
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
                                <input id="nomIntervenant" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="text" value="<?= htmlentities($form->studentLastName) ?>" name="studentLastName">
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-nomIntervenant"><i class="bi bi-mic-fill"></i></button>
                            </div>
                        </div>
                        <div id="div-studentFirstName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="prenomIntervenant" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Prénom de l'intervenant</label>
                            <div class="div-input input-group">
                                <input id="prenomIntervenant" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="text" value="<?= htmlentities($form->studentFirstName) ?>" name="studentFirstName">
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-prenomIntervenant"><i class="bi bi-mic-fill"></i></button>
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
                                <input id="applicantName" class="form-control field <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>" type="text" value="<?= htmlentities($form->applicantName) ?>" name="applicantName">
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-applicantName"><i class="bi bi-mic-fill"></i></button>
                            </div>
                        </div>
                        <div id="div-urgencyDegree" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="urgencyDegree" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Degré d'urgence</label>
                            <div class="div-input input-group">
                                <input id="urgencyDegree" class="form-control field <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>" type="text" value="<?= htmlentities($form->urgencyDegree) ?>" name="urgencyDegree">
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-urgencyDegree"><i class="bi bi-mic-fill"></i></button>
                            </div>
                        </div>
                        <div id="div-applicationDate" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="applicationDate" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Date de la demande</label>
                            <div class="div-input input-group">
                                <input id="applicationDate" class="form-control field <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>" type="date" value="<?= htmlentities($form->applicationDate) ?>" name="applicationDate">
                            </div>
                        </div>
                        <div id="div-location" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="location" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Localisation</label>
                            <div class="div-input input-group">
                                <input id="location" class="form-control field <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>" type="text" value="<?= htmlentities($form->location) ?>" name="location">
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-location"><i class="bi bi-mic-fill"></i></button>
                            </div>
                        </div>
                        <div id="div-description" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="description" class="form-label mb-0 d-none <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>">Description de la demande</label>
                            <div class="div-input input-group">
                                <textarea id="description" class="form-control field <?= $form->finish || $_SESSION["role"]=="student" ? 'pe-none' : '' ?>" rows="5" name="description"><?= htmlentities($form->description) ?></textarea>
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-description"><i class="bi bi-mic-fill"></i></button>
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
                                <input id="interventionDate" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="date" value="<?= htmlentities($form->interventionDate) ?>"name="interventionDate">
                            </div>
                        </div>
                        <div id="div-interventionDuration" class="col-8 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="interventionDuration" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Durée d'intervention</label>
                            <div class="div-input input-group">
                                <input id="interventionDuration" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" type="time" value="<?= htmlentities(str_ireplace('h', ':', $form->interventionDuration)) ?>" name="interventionDuration">
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
                                <textarea id="workDone" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" rows="5" name="workDone"><?= htmlentities($form->workDone) ?></textarea>
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-workDone"><i class="bi bi-mic-fill"></i></button>
                            </div>
                        </div>
                        <div id="div-workNotDone" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
                            </div>
                            <label for="workNotDone" class="form-label mb-0 d-none <?= $form->finish ? 'pe-none' : '' ?>">Travaux non réalisés</label>
                            <div class="div-input input-group">
                                <textarea id="workNotDone" class="form-control field <?= $form->finish ? 'pe-none' : '' ?>" rows="5" name="workNotDone"><?= htmlentities($form->workNotDone) ?></textarea>
                            </div>
                            <div class="div-StoT">
                                <button class="btn btn-primary" id="btn-workNotDone"><i class="bi bi-mic-fill"></i></button>
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
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="1">Ampoule E 27</option>
                                <option value="2">Bande à joint</option>
                                <option value="3">Bande armée a joint</option>
                                <option value="4">Bonde à grille pour lave-mains</option>
                                <option value="5">Bouchon laiton à visser F ½</option>
                                <option value="6">Bornes connexion rapide - 3 entrées</option>
                                <option value="7">Bornes connexion rapide - 2 entrées</option>
                                <option value="8">Champlat</option>
                                <option value="9">Chevilles à expansion avec patte à vis</option>
                                <option value="10">Chevilles à frapper</option>
                                <option value="11">Chevilles auto-foreuses - Fixation plaque de plâtre</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="12">Chiffons</option>
                                <option value="13">Colle acrylique de fixation pour plinthe</option>
                                <option value="14">Colle pour toile de verre</option>
                                <option value="15">Colle PVC</option>
                                <option value="16">Collier PVC Ø 40</option>
                                <option value="17">Colliers PVC Ø 32</option>
                                <option value="18">Colliers PVC Ø 100</option>
                                <option value="19">Colliers type Atlas double Ø12</option>
                                <option value="20">Colliers type Atlas Simple Ø12</option>
                                <option value="21">Conducteur HO7VU 1,5² Bleu</option>
                                <option value="22">Conducteur HO7VU 1,5² Noir</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="23">Conducteur HO7VU 1,5² Orange</option>
                                <option value="24">Conducteur HO7VU 1,5² Rouge</option>
                                <option value="25">Conducteur HO7VU 1,5² Vert/Jaune</option>
                                <option value="26">Conducteur HO7VU 2,5² Bleu</option>
                                <option value="27">Conducteur HO7VU 2,5² Rouge</option>
                                <option value="28">Conducteur HO7VU 2,5² Vert/Jaune</option>
                                <option value="29">Convecteur électrique</option>
                                <option value="30">Coude cuivre 90° à souder FF Ø 12</option>
                                <option value="31">Coude PVC 87°30° FF Ø 100</option>
                                <option value="32">Coude PVC 87°30° FF Ø 32</option>
                                <option value="33">Coude PVC 87°30° FF Ø 40</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="34">Croisillons épaisseur 2 mm</option>
                                <option value="35">Cylindre double entrée profil européen</option>
                                <option value="36">Ecrou laiton à collet battu 12x17 Ø 12</option>
                                <option value="37">Enduit à joint</option>
                                <option value="38">Enduit de rebouchage</option>
                                <option value="39">Ensemble de porte - Clé I</option>
                                <option value="40">Ensemble de porte - Clé L</option>
                                <option value="41">Ensemble interrupteur SA/VV - encastrable</option>
                                <option value="42">Ensemble Prise 2P+T - encastrable</option>
                                <option value="43">Etagère bois 20 x 60</option>
                                <option value="44">Faïence mur 20 x 20</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="45">Fiche DCL et douille électrique E27</option>
                                <option value="46">Gaine ICTA Ø 20</option>
                                <option value="47">Interrupteur automatique avec détecteur de mouvement</option>
                                <option value="48">Joint poudre carrelage</option>
                                <option value="49">Joints d'étanchéité suivant montages</option>
                                <option value="50">Kit robinet d'arrêt WC équerre + flexible + joint</option>
                                <option value="51">Lave-mains</option>
                                <option value="52">Lot de 2 chevilles clips pour fixation WC 6x70</option>
                                <option value="53">Lot de 2 fixations pour lave-mains parois creuse + cheville</option>
                                <option value="54">Lot de 2 fixations pour lave-mains parois pleine + cheville</option>
                                <option value="55">Lot de colorants universels de peintre</option>
                            </select>
                        </div>        
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="56">Manchon cuivre à souder FF Ø 12</option>
                                <option value="57">Manchon de dilatation PVC H Ø 100</option>
                                <option value="58">Manchon mâle 243 CGU Ø 12 - M 12x17</option>
                                <option value="59">Manchon mâle 243 CGU Ø 12 - M 15x21</option>
                                <option value="60">Manchon PVC Ø 100</option>
                                <option value="61">Manchon PVC Ø 32</option>
                                <option value="62">Manchon PVC Ø 40</option>
                                <option value="63">Mélangeur pour lave-mains + Flexibles de raccordement</option>
                                <option value="64">Montant M48</option>
                                <option value="65">Mortier colle poudre</option>
                                <option value="66">Pack WC à poser sortie horizontale</option>
                            </select>
                        </div>        
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="67">Panneau bois OSB ou aggloméré</option>
                                <option value="68">Papier de verre grain 120</option>
                                <option value="69">Papier de verre grain 80</option>
                                <option value="70">Pates à vis</option>
                                <option value="71">Peinture acrylique satinée</option>
                                <option value="72">Peinture boiseries acrylique brillant</option>
                                <option value="73">Peinture impression</option>
                                <option value="74">Pipe coudée WC 90° 110 mm</option>
                                <option value="75">Pipe droite WC 110 mm</option>
                                <option value="76">Planche de coffrage</option>
                                <option value="77">Plaque de Plâtre BA13</option>
                            </select>
                        </div>        
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="78">Plinthe MDF ou bois brut</option>
                                <option value="79">Pointes tête homme</option>
                                <option value="80">Portemanteau mural bois 2 têtes</option>
                                <option value="81">Rail R48</option>
                                <option value="82">Réduction PVC Ø 40/32</option>
                                <option value="83">Revêtement à peindre - toile de verre largeur 1 m</option>
                                <option value="84">Robinet de puisage de lave-linge + platine de fixation</option>
                                <option value="85">Robinet simple pour lave-mains + flexible de raccordement</option>
                                <option value="86">Rosaces coniques H19</option>
                                <option value="87">Serrure standard encastrable NF Cylindre européen</option>
                                <option value="88">Serrure standard en L encastrable</option>
                            </select>
                        </div>        
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="89">Siphon lavabo/lave-mains à visser sortie Ø 32</option>
                                <option value="90">Système de vidage PVC pour machine à laver</option>
                                <option value="91">Tablette bois</option>
                                <option value="92">Tampon de réduction simple PVC Ø 100/40</option>
                                <option value="93">Tampon de visite PVC avec bouchon M/F Ø 32</option>
                                <option value="94">Tasseau raboté</option>
                                <option value="95">Té égal cuivre à souder FFF Ø 12</option>
                                <option value="96">Té pied de biche 87°30 FF PVC Ø 100</option>
                                <option value="97">Té pied de biche 87°30 FF PVC Ø 32</option>
                                <option value="98">Té pied de biche 87°30 FF PVC Ø 40</option>
                                <option value="99">Tube cuivre Ø 12</option>
                            </select>
                        </div>        
                        <div class="col-6">
                            <select class="form-select form-select-sm <?= $form->finish ? 'pe-none' : '' ?>" name="materials[]">
                                <option value="0">-- Choisir une valeur --</option>
                                <option value="100">Tube PVC Ø 100</option>
                                <option value="101">Tube PVC Ø 32</option>
                                <option value="102">Tube PVC Ø 40</option>
                                <option value="103">Vanne d'arrêt MF 1/4 de tour - 12x17</option>
                                <option value="104">Verrou à bouton - cylindre 40 mm</option>
                                <option value="105">Vis à bois 30 mm</option>
                                <option value="106">Vis TRPF</option>
                                <option value="107">Vis TTPC 25</option>
                                <option value="108">Vis TTPC 35</option>
                            </select>
                        </div>                
                    </div>
                </div>
            </fieldset>  
            <?php 
            if(!$form->finish) {
            ?>
            <div id="btns-form" class="d-flex justify-content-end mb-3">
                <div class="flex-fill d-flex justify-content-center">
                    <button id="btn-print" class="btn btn-primary" type="button">
                        <i class="bi bi-printer me-2"></i>Imprimer
                    </button>
                </div>
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
            </div>
            <?php    
            }
            ?>
        </form>
        </div>
    </div>
</div>

<script>
    const elements = <?= json_encode($elements) ?>;
    console.log(elements);
    const materials = <?= json_encode($materials) ?>;
    console.log(materials);
</script>

<?php
$content = ob_get_clean();
require("../app/views/layout.php");
?>


