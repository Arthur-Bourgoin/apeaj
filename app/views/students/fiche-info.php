<?php
$title = "Page Information fiche";
$bsIcons = true;
$scripts = "<script src='/assets/js/class/alert.js' type='module'></script>
<script src='/assets/js/admin/fiche-info.js' type='module'></script>";
define("PATH", "/assets/images/pictures/");
?>

<?php ob_start(); ?>
<style>
    .div-img {
        height: 100px;
    }

    .comment-container:hover {
        background-color: lightgray;
        cursor: pointer;
    }

    .loader{
        height: 140px;
        width: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: blue;
        border-radius: 50%; /* Cela rend le conteneur circulaire */
        border: 2px solid blue; /* Ajustez l'épaisseur et la couleur de la bordure si nécessaire */
    }

    .loader-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 105px; /* Ajustez selon la taille souhaitée */
    height: 105px; /* Ajustez selon la taille souhaitée */
}

.loader .stroke{
    display: block;
    position: relative;
    background-color: white;
    width: 15px;
    border-radius: 50px;
    margin: 0 5px;
}

@keyframes animate{
    50%{
        height: 10%; /* Réduit la hauteur pendant l'animation */
    }
    100%{
        height: 70%; /* Retour à la hauteur initiale */
    }
}
    .stroke:nth-child(1){
        animation-delay:0s;
        height: 70%; 
        animation: animate 1.2s linear infinite;
    }
    .stroke:nth-child(2){
        animation-delay:0.3s ;
        height: 80%; 
        animation: animate 1.37s linear infinite;
    }
    .stroke:nth-child(3){
        animation-delay:0.6s ;
        height: 90%; 
        animation: animate 1.54s linear infinite;
    }
    .stroke:nth-child(4){
        animation-delay:0.9s ;
        height: 100%; 
        animation: animate 1.71s linear infinite;
    }
    .stroke:nth-child(5){
        animation-delay:0.6s ;
        height: 90%; 
        animation: animate 1.37s linear infinite;
    }
    .stroke:nth-child(6){
        animation-delay:0.3s ;
        height: 80%; 
        animation: animate 1.54s linear infinite;
    }
    .stroke:nth-child(7){
        animation-delay:0s ;
        height: 70%; 
        animation: animate 1.2s linear infinite;
    }
