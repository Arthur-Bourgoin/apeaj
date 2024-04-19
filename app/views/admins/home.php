<?php $title = "Page Accueil Admin";
$bsIcons = true;
$scripts = "<script src='/assets/js/admin/home.js' type='module'></script>
<script src='/assets/js/account.js' type='module'></script>";
ob_start(); 
\app\class\Breadcrumb::clear();
\app\class\Breadcrumb::add('Home', "Accueil", 'bi bi-house','/');?>
<style>

.div-img {
    height: 150px;
}
</style>
<div class="container">
    <div class="row mx-0">
        <h2 class="text-center mt-3">
           <?= !empty($training) ? htmlentities($training->wording) : "" ?>
        </h2>
        <div class="d-flex justify-content-between align-items-center px-0">
            <button type="button" class="btn btn-primary my-3 btn-account" data-bs-toggle="modal" data-bs-target="#ModalAjouterSession">
                <i class="bi bi-plus-circle me-2"></i>Ajouter une session
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
        <div class="row mx-0 d-sm-block d-flex justify-content-between p-0">
            <button class="btn btn-primary me-3 col-lg-2 col-sm-3 col-5 mb-3" data-bs-toggle="modal" data-bs-target="#addPicto" title="Ajouter un pictogramme">
                <i class="bi bi-folder-plus me-2"></i>Picto
            </button>
            <button class="btn btn-primary col-lg-2 col-sm-3 col-5 mb-3" data-bs-toggle="modal" data-bs-target="#addMaterial" title="Ajouter un matériau">
                <i class="bi bi-folder-plus me-2"></i>Matériaux
            </button>
        </div>
    </div>

    <?= app\class\Feedback::getMessage() ?>
    <div class="row mx-0">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions"
                type="button" role="tab" aria-controls="sessions" aria-selected="true">Sessions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="eleves-tab" data-bs-toggle="tab" data-bs-target="#eleves" type="button"
                role="tab" aria-controls="eleves" aria-selected="false">Élèves</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
            <table class="table table-lg table-hover table fs-3 ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($sessions) && is_array($sessions)){
                    foreach ($sessions as $session) {
                        ?>
                        <tr>
                            <td><span class='font-large'>
                                    <?= htmlentities($session->wording) ?>
                                </span></td>
                            <td><a href="sessions-<?= $session->idSession ?>" title="Consulter la session"><i class='bi bi-eye text-black'></i></a>
                            <?php if($session->state === 3){ ?>
                                <i class="bi bi-calendar ms-2"></i></td>
                            <?php } ?>
                        </tr>
                        <?php
                    } }
                    else{
                        echo "Aucune session n'est associée à cette formation";
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade mt-3 mb-2" id="eleves" role="tabpanel" aria-labelledby="eleves-tab">
            <div class="row mb-3 align-items-center user-container">
                <?php
                if(!empty($students) && is_array($students)){
                foreach ($students as $student) { ?>
                    <div class="col-lg-3 col-md-4 col-6 ">
                        <div class="card mb-4">
                            <img src="<?= $student->picture ?>" class="img-thumbnail" alt="Photo de l'étudiant 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <?= htmlentities($student->lastName) ?>
                                </h5>
                                <p class="card-text">
                                    <?= htmlentities($student->firstName) ?>
                                </p>
                                <div class="d-flex justify-content-evenly">
                                    <a href="etudiants-<?= $student->idUser ?>" class="btn btn-primary" title="Consulter l'étudiant"><i class="bi bi-info-circle"></i></a>
                                    <?php if(isset($_SESSION["role"]) && in_array($_SESSION["role"], ['educator-admin', 'super-admin'])) { ?>
                                        <button type="button" class="btn btn-primary button-update" data-bs-toggle="modal" data-bs-target="#ModalModifie" data-id="<?= $student->idUser ?>" title="Modifier l'étudiant">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }}
                else    
                    echo "Aucun étudiant n'est associé à cette session"
                 ?>
            </div>
        </div>
    </div>
    </div>

</div>
<div class="modal fade" id="ModalAjouterSession" tabindex="-1" aria-labelledby="ModalAjouterSessionLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAjouterSessionLabel">Ajouter une nouvelle session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="action" name="action" value="addSession">
                        <input type="hidden" class="form-control" id="idTraining" name="idTraining" value=<?= $_SESSION["training"]?>>
                        <label for="sessionName" class="form-label">Nom de la session</label>
                        <input type="text" class="form-control" id="sessionName" name="wording" required>
                    </div>
                    <div class="mb-3">
                        <label for="theme" class="form-label">Thème</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                    <div class="mb-3">
                        <label for="startTime" class="form-label">Date/Heure de début</label>
                        <input type="datetime-local" class="form-control" id="startTime" name="timeBegin" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Plannifier la session</label>
                        <input class="form-check-input" type="checkbox" id="state" name="state" value= 3 >
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

<div class="modal fade" id="ModalModifie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UpdateUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form enctype="multipart/form-data" action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
            <input type="hidden" id="idUser" name="idUser" value="" />
            <input type="hidden" name="action" value="updateStudent" />
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserLabel">Modifier utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="inputImgUser">
                                <img id="imgUser" src="" class="w-100 border" alt="Image de l'utilisateur">
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
                                <select class="form-select selectTypePwd" id="inputTypePwd" name="typePwd" required>
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
                                <label for="inputCode" class="form-label">Code</label>
                                <div class="input-group">
                                    <input id="inputCode" type="password" class="form-control input-pwd" name="pwd"
                                        pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="inputConfirmCode" class="form-label">Confirmation du code</label>
                                <div class="input-group">
                                    <input id="inputVerifCode" type="password" class="form-control input-pwd"
                                        name="verifPwd" pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-3 text-center">
                            <button type="button" class="btn btn-cancel btn-danger me-2" data-bs-dismiss="modal">
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

    <div class="modal fade" id="addMaterial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addMaterial">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un matériau</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="inputImgMaterial" class="d-block">
                        <div class="div-img d-flex justify-content-center align-items-center">
                            <img id="imgMaterial" src="/assets/images/pictures/default.png" class="mw-100 mh-100 object-fit-contain border rounded">
                        </div>
                    </label>
                    <input id="inputImgMaterial" type="file" class="d-none" name="picture">
                    <input type="text" name="wording" class="form-control my-2 " placeholder="Libellé">
                    <textarea name="description" class="form-control my-2" placeholder="Description"></textarea>
                    <div id="typeSelectorsContainer">
                        <select name="type[]" class="form-select my-2">
                            <option value="">Sélectionner un type</option>
                            <option value="electricite">Electricité</option>
                            <option value="plomberie">Plomberie</option>     
                            <option value="construction">Construction</option>
                            <option value="quincaillerie">Quincaillerie</option>
                            <option value="menuiserie">Menuiserie</option>
                            <option value="isolation"> Isolation </option>
                            <option value="equipements sanitaires">Equipements sanitaires</option>
                            <option value="esthetique">Esthetique</option>
                            <option value="interieur">Intérieur</option>
                            <option value="tuyauterie">Tuyauterie</option>
                        </select>
                    </div>
                    <!-- Bouton pour ajouter un nouveau type -->
                    <button type="button" id="addTypeButton" class="btn btn-secondary my-2">+</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php 
    require("../app/views/modalAccount.php");
?>

<script>
    const studentsTab = <?= json_encode($students) ?>;
    const currentUser = <?= json_encode($currentUser) ?>;
</script>
<?php $content = ob_get_clean();
require("../app/views/layout.php");