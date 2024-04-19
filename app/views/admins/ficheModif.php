<?php
$bsIcons = true;
$scripts = "<script src='/assets/js/app.js' type='module'></script>";
$title = "Création fiche";

ob_start();
?>

<style>
    .div-img {
        height: 100px;
    }

    legend label {
        user-select: none;
    }
    .opacity{
        opacity : 1;
    }
</style>
<div class="container p-1">
<div class="row mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php
                    \app\class\Breadcrumb::removeAfter('createForm');
                    \app\class\Breadcrumb::add('createForm', 'Création fiche', 'bi-file-earmark-plus',$_SERVER["REQUEST_URI"]);                
                    echo \app\class\Breadcrumb::render();
                ?>
            </div>
            <div>
                <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#addPicto">
                    <i class="bi bi-folder-plus me-2"></i>Picto
                </button>
                <a href="/disconnect">
                    <button class="btn btn-danger">
                        <i class="bi bi-power me-2"></i>Se déconnecter
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="px-3">
        <?= app\class\Feedback::getMessage() ?>
    </div>

    <div class="row m-0">
        <div class="col-md-3 col-lg-2 p-0 pe-2 d-flex flex-row flex-md-column">
            <div class="border px-2 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label mb-0 text-center" for="bgColor">Couleur fond</label>
                    <input class="form-control form-control-color m-3" type="color" id="bgColor" value="#ffffff">
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label mb-0 text-center" for="global-bgColor">Couleur global</label>
                    <input class="form-control form-control-color m-3" type="color" id="global-bgColor" value="#ffffff">
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="form-switch d-flex flex-column align-items-center p-0 my-1">
                    <label for="global-tts" class="form-label mb-0 text-center" for="textToSpeech">Text to speech</label>
                    <input class="form-check-input my-3 mx-0" type="checkbox" role="switch" id="global-tts" checked>
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label mb-0 text-center" for="global-fontColor">Couleur police</label>
                    <input class="form-control form-control-color m-3" type="color" id="global-fontColor" value="#000000">
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label for="global-fontFamily" class="form-label mb-0 text-center">Police</label>
                    <select id="global-fontFamily" class="form-select form-select-sm my-3">
                        <option value="'Arial', sans-serif" style="font-family: 'Arial', sans-serif;">Arial</option>
                        <option value="'Segoe UI', sans-serif" style="font-family: 'Segoe UI', sans-serif;" selected>Segoe UI</option>
                        <option value="'Verdana', sans-serif" style="font-family: 'Verdana', sans-serif;">Verdana</option>
                        <option value="'Comic Sans MS', cursive" style="font-family: 'Comic Sans MS', cursive;">Comic Sans MS</option>
                        <option value="'Helvetica', sans-serif" style="font-family: 'Helvetica', sans-serif;">Helvetica</option>
                        <option value="'Courier', monospace" style="font-family: 'Courier', monospace;">Courier</option>
                    </select>
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="form-switch d-flex flex-column align-items-center p-0">
                    <label class="form-label mb-0 text-center" for="global-bold">
                        <i style="font-size: 1.5rem;" class="bi bi-type-bold"></i>
                    </label>
                    <input class="form-check-input m-3" type="checkbox" role="switch" id="global-bold">
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="form-switch d-flex flex-column align-items-center p-0">
                    <label class="form-label mb-0 text-center" for="global-speechToTextBool">
                        <i style="font-size: 1.5rem;" class="bi bi-mic-fill"></i>
                    </label>
                    <input class="form-check-input m-3" type="checkbox" role="switch" id="global-speechToTextBool">
                </div>
            </div>
            <div class="border px-2 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label">Niveau</label>
                    <div id="global-level" class="d-flex justify-content-around m-1 mb-2">
                        <div class="form-check text-center px-0">
                            <label for="global-level-1" class="form-check-label">1</label>
                            <input id="global-level-1" type="radio" class="global-level form-check-input p-0 m-0" name="level">
                        </div>
                        <div class="form-check text-center">
                            <label for="global-level-2" class="form-check-label">2</label>
                            <input id="global-level-2" type="radio" class="global-level form-check-input p-0 m-0" name="level" checked>
                        </div>
                        <div class="form-check text-center">
                            <label for="global-level-3" class="form-check-label">3</label>
                            <input id="global-level-3" type="radio" class="global-level form-check-input p-0 m-0" name="level">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border px-3 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label for="global-fontSizeInput-field" class="form-label text-center">Taille champs</label>
                    <input id="global-fontSizeInput-field" type="text" class="form-control form-control-sm my-2 text-center" value="16">
                    <input id="global-fontSizeRange-field" min="8" max="50" step="0.5" type="range" class="form-range mb-2" value="16">
                </div>
            </div>
            <div class="border px-3 m-1">
                <div class="d-flex flex-column align-items-center">
                    <label for="global-fontSizeInput-frame" class="form-label text-center">Taille cadres</label>
                    <input id="global-fontSizeInput-frame" type="text" class="form-control form-control-sm my-2 text-center" value="20">
                    <input id="global-fontSizeRange-frame" min="8" max="50" step="0.5" type="range" class="form-range mb-2" value="20">
                </div>
            </div>
        </div>
        <div id="divForm" class="col-md-9 col-lg-10 border p-3">
        <form action="" method="POST">
            <fieldset id="div-fsTitle" class="border p-2 pb-3 mb-4 form-group">
                <legend class="text-center m-0 h1">FICHE D'INTERVENTION</legend>
            </fieldset>
            <fieldset id="div-fsStudent" class="border p-2 pb-3 my-4 form-group">
                <legend class="float-none w-auto p-2 position-relative d-flex align-items-center">
                    <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                        <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                    </div>
                    <label class="form-label mb-0 pe-none d-none">Intervenant</label>
                </legend>
                <div class="container">
                    <div class="row">
                        <div id="div-studentLastName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="nomIntervenant" class="form-label mb-0 pe-none d-none">Nom de l'intervenant</label>
                            <div class="div-input input-group">
                                <input id="nomIntervenant" class="form-control pe-none field" type="text">
                            </div>
                        </div>
                        <div id="div-studentFirstName" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="prenomIntervenant" class="form-label mb-0 pe-none d-none">Prénom de l'intervenant</label>
                            <div class="div-input input-group">
                                <input id="prenomIntervenant" class="form-control pe-none field" type="text">
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
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="applicantName" class="form-label mb-0 pe-none d-none">Nom du demandeur</label>
                            <div class="div-input input-group">
                                <input id="applicantName" class="form-control pe-none field" type="text">
                            </div>
                        </div>
                        <div id="div-urgencyDegree" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="urgencyDegree" class="form-label mb-0 pe-none d-none">Degré d'urgence</label>
                            <div class="div-input input-group">
                                <input id="urgencyDegree" class="form-control pe-none field" type="text">
                            </div>
                        </div>
                        <div id="div-applicationDate" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="applicationDate" class="form-label mb-0 pe-none d-none">Date de la demande</label>
                            <div class="div-input input-group">
                                <input id="applicationDate" class="form-control pe-none field" type="date">
                            </div>
                        </div>
                        <div id="div-location" class="col-6 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="location" class="form-label mb-0 pe-none d-none">Localisation</label>
                            <div class="div-input input-group">
                                <input id="location" class="form-control pe-none field" type="text">
                            </div>
                        </div>
                        <div id="div-description" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="description" class="form-label mb-0 pe-none d-none">Description de la demande</label>
                            <div class="div-input input-group">
                                <textarea id="description" class="form-control pe-none field " rows="5"></textarea>
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
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="interventionDate" class="form-label mb-0 pe-none d-none">Date d'intervention</label>
                            <div class="div-input input-group">
                                <input id="interventionDate" class="form-control pe-none field" type="date">
                            </div>
                        </div>
                        <div id="div-interventionDuration" class="col-8 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="interventionDuration" class="form-label mb-0 pe-none d-none">Durée de l'opération</label>
                            <div class="div-input input-group">
                                <input id="interventionDuration" class="form-control pe-none field" type="time">
                            </div>
                        </div>
                        <div id="div-interventionValidation" class="col-4 d-flex flex-column justify-content-around position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="interventionValidation" class="form-check-label mb-0 pe-none d-none">Validation</label>
                            <div class="div-input input-group">
                                <input id="interventionValidation" class="form-check-input pe-none field" type="checkbox">
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
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenanceAmeliorative" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="maintenanceAmeliorative" class="form-check-label mb-0 pe-none d-none">Améliorative</label>
                            </div>
                        </div>
                        <div id="div-maintenancePreventive" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenancePreventive" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="maintenancePreventive" class="form-check-label mb-0 pe-none d-none">Préventive</label>
                            </div>
                        </div>
                        <div id="div-maintenanceCorrective" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="maintenanceCorrective" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="maintenanceCorrective" class="form-check-label mb-0 pe-none d-none">Corrective</label>
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
                    <label  class="form-label mb-0 pe-none d-none">Nature de l'intervention</label>
                </legend>
                <div class="container">
                    <div class="row gy-2">
                        <div id="div-interventionLayout" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionLayout" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="interventionLayout" class="form-check-label mb-0 pe-none d-none">Aménagements</label>
                            </div>
                        </div>
                        <div id="div-interventionFinition" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionFinition" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="interventionFinition" class="form-check-label mb-0 pe-none d-none">Finitions</label>
                            </div>
                        </div>
                        <div id="div-interventionHealthFacility" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionHealthFacility" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="interventionHealthFacility" class="form-check-label mb-0 pe-none d-none">Sanitaires</label>
                            </div>
                        </div>
                        <div id="div-interventionElectricalInstallation" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="interventionElectricalInstallation" class="form-check-input pe-none field my-0 me-2" type="radio">
                                <label for="interventionElectricalInstallation" class="form-check-label mb-0 pe-none d-none">Installation électrique</label>
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
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="workDone" class="form-label mb-0 pe-none d-none">Travaux réalisés</label>
                            <div class="div-input input-group">
                                <textarea id="workDone" class="form-control pe-none field" rows="5"></textarea>
                            </div>
                        </div>
                        <div id="div-workNotDone" class="col-12 d-flex flex-column justify-content-end position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <label for="workNotDone" class="form-label mb-0 pe-none d-none">Travaux non réalisés</label>
                            <div class="div-input input-group">
                                <textarea id="workNotDone" class="form-control pe-none field" rows="5"></textarea>
                            </div>
                        </div>
                        <div id="div-newIntervention" class="col-12 d-flex justify-content-start position-relative p-2">
                            <div class="div-img d-flex justify-content-center mb-1 d-none">
                                <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                            </div>
                            <div class="d-flex align-items-center ms-3 div-input">
                                <input id="newIntervention" class="form-check-input pe-none field my-0 me-2" type="checkbox">
                                <label for="newIntervention" class="form-check-label mb-0 pe-none d-none">Nécessite une nouvelle intervention</label>
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
                    <div id="div-materials" class="container position-relative">
                        <!-- //template-materials -->
                    </div>
            </fieldset>  
        </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-end">
            <a href="/etudiants-<?=$student->idUser?>" class="me-3">
                <button type="button" class="btn btn-danger">
                    <i class="pe-2 bi bi-x-circle"></i>Annuler
                </button>
            </a>
            <form id="formDatas" action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                <input type="hidden" name="action" value="createForm">
                <input id="form-json" type="hidden" name="json">
                <input id="form-bgColor" type="hidden" name="bgColor">
                <input id="form-idSession" type="hidden" name="idSession">
                <button id="btn-sendForm" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-session">
                    <i class="pe-2 bi bi-check-circle"></i>Valider
                </button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="addPicto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
        <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="addPicto">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un pictogramme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center" style="height: 150px;">
                <label for="inputImgPicto" class="h-100 d-flex align-items-center justify-content-center" role="button">
                    <img id="imgPicto" src="/assets/images/pictures/default.png" class="mw-100 mh-100 object-fit-contain border rounded">
                </label>
                <input id="inputImgPicto" type="file" class="d-none" name="picture">
                <input type="text" name="title" class="form-control ms-4">
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-tts-cancel" class="me-3 btn btn-danger" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Annuler
                </button>
                <button type="submit" id="btn-tts-confirm" class="btn btn-success">
                    <i class="bi bi-check-circle me-2"></i>Valider
                </button>
            </div>
            </div>
        </form>
        </div>
    </div>

    <!-- <div class="col-4 d-flex justify-content-center align-items-center" style="height: 156px;">
        <label for="inputImgTraining" class="h-100 d-flex align-items-center justify-content-center my-3">
            <img id="imgTraining" src="/assets/images/users/user.png" class="object-fit-contain mw-100 mh-100" style="cursor: pointer;" alt="Photo de la formation">
        </label>
        <input id="inputImgTraining" type="file" class="d-none" name="picture">
    </div> -->


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content-home" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Personnalisation du champ</h1>
                <button id="#btn-cross-modal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal-body-home" class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row m-0 mb-3">
                        <div class="p-2 d-flex flex-column align-items-center border col-4">
                            <label class="form-label mb-0" for="modal-textColor">Couleur texte</label>
                            <input class="form-control form-control-color m-2" type="color" id="modal-fontColor">
                        </div>
                        <div class="p-2 form-switch d-flex flex-column align-items-center border col-4">
                            <label class="form-label mb-0 text-center" for="modal-tts">
                                Text to speech
                                <i id="modal-modiftts" class="ms-1 bi bi-pencil-square" role="button"></i>
                            </label>
                            <input class="form-check-input m-2" type="checkbox" role="switch" id="modal-tts">
                        </div>
                        <div class="p-2 d-flex flex-column align-items-center border col-4">
                            <label class="form-label mb-0" for="modal-bgColor">Couleur fond</label>
                            <input class="form-control form-control-color m-2" type="color" id="modal-bgColor">
                        </div>
                        <div class="col-6 border p-3">
                            <div class="row d-flex pb-2 m-0">
                                <label for="modal-fontSizeInput" class="my-auto form-label col-10 p-0">Taille de la police</label>
                                <input id="modal-fontSizeInput" type="text" class="col-2 p-0"> 
                            </div>
                            <input id="modal-fontSizeRange" min="8" max="50" step="0.5" type="range" class="form-range mt-3">
                        </div>
                        <div class="col-6 border p-3">
                            <label for="modal-fontFamily" class="form-label pb-3">
                                Police
                            </label>
                            <select id="modal-fontFamily" class="form-select">
                                <option value="'Arial', sans-serif" style="font-family: 'Arial', sans-serif;">Arial</option>
                                <option value="'Segoe UI', sans-serif" style="font-family: 'Segoe UI', sans-serif;">Segoe UI</option>
                                <option value="'Verdana', sans-serif" style="font-family: 'Verdana', sans-serif;">Verdana</option>
                                <option value="'Comic Sans MS', cursive" style="font-family: 'Comic Sans MS', cursive;">Comic Sans MS</option>
                                <option value="'Helvetica', sans-serif" style="font-family: 'Helvetica', sans-serif;">Helvetica</option>
                                <option value="'Courier', monospace" style="font-family: 'Courier', monospace;">Courier</option>
                            </select>
                        </div>
                        <div class="p-2 form-switch d-flex flex-column align-items-center border col-2">
                            <label class="form-label mb-0 text-center" for="modal-bold">
                                <i style="font-size: 1.5rem;" class="bi bi-type-bold"></i>
                            </label>
                            <input class="form-check-input m-2" type="checkbox" role="switch" id="modal-bold">
                        </div>
                        <div class="col-8 p-2 text-center border">
                            <label class="form-label">Niveau</label>
                            <div id="modal-level" class="d-flex justify-content-around py-2">
                                <div class="form-check">
                                    <label for="modal-level-1" class="form-check-label">1</label>
                                    <input id="modal-level-1" type="radio" class="modal-level form-check-input" name="mLevel">
                                </div>
                                <div class="form-check">
                                    <label for="modal-level-2" class="form-check-label">2</label>
                                    <input id="modal-level-2" type="radio" class="modal-level form-check-input" name="mLevel">
                                </div>
                                <div class="form-check">
                                    <label for="modal-level-3" class="form-check-label">3</label>
                                    <input id="modal-level-3" type="radio" class="modal-level form-check-input" name="mLevel">
                                </div>
                            </div>
                        </div>
                        <div class="p-2 form-switch d-flex flex-column align-items-center border col-2">
                            <label class="form-label mb-0 text-center" for="modal-speechToTextBool">
                                <i style="font-size: 1.5rem;" class=" bi bi-mic-fill"></i>
                            </label>
                            <input class="form-check-input m-2" type="checkbox" role="switch" id="modal-speechToTextBool">
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12 d-flex flex-column justify-content-end p-3 border border-black border-2 rounded">
                            <!-- dynamic element here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-modal-cancel" class="btn btn-danger" data-bs-dismiss="modal"><i class="pe-2 bi bi-x-circle"></i>Annuler</button>
                <button type="button" id="btn-modal-confirm" class="btn btn-success" data-bs-dismiss="modal"><i class="pe-2 bi bi-check-circle"></i>Valider</button>
            </div>
            </div>
            <div id="modal-content-tts" class="d-none modal-content">
                <div id="modal-body-tts" class="modal-body">
                    <div class="d-flex justify-content-between mb-3">
                        <label for="textArea-modiftts" class="my-auto form-label">Modification du texte à lire</label>
                        <button type="button" class="btn btn-primary text-light">
                            <i class="bi bi-volume-up"></i>
                        </button>
                    </div>
                    <textarea id="textArea-modiftts" class="form-control" rows="10"></textarea>
                    <div id="div-buttons" class="mt-3 d-flex justify-content-end">
                        <button type="button" id="btn-tts-cancel" class="me-3 btn btn-danger">
                            Annuler
                            <i class="bi bi-x-circle"></i>
                        </button>
                        <button type="button" id="btn-tts-confirm" class="btn btn-success">
                            Valider
                            <i class="bi bi-check-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="modal-content-pictos" class="d-none modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Modification du pictogramme</h1>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
                <div id="modal-body-pictos" class="modal-body">
                    <div class="container-fluid p-0">
                        <div class="row g-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL SESSION -->