</style>
<div class = "container position-relative">
    <div class="d-flex justify-content-between align-items-center px-0">
        <?php
            \app\class\Breadcrumb::removeAfter('infoForm');
            \app\class\Breadcrumb::add('infoForm', 'Fiche n° '.$form->form->numero, 'bi-file-earmark',$_SERVER['REQUEST_URI']);
            echo \app\class\Breadcrumb::render();
        ?>
        <div>
            <a href="/disconnect">
                <button class="btn btn-danger">
                    <i class="bi bi-power me-2"></i> Se déconnecter
                </button>
            </a>            
        </div>
    </div>

    <div class = "row mb-5">
        <div class="col-md-3 col-6 text-center">
            <a href="<?= $_SERVER['REQUEST_URI'] . "/consultation" ?>">
                <i class = "bi bi-file-earmark-text text-primary" style = "font-size: 8rem;"></i>
            </a>
        </div>
        <div class="col-md-9 col-6 d-flex flex-column justify-content-evenly">
            <h4><?= empty($form->session->wording) ? "" : $form->session->wording ?></h4>
            <h4><?= empty($student->lastName) ? "" : $student->lastName . " " . $student->firstName ?></h4>
            <h4><?= empty($form->form->creationDate) ? "" : "Le " . (new DateTime($form->form->creationDate))->format("d/m/Y") ?></h4>
        </div>
    </div>
    <?php
    ?>

    
    <?= app\class\Feedback::getMessage() ?>
    <div class="row mx-0">
    <ul class="nav nav-tabs" id="commentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="text-comments-tab" data-bs-toggle="tab" data-bs-target="#text-comments" type="button" role="tab" aria-controls="text-comments" aria-selected="true">Commentaires</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="audio-comments-tab" data-bs-toggle="tab" data-bs-target="#audio-comments" type="button" role="tab" aria-controls="audio-comments" aria-selected="false">Commentaires audios</button>
        </li>
    </ul>
    <div class="tab-content " id="commentTabsContent">
        <div class="tab-pane fade show active " id="text-comments" role="tabpanel" aria-labelledby="text-comments-tab">
            <!-- Afficher les commentaires textuels ici -->
            <?php 
            if(!empty($form->comments) && is_array($form->comments))
                foreach ($form->comments as $com) {
                    if($com->admin === 1 && $_SESSION["role"] === "student"){
                    }else{
                        echo $com->getTemplateComment();
                    }
            } ?>
                    <div class="row d-flex">
                        <div class="px-0">
                            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#ModalComs">
                                <i class="bi bi-chat-left-text me-2"></i>Ajouter un commentaire
                            </button>
                        </div>
                    </div>
        </div>
        <div class="tab-pane fade mb-2" id="audio-comments" role="tabpanel" aria-labelledby="audio-comments-tab">
            <!-- Afficher les commentaires audio ici -->
            <?php if(!empty($audios)){
            foreach($audios as $audio) { 
                echo $audio->getTemplateAudioComment();
             }} ?>
             <?php
                if (!in_array($_SESSION["id"], array_column($audios, "idAuthor"))) { ?>
                    <div class="row d-flex">
                        <div class="px-0">
                            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#ModalComsAudio">
                                <i class="bi bi-volume-up me-2"></i> Ajouter un commentaire audio
                            </button>
                        </div>
                    </div>
                    <?php
                } ?>
        </div>
    </div>

    <div class = "row mt-5" id = "pictures">
    <?php if(!empty($form->pictures)) { ?>
        <?php foreach ($form->pictures as $picture) { ?>
            <div class = "col-md-3 col-sm-6 mb-4">
                <div class = "card">
                    <div class = "card-body text-center">
                        <div class="div-img">
                            <img src="<?= PATH . $picture->path ?>" alt="Image" class="object-fit-contain mw-100 mh-100 ">
                        </div>
                        <h5 class = "card-title mt-3">
                            <?= $picture->title ?>
                        </h5>
                        <form action = "<?= $_SERVER["REQUEST_URI"] ?>" method = "post" class="position-absolute top-0 end-0 mt-2 me-2">
                        <input type = "hidden" name="idPicture" value = "<?= $picture->idPicture ?>">
                        <?php if ($picture->idAuthor === $_SESSION["id"]) {?>
                            <button type = "submit" class=" btn btn-danger btn-delete-picture " name = "action" value = "deletePicture">
                                <i class="bi bi-trash"></i>
                            </button>
                        <?php } ?>                  
                        </form>
                    </div>
                </div>
            </div>
        <?php } } ?>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div role="button" data-bs-toggle="modal" data-bs-target="#NewPicture" style="height: 100px;">
                        <img src="<?= PATH ?>default.png" class="img-thumbnail object-fit-contain mw-100 mh-100">
                    </div>
                    <h5 class="card-title mt-3">
                        Ajouter une photo
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class = "modal fade" id = "ModalComs" tabindex = "-1" aria-labelledby = "ModalComs" aria-hidden = "true">
        <div class = "modal-dialog modal-lg">
        <form action = "<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
            <input type = "hidden" id = "idStudent" name = "idStudent" value = "<?= $student->idUser ?>" />
            <input type = "hidden" name = "action" value = "addComment" />
            <input type = "hidden" name = "numero" value = "<?= $form->form->numero ?>" />
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title" id = "AddComment">Ajouter un commentaire</h5>
                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                </div>
                <div class="modal-body">
                    <div class = "col-12 mt-2">
                        <label for = "Formwording" class = "form-label pe-none">Nom du commentaire</label>
                        <input class = " form-control" id = "Formwording" name = "wording" required>
                    </div>
                    <div class = "col-12 mt-2">
                        <label for = "Formtext" class = "form-label pe-none">Contenu</label>
                        <textarea class = " form-control" id = "Formtext" name = "text" required></textarea>
                    </div>
                    <div class = "col-12 mt-2">
                        <label for = "formNote" class = "form-label pe-none">Note</label>
                        <input class = "form-control" id = "formNote" name = "note" pattern = "[0-9]|1[0-9]|20" required>
                    </div>
                </div>
                <div class = "modal-footer">
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

    <div class = "modal fade" id = "ModalUpdateComs" tabindex = "-1" aria-labelledby = "ModalUpdateComs" aria-hidden = "true">
        <div class = "modal-dialog modal-lg">
        <form action = "<?= $_SERVER["REQUEST_URI"] ?>" method = "POST">
            <input type = "hidden" name = "action" value = "updateComment" />
            <input type = "hidden" id = "idCommentForm" name = "idCommentForm" value = "" />
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title" id = "AddComment">Modifier un commentaire</h5>
                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                </div>
                <div class = "modal-body">
                    <div class = "col-12 mt-2">
                        <label for = "formWording" class = "form-label pe-none">Nom du commentaire</label>
                        <input class = " form-control" id = "formWording" name = "wording" required>
                    </div>
                    <div class = "col-12 mt-2">
                        <label for = "formText" class = "form-label pe-none">Contenu</label>
                        <textarea class = " form-control" id = "formText" name = "text" rows="5" required></textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="formNote" class="form-label pe-none">Note</label>
                        <input class=" form-control" id="formNote" name="note" pattern="[0-9]|1[0-9]|20" required>
                    </div>
                </div>
                <div class = "modal-footer">
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

    <div class = "modal fade" id = "NewPicture" tabindex = "-1" aria-labelledby = "NewPicture" aria-hidden = "true">
        <div class = "modal-dialog modal-lg">
        <form enctype="multipart/form-data" action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
            <input type="hidden" name="action" value="addPicture" />
            <input type = "hidden" id = "idStudent" name = "idStudent" value = "<?= $student->idUser ?>" />
            <input type = "hidden" name = "numero" value = "<?= $form->form->numero ?>" />
            <div class = "modal-content">
                <div class = "modal-header">
                    <h5 class = "modal-title" id = "AddComment">Ajouter une Photo</h5>
                    <button type = "button" class = "btn-close" data-bs-dismiss = "modal" aria-label = "Close"></button>
                </div>
                <div class = "modal-body">
                    <div class="row">
                        <div class="col-3">
                            <label for="inputImgForm">
                                <div class="d-flex align-items-center" style="height: 100px;">
                                    <img id="imgForm" src="<?= PATH ?>default.png" class="img-thumbnail object-fit-contain mw-100 mh-100" alt="Image de l'intervention">
                                </div>
                            </label>
                            <input id="inputImgForm" type="file" class="d-none" name="picture" required>
                        </div>
                        <div class=" col-6">
                            <label for="pictureTitle" class="form-label pe-none">Choisissez un titre</label>
                            <input class=" form-control" id="pictureTitle" name="title" required>
                        </div>
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

    <template id="takePhotoContainer">
        <div class="container">
            <div class="row">
                <video id="videoCam" class="bg-dark vw-100 vh-100 z-1"></video>
            </div>
            <div class="row position-absolute bottom-0 start-0 end-0 bg-dark" style="height: 100px;">
                <div class="col d-flex justify-content-center align-items-center">
                    <button id="reversePhoto" class="btn btn-secondary w-100 h-100 z-2"><i class="bi bi-arrow-repeat"></i></button>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <button id="takePhoto" class="btn btn-primary w-100 h-100 z-2"><i class="bi bi-camera"></i></button>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <button id="cancelPhoto" class="btn btn-danger w-100 h-100 z-2"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>
        </div>
    </template>

    <template id="confirmPhotoContainer">
        <div class="container">
            <div class="row z-1 bg-dark">
                <canvas id="photoCaptureVisu" class="bg-dark vw-50 vh-100 "></video>
            </div>
            <form id="photoForm" enctype="multipart/form-data" method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
                <input type="hidden" name="action" value="addPicture">
                <input id="inputFilePicture" class="d-none" type="file" name="picture">
                <div class="row position-absolute bottom-0 start-0 end-0 z-2 bg-white" style="height: 100px;">
                    <div class="col-12 bg-white d-flex align-items-center justify-content-center">
                        <span>Entrez le titre de la photo</span>
                        <input id="inputTitlePicture" name="title" class="form-control mx-2" type="text">
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <button id="confirmThisPhoto" class="btn btn-success w-100 h-100"><i class="bi bi-check-lg"></i></button>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <button id="refuseThisPhoto" class="btn btn-danger w-100 h-100"><i class="bi bi-x-lg"></i></button>
                    </div>  
                </div>
            </form>
        </div>
    </template>
</div>
<div class="modal fade" id="ModalComsAudio" tabindex="-1" aria-labelledby="ModalComsAudioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalComsAudioLabel">Ajouter un commentaire audio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center flex-column">
                    <div class="d-flex justify-content-center">
                        <button id="startRecording" class="btn btn-me-2 btn-success me-3" ><i class="bi bi-caret-right-fill"></i>Commencer</button> <!-- Ajout d'une marge à droite pour le premier bouton -->
                        <button id="stopRecording" class="btn btn-danger me-3 " disabled> <i class="bi bi-square-fill me-2"></i> Arrêter </button>
                    </div>
                    <div class="d-flex justify-content-center mt-3"> 
                        <div class="loader d-none">
                            <div class="loader-container">
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                                <span class="stroke"></span>
                            </div>
                        </div>
                    </div>
                    <div id="audioPreviewContainer" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel btn-danger me-2" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" id="send"  form="audioCommentForm" class="btn btn-success">
                        <i class="bi bi-check-circle me-2"></i>Valider
                    </button>
                </div>
            </div>
        </div>
    </div>


<script>
    const commentsTab = <?= json_encode($form->comments) ?>;
    document.addEventListener('DOMContentLoaded', function () {
    const startRecording = document.querySelector('#startRecording');
    const stopRecording = document.querySelector('#stopRecording');
    const loader = document.querySelector(".loader");
    const sendButton = document.querySelector("#send");
    let mediaRecorder;
    let audioBlob = null; // Pour stocker le blob audio après l'enregistrement

    startRecording.addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(stream => {
                mediaRecorder = new MediaRecorder(stream);
                const chunks = [];

                mediaRecorder.ondataavailable = e => chunks.push(e.data);
                mediaRecorder.onstop = () => {
                    audioBlob = new Blob(chunks, { type: 'audio/mp3' });
                    const audioUrl = URL.createObjectURL(audioBlob);
                    const audioElement = document.createElement('audio');
                    audioElement.controls = true;
                    audioElement.src = audioUrl;

                    const previewContainer = document.getElementById('audioPreviewContainer');
                    previewContainer.innerHTML = '';
                    previewContainer.appendChild(audioElement);

                    loader.classList.add("d-none");
                };

                mediaRecorder.start();
                loader.classList.remove("d-none");
                startRecording.disabled = true;
                stopRecording.disabled = false;
            })
            .catch(error => {
                console.error("Erreur lors de la demande d'accès au microphone:", error);
                loader.classList.add("d-none");
            });
    });

    stopRecording.addEventListener('click', () => {
        if (mediaRecorder && mediaRecorder.state !== 'inactive') {
            mediaRecorder.stop();
            startRecording.disabled = false;
            stopRecording.disabled = true;
        }
    });

    sendButton.addEventListener('click', (e) => {
        e.preventDefault();
        if (!audioBlob) {
            alert("Veuillez d'abord enregistrer un audio.");
            return;
        }

        // Créez ou trouvez le formulaire s'il existe déjà
        let form = document.querySelector('#audioForm'); // Assurez-vous que cet ID correspond à votre formulaire
        if (!form) {
            form = document.createElement('form');
            form.style.display = 'none';
            form.enctype = 'multipart/form-data';
            form.method = 'POST';
            form.action = '<?=$_SERVER["REQUEST_URI"]?>'; 
            document.body.appendChild(form);
        }

        // Créez un champ de formulaire pour le fichier audio
        const audioInput = document.createElement('input');
        audioInput.type = 'file';
        audioInput.name = 'audio';
        form.appendChild(audioInput);

        // Utilisez DataTransfer pour associer le blob audio à l'input
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(new File([audioBlob], 'audio.mp3', { type: 'audio/mp3' }));
        audioInput.files = dataTransfer.files;

        // Ajoutez tout autre champ nécessaire au formulaire
        const actionInput = document.createElement('input');
        actionInput.type = 'hidden';
        actionInput.name = 'action';
        actionInput.value = 'addAudio'; // ou tout autre action nécessaire
        form.appendChild(actionInput);

        // Soumettez le formulaire
        form.submit();
    });
    
});

    </script>

<?php $content = ob_get_clean();
require("../app/views/layout.php");
?>