<div class="modal fade" id="modal-session" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Choix de la session</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Libellé</th>
                            <th scope="col">Date de début</th>
                            <th scope="col">Planifiée</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(!empty($sessions)) {
                            foreach ($sessions as $session) { 
                        ?>
                            <tr class="tr-body" data-id="<?= $session->idSession ?>">
                                <td role="button">
                                    <?= htmlentities($session->wording) ?>
                                </td>
                                <td role="button">
                                    <?= htmlentities((new DateTime($session->timeBegin))->format("d/m/Y")) ?>
                                </td>
                                <td role="button" class="text-center">
                                    <?php if($session->state === 3){ ?>
                                        <i class="bi bi-calendar-check"></i>
                                    <?php }else{ ?>
                                        <i class="bi bi-ban"></i>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- LES TEMPLATES -->
<template id="template-hover">
    <div class="d-flex position-absolute top-50 start-50 translate-middle div-hover opacity">
        <button type="button" class="m-2 text-light btn btn-sm btn-primary rounded-circle">
            <i class="bi bi-volume-up"></i>
        </button>
        <button type="button" class="m-2 text-light btn btn-sm btn-primary rounded-circle">
            <i class="bi bi-eye"></i>
        </button>
        <button type="button" class="m-2 text-light btn btn-sm btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-pencil"></i>
        </button>
    </div>
</template>

<template id="template-text">
    <div class="d-flex flex-column justify-content-end p-2 border border-black border-2 rounded">
        <div class="div-img d-flex justify-content-center mb-1 d-none" role="button">
            <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
        </div>
        <label class="form-label mb-1 pe-none d-none">--le label--</label>
        <div class="div-input input-group">
            <input class="form-control pe-none field" type="text">
        </div>
    </div>
</template>
<template id="template-date">
    <div class="d-flex flex-column justify-content-end p-2 border border-black border-2 rounded">
        <div class="div-img d-flex justify-content-center mb-1 d-none" role="button">
            <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
        </div>
        <label class="form-label mb-1 pe-none d-none">--le label--</label>
        <div class="div-input input-group">
            <input class="form-control pe-none field" type="date">
        </div>
    </div>
</template>
<template id="template-time">
    <div class="d-flex flex-column justify-content-end p-2 border border-black border-2 rounded">
        <div class="div-img d-flex justify-content-center mb-1 d-none" role="button">
            <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
        </div>
        <label class="form-label mb-1 pe-none d-none">--le label--</label>
        <div class="div-input input-group">
            <input class="form-control pe-none field" type="time">
        </div>
    </div>
</template>
<template id="template-checkbox">
    <div class="d-flex justify-content-start p-2 border border-black border-2 rounded">
        <div class="div-img d-flex justify-content-center mb-1 d-none" role="button">
            <img alt="picto" class="border border-black rounded border-2 mh-100 mw-100 object-fit-contain">
        </div>
        <div class="d-flex align-items-center ms-3 div-input">
            <input class="form-check-input pe-none my-0 me-2" type="radio">
            <label class="form-check-label pe-none mb-0 d-none">--le label--</label>
        </div>
    </div>
</template>
<template id="template-textarea">
    <div class="d-flex flex-column justify-content-end p-2 border border-black border-2 rounded">
        <div class="div-img d-flex justify-content-center mb-1 d-none" role="button">
            <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
        </div>
        <label class="form-label mb-1 pe-none d-none">--le label--</label>
        <div class="div-input input-group">
            <textarea class="form-control pe-none" rows="5"></textarea>
        </div>
    </div>
</template>
<template id="template-fieldset">
    <div class="p-3 border border-black border-2 rounded">
        <fieldset class="border p-2" style="height: 150px;">
            <legend class="float-none w-auto p-2 d-flex align-items-center">
                <div class="div-img d-flex justify-content-center me-2 d-none" style="height: 50px;">
                    <img alt="picto" class="border border-black rounded border-2 mw-100 mh-100 object-fit-contain">
                </div>
                <label class="form-label mb-0 pe-none d-none">Nature de l'intervention</label>
            </legend>
        </fieldset>
    </div>
</template>
<template id="template-materials-1">
    <div class="row m-0 border border-black border-2 rounded p-1 my-3 div-material">
        <div class="col-6 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src=" /assets/images/materials/exemple.png"  class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center material-buttons">
            <button class="btn btn-primary me-2 pe-none" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
            <button class="btn btn-danger pe-none"><i class="bi bi-trash"></i></button>             
        </div>
        <div class="col-12 collapse p-2">
            <div class="border border-black rounded p-2">
               Exemple de description
            </div>
        </div>
    </div>
</template>
<template id="template-materials-2">
<div class="row m-0 border border-black border-2 rounded p-1 my-3 div-material ">
        <div class="col-4 d-flex justify-content-center align-items-center" style="height: 150px;">
            <img src="/assets/images/materials/exemple.png" class="object-fit-contain mw-100 mh-100">
        </div>
        <div class="col-8 d-flex flex-column justify-content-evenly">
            <div class="d-flex justify-content-center">
                <p class="mb-0 text-center">Exemple de titre</p>
            </div>
            <div class="d-flex justify-content-center material-buttons">
                <button class="btn btn-primary me-2 pe-none" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
                <button class="btn btn-danger pe-none" ><i class="bi bi-trash"></i></button>            
            </div>
        </div>
        <div class="col-12 collapse p-2" >
            <div class="border border-black rounded p-2">
                Exemple de description
            </div>
        </div>
    </div>
</template>
<template id="template-materials-3">
<div class="row m-0 border border-black border-2 rounded p-2 my-3 div-material">
        <div class="col-12 col-sm-8 d-flex justify-content-center">
            <p class="mb-0 d-flex align-items-center justify-content-center text-center">Exemple de titre</p>
        </div>
        <div class="col-12 col-sm-4 d-flex justify-content-center align-items-center mt-2 mt-sm-0 material-buttons">
            <button class="btn btn-primary me-2 pe-none" data-bs-toggle="collapse"><i class="bi bi-info-circle"></i></button>
            <button class="btn btn-danger pe-none" ><i class="bi bi-trash"></i></button> 
        </div>
        <div class="col-12 collapse p-2" >
            <div class="border border-black rounded p-2">
                Exemple de description
            </div>
        </div>
    </div>
</div>
</template>

<script>
    const datas = <?= $datas ?>;
    console.log(datas);
    const pictos = <?= $pictos ?>;
    console.log(pictos);
</script>
<?php
$content = ob_get_clean();
require("../app/views/layout.php");
?>


