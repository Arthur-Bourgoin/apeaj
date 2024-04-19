<?php $title = "Page Aide Super-Amdin";
$bsIcons = true;
define("PATH_IMG", "/assets/images/help/SAdmins/");
?>

<?php ob_start(); ?> 
<style>
    #btn-nav {
        position: fixed;
        top: 15px;
        right:15px;
        z-index: 1000;
        width:70px;
    }
</style>
<div class="container position-relative">   
    <button id="btn-nav" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
    </button>
    <div class="row">
        <h2 class="text-center my-3">
            Prise en main compte super-administrateur
        </h2>
    </div>
    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <ul>
                                <li class=" mt-3"> <a href="#PageAccueil" class="text-decoration-none text-dark">Page Accueil</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"> <a href="#AddTraining" class="text-decoration-none text-dark">Ajouter une formation</a></li>
                                        <li class=" mt-3"><a href="#AddUser" class="text-decoration-none text-dark">Ajouter un utilisateur</a></li>
                                        <li class=" mt-3"><a href="#DeleteTraining" class="text-decoration-none text-dark">Supprimer la formation</a></li>
                                        <li class=" mt-3"><a href="#ConsultTraining" class="text-decoration-none text-dark">Consulter la formation</a></li>
                                        <li class=" mt-3"><a href="#UpdateProfile" class="text-decoration-none text-dark">Modifier son profil</a></li>
                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageTraining" class="text-decoration-none text-dark">Page Formation</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#UpdateTraining" class="text-decoration-none text-dark">Modifier la formation</a></li>
                                        <li class=" mt-3"><a href="#DeleteTraining2" class="text-decoration-none text-dark">Supprimer la formation</a></li>
                                        <li class=" mt-3"><a href="#AddUser2" class="text-decoration-none text-dark">Ajouter un utilisateur</a></li>
                                        <li class=" mt-3"><a href="#UpdateEducator" class="text-decoration-none text-dark">Modifier un éducateur</a></li>
                                        <li class=" mt-3"><a href="#DeleteEducator" class="text-decoration-none text-dark">Supprimer un éducateur</a></li>
                                        <li class=" mt-3"><a href="#DeleteStudent" class="text-decoration-none text-dark">Supprimer un étudiant</a></li>
                                        <li class=" mt-3"><a href="#ConsultStudent" class="text-decoration-none text-dark">Consulter un étudiant</a></li>
                                        <li class=" mt-3"><a href="#ExportStudent" class="text-decoration-none text-dark">Exporter un étudiant</a></li>
                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageStudent" class="text-decoration-none text-dark">Page Étudiant</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#UpdateStudent" class="text-decoration-none text-dark">Modifier un étudiant</a></li>
                                        <li class=" mt-3"><a href="#CreateNewForm" class="text-decoration-none text-dark">Création d'une nouvelle fiche</a></li>
                                        <li class=" mt-3"><a href="#ConsultStudentProgress" class="text-decoration-none text-dark">Consulter la progression d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddCommentStudent" class="text-decoration-none text-dark">Ajouter un commentaire</a></li>
                                        <li class=" mt-3"><a href="#UpdateCommentStudent" class="text-decoration-none text-dark">Modifier un commentaire</a></li>
                                        <li class=" mt-3"><a href="#DeleteCommentStudent" class="text-decoration-none text-dark">Supprimer un commentaire</a></li>
                                        <li class=" mt-3"><a href="#ConsultSession" class="text-decoration-none text-dark">Consulter une session</a></li>

                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageSessionStudent" class="text-decoration-none text-dark">Page Session</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#ConsultFormStudent" class="text-decoration-none text-dark">Consulter la fiche d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#OpenStudentSession" class="text-decoration-none text-dark">Ouvrir la fiche d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#CloseStudentSession" class="text-decoration-none text-dark">Fermer la fiche d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#DeleteStudentSession" class="text-decoration-none text-dark">Supprimer la fiche d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddCommentSession" class="text-decoration-none text-dark">Ajouter un commentaire à la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#UpdateCommentSession" class="text-decoration-none text-dark">Modifier un commentaire à la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#DeleteCommentSession" class="text-decoration-none text-dark">Supprimer un commentaire de la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddAudioCommentSession" class="text-decoration-none text-dark">Ajouter un commentaire audio a la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#DeleteAudioCommentSession" class="text-decoration-none text-dark">Supprimer un commentaire audio de la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddPhotoSession" class="text-decoration-none text-dark">Ajouter une photo à la session d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#TakePhotoSession" class="text-decoration-none text-dark">Prendre une photo de la session d'un étudiant </a></li>
                                        <li class=" mt-3"><a href="#DeletePhotoSession" class="text-decoration-none text-dark">Supprimer une photo de la session d'un étudiant </a></li>
                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageCreateForm" class="text-decoration-none text-dark">Page création d'une fiche</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#BackgroudColor" class="text-decoration-none text-dark">Couleur de fond de la fiche</a></li>
                                        <li class=" mt-3"><a href="#GlobalColor" class="text-decoration-none text-dark">Couleur global de la fiche</a></li>
                                        <li class=" mt-3"><a href="#TextToSpeech" class="text-decoration-none text-dark">Activer le text to speech sur la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdateColorPolice" class="text-decoration-none text-dark">Modifier la couleur de la police de la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdatePoliceForm" class="text-decoration-none text-dark">Modifier la police de la fiche</a></li>
                                        <li class=" mt-3"><a href="#ActivateBold" class="text-decoration-none text-dark">Activer le l'écriture en gras sur la fiche</a></li>
                                        <li class=" mt-3"><a href="#ActivateSTT" class="text-decoration-none text-dark">Activer le speech to text sur la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdateLevelForm" class="text-decoration-none text-dark">Modifier le niveau global de la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdateFieldSize" class="text-decoration-none text-dark">Modifier la taille des champs de la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdateFrameSize" class="text-decoration-none text-dark">Modifier la taille des cadres de la fiche</a></li>
                                        <li class=" mt-3"><a href="#UpdateFieldsVisibility" class="text-decoration-none text-dark">Rendre visible ou invisible un champ de la fiche en particulier</a></li>
                                        <li class=" mt-3"><a href="#UpdateTextToSpeechFields" class="text-decoration-none text-dark">Activer le text to speech sur un champs de la fiche en particulier</a></li>
                                        <li class=" mt-3"><a href="#UpdateFieldsForm" class="text-decoration-none text-dark">Modifier un champs de la fiche en particulier</a></li>
                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageStudentProgress" class="text-decoration-none text-dark">Page progression de l'étudiant</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#ConsultFormProgress" class="text-decoration-none text-dark">Consulter la fiche associé a une note</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div>
        <?php
            \app\class\Breadcrumb::removeAfter('aide');
            \app\class\Breadcrumb::add('aide', "Aide", 'bi bi-info-circle',"/sessions-");
            echo \app\class\Breadcrumb::render();
        ?>
    </div>
            <div class="tab-content mt-2" id="v-pills-tabContent">
                <div id="PageAccueil" class="mt-5">
                    <hr id="AddTraining" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ajouter une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddTraining" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddTraining" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddTraining" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "AddFormation.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour ajouter une formation, vous devez réaliser l'action suivante :
                                                    <ul>
                                                        <li>Vous devez cliquer sur le bouton bleu intitulé "Ajouter une formation" située en haut à gauche. Vous avez alors une fenêtre qui s'ouvre où vous pouvez compléter les différents champs.</li>
                                                        <li>Pour compléter la photo de profil de la formation, vous devez cliquer sur le personnage. Enfin, vous pouvez choisir un nom, un niveau de qualification ainsi qu'une description à la formation.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddTraining" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddFormation.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>              
                        </div>

                    <hr id="AddUser" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                            Comment ajouter un utilisateur à une formation depuis la page d'accueil 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddUser" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddUser" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddUser" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>
                                                    Pour ajouter un utilisateur a une formation depuis la page d'accueil, vous devez réaliser les actions suivantes :  
                                                    <ul>
                                                        <li>
                                                            Il faut cliquer sur l'icône de personnage au niveau bouton bleu de la formation à laquelle vous souhaitez ajouter l'utilisateur.
                                                        </li>
                                                        <li>
                                                            Vous devez ensuite cliquer sur le personnage pour choisir une photo de profil à l'utilisateur. Vous pouvez enfin choisir le nom, le prénom, le type de mot de passe, le mot de passe et enfin le rôle de l'utilisateur à ajouter.
                                                        </li>
                        
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "AddUser.png" ?>" alt=""  style="width: 300px;">
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddUser" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddUser1.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>          
                        </div>

                    <hr id="DeleteTraining" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer une formation depuis la page d'accueil 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteTraining" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteTraining" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteTraining" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteFormation2.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>
                                                    Pour supprimer une formation, vous devez réaliser l'action suivante : 
                                                    <ul>
                                                        <li>
                                                            Vous devez cliquer sur l'icône de la poubelle située au niveau du bouton bleu de la formation que vous souhaitez supprimer. Il ne vous reste plus qu'à valider la suppression de la formation.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteTraining" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteTraining.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>          
                        </div>

                    <hr id="ConsultTraining" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment consulter une formation 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultTraining" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultTraining" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextConsultTraining" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>
                                                Pour consulter une formation, vous devez réaliser l'action suivante :
                                                    <ul>
                                                        <li>
                                                            Vous devez cliquer sur l'icône de l'œil situé au niveau du bouton bleu de la formation que vous souhaitez consulter. 
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "ConsultFormation.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoConsultTraining" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/ConsultTraining.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div> 
                        </div>

                    <hr id="UpdateProfile" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier votre profil  
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateProfile" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateProfile" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateProfile" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "UpdateProfile.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                           <ul>
                                                <li>
                                                    Pour modifier votre profil, vous devez réaliser l'action suivante :
                                                    <ul>
                                                        <li>
                                                            Vous devez cliquer sur l'icône de personnage situé en haut à droite de l'écran à côté du bouton "Se déconnecter".
                                                            Vous avez alors une fenêtre qui s'ouvre où vous pouvez modifier les différentes informations liées à votre profil.
                                                        </li>
                                                    </ul>
                                                </li>
                                           </ul>
                                        </div>     
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateProfile" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/UpdateMyself.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>             
                        </div>
                </div>

                <div class="mt-5"id="PageTraining">
                    <hr id="UpdateTraining" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateTraining" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateTraining" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateTraining" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>Pour modifier une formation, vous devez réaliser l'action suivante : 
                                                    <ul>
                                                        <li>Dans un premier temps, vous devez vous situer dans la formation que vous souhaitez modifier.</li>
                                                        <li>Si vous vous situez au niveau de la formation que vous souhaitez modifier, il ne vous reste plus qu'à cliquer sur le bouton bleu où il est écrit "Modification".</li>
                                                        <li>Vous avez alors une fenêtre qui s'ouvre ou vous pouvez modifier le nom, le niveau, l'image et la description de la formation.</li>
                                                    </ul>

                                                </li>
                                            </ul>
                                        </div>     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "EditFormation.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateTraining" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/UpdateTraining.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="DeleteTraining2" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer une formation depuis la page de la formation 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteTraining2" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteTraining2" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteTraining2" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteFormation.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour supprimer une formation, vous devez réaliser l'action suivante :
                                                    <ul>
                                                        <li>
                                                            Vous devez cliquer sur le bouton bleu où il est écrit "Suppression". Il ne vous reste plus qu'à valider la suppression de la formation.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteTraining2" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteTrainingPage.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>  
                        </div>

                    <hr id="AddUser2" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ajouter un utilisateur depuis la page de la formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddUser2" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddUser2" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddUser2" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>Pour ajouter un utilisateur depuis la page de la formation, vous devez réaliser les étapes suivantes :
                                                    <ul>
                                                        <li>Cliquer sur le bouton "nouveau" en haut à droite de la page.</li>
                                                        <li>Vous devez ensuite cliquer sur le personnage pour choisir une photo de profil à l'utilisateur. Vous pouvez enfin choisir le nom, le prénom, le type de mot de passe, le mot de passe et enfin le rôle de l'utilisateur à ajouter.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "AddUser2.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddUser2" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddUserTrainingPage.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>     
                        </div>

                    <hr id="UpdateEducator" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier les informations d'un éducateur d'une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateEducator" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateEducator" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateEducator" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "EditEducator.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour modifier les informations d'un éducateur, vous devez réaliser les actions suivantes :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous devez vous situer au niveau de la liste des éducateurs.
                                                        </li>
                                                        <li>
                                                            Ensuite, vous devez cliquer sur l'icône représentant un œil situé en dessous de nom et de prénom de l'éducateur que vous souhaitez modifier.
                                                        </li>
                                                        <li>
                                                            Une fois la fenêtre ouverte, vous pouvez modifier l'ensemble des champs associés à l'utilisateur.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateEducator" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/" type="video/mp4">
                                    </video>
                                </div>
                            </div>  
                        </div>

                    <hr id="DeleteEducator" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer un éducateur d'une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteEducator" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteEducator" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteEducator" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>Pour supprimer un éducateur, vous devez réaliser les actions suivantes :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous devez vous situer au niveau de la liste des éducateurs.
                                                        </li>
                                                        <li>
                                                            Ensuite, vous devez cliquer sur l'icône représentant une poubelle située en dessous de nom et de prénom de l'éducateur que vous souhaitez supprimer.
                                                            Il ne vous reste plus qu'à valider la suppression de l'éducateur.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "DeleteEducator.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteEducator" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteEducator.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>         
                        </div>

                    <hr id="DeleteStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                 Comment supprimer un étudiant d'une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteStudent.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour supprimer un étudiant, vous devez réaliser les actions suivantes :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous devez vous situer au niveau de la liste des étudiants.
                                                        </li>
                                                        <li>
                                                            Ensuite, vous devez cliquer sur l'icône représentant une poubelle située en dessous de nom et de prénom de l'étudiant que vous souhaitez supprimer.
                                                            Il ne vous reste plus qu'à valider la suppression de l'étudiant.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>      
                        </div>

                    <hr id="ConsultStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment consulter un étudiant d'une formation
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextConsultStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>
                                                    Pour consulter un étudiant, vous devez réaliser les actions suivantes :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous vous devez vous situer au niveau de la liste des étudiants.
                                                        </li>
                                                        <li>
                                                            Ensuite, vous devez cliquer sur l'icône représentant un œil situé en dessous du nom et du prénom de l'étudiant que vous souhaitez consulter.
                                                            Vous arrivez sur la page de l'étudiant
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "ConsultStudent.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoConsultStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/ConsultStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <hr id="ExportStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment exporter les informations d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextExportStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoExportStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextExportStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "ExportStudent.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour exporter les informations d'un étudiant, vous devez réaliser les actions suivantes :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous devez vous situer au niveau de la liste des étudiants.
                                                        </li>
                                                        <li>
                                                            Ensuite, vous devez cliquer sur l'icône représentant un carré avec une flèche qui pointe vers le bas situé en dessous du nom et du prénom de l'étudiant que vous souhaitez exporter.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoExportStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/ExportStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                </div>


                <div class="mt-5"id="PageStudent">
                    <hr id="UpdateStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier le profil d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">    
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>
                                                Pour modifier le profil d'un étudiant, vous devez dans un premier temps vous situer au niveau de la page d'un étudiant.
                                                    <ul>
                                                        <li>
                                                            Si vous vous situez au niveau de la page d'un étudiant, pour modifier son profil, vous devez cliquer sur l'icône représentant un stylo au niveau du bouton bleu.
                                                            Vous pouvez ainsi modifier les informations de l'étudiant. 
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "EditStudent.png" ?>" alt=""  style="width: 300px;">
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/EditStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="CreateNewForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment créer une nouvelle fiche à un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextCreateNewForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoCreateNewForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextCreateNewForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "CreateForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour créer une nouvelle fiche a un étudiant, vous devez dans un premier temps vous situer au niveau de la page d'un étudiant.
                                                </li>
                                                <li>
                                                    Une fois que c'est le cas, vous devez cliquer sur l'icône représentant une fiche avec le logo "plus".
                                                    Vous devez ensuite choisir sur quelle session créer la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                          
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoCreateNewForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddFormStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="ConsultStudentProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment consulter la progression d'un étudiant 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultStudentProgress" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultStudentProgress" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextConsultStudentProgress" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>
                                                    Pour consulter la progression d'un étudiant, vous devez dans un premier temps vous situer au niveau de la page d'un étudiant.
                                                </li>
                                                <li>
                                                    Une fois que c'est le cas, vous devez cliquer sur l'icône représentant un graphe. Vous arrivez ensuite sur la page permettant de consulter la progression d'un étudiant.
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "ViewStat.png" ?>" alt=""  style="width: 300px;">
                                        </div>       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoConsultStudentProgress" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/StudentProgression.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="AddCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ajouter un commentaire à un étudiant 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddCommentStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddCommentStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddCommentStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "AddComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour avoir accès au bouton : "Ajouter un commentaire", vous devez respecter la condition suivante :
                                                    <ul>
                                                        <li>
                                                            Vous ne devez pas déjà posséder un commentaire.
                                                            Si vous en possédez déjà un, le bouton n'apparaîtra pas, vous ne pourrez que modifier ou supprimer votre commentaire déjà existant.
                                                        </li> 
                                                        <li>
                                                            Si le bouton "Ajouter un commentaire" apparaît, cliquez sur le bouton et à remplir le champ "contenu" pour ajouter le commentaire.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddCommentStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                                    
                        </div>

                    <hr id="UpdateCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier le commentaire d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateCommentStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateCommentStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateCommentStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de modifier un commentaire, vous devez respecter la condition suivante :
                                                    <ul>  
                                                        <li>
                                                            Vous devez avoir déjà écrit un commentaire au niveau du profil de l'étudiant.
                                                            Si vous n'en possédez pas déjà un, le bouton permettant de modifier le commentaire n'apparaîtra pas, et vous ne pourrez donc pas modifier le commentaire.
                                                        </li>
                                                        <li>
                                                            Si le bouton avec une icône de crayon apparaît à droite du commentaire, cliquez dessus pour modifier le commentaire
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "EditComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>     
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/EditCommentStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>    
                        </div>

                    <hr id="DeleteCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer le commentaire d'un étudiant 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteCommentStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteCommentStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContentDeleteCommentStudent">
                                <div class="tab-pane fade show active" id="nav-HelpText" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de supprimer un commentaire, vous devez respecter la condition suivante :
                                                    <ul> 
                                                        <li>
                                                            Vous devez avoir déjà écrit un commentaire au niveau du profil de l'étudiant.
                                                            Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire.
                                                        </li>
                                                        <li>
                                                            Si le bouton avec une icône de poubelle apparaît, cliquez dessus et valider la suppression pour supprimer le commentaire.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteCommentStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>      
                        </div>

                    <hr id="ConsultSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                    <div class="div-block">
                        <h3>
                            Comment consulter les informations d'une fiche
                            <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                        </h3>
                        <nav class="mt-5">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-HelpTextConsultSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                <div class="d-flex flex-column flex-md-row">    
                                    <div class="d-flex align-items-center lh-lg div-text me-4">
                                        <ul>
                                            <li>Pour consulter les informations d'une fiche, vous devez réaliser l'action suivante :
                                                <ul>
                                                    <li>Vous devez cliquer sur l'icône représentant une fiche située au-dessus du nom de la session que vous souhaitez consulter.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                        <img src="<?= PATH_IMG . "ConsultSession.png" ?>" alt=""  style="width: 300px;">
                                    </div>    
                                </div> 
                            </div>
                            <div class="tab-pane fade" id="nav-HelpVideoConsultSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                <video controls width="100%" class="mx-auto">
                                    <source src="/assets/video/superadmin/ConsultSessionStudent.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>      
                    </div>
                </div>

                <div class="mt-5" id="PageSessionStudent">
                    <hr id="ConsultFormStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment consulter la fiche associée à une session
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultFormStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultFormStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextConsultFormStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "ConsultForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            Pour consulter une fiche, vous devez dans un premier temps vous situer sur la session de la fiche. 
                                            Ensuite, il faut cliquer sur l'icône de la fiche comme indiqué sur l'image. 
                                            Si vous avez cliqué sur une session en cours ou planifiée, vous pourrez modifier la fiche. 
                                            Si la session sur laquelle vous avez cliqué est marquée comme "Terminée", vous ne pourrez que consulter la fiche.
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoConsultFormStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/ConsultFormSession.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>               
                        </div>

                    <hr id="OpenStudentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ouvrir la fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextOpenStudentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoOpenStudentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextOpenStudentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour rendre une fiche accessible à la modification pour l'étudiant, vous devez respecter certaines conditions.
                                                    <ul>
                                                        <li>
                                                        Vous devez dans un premier temps avoir cliqué sur une session considérée comme "Terminée" au niveau de la liste des sessions.
                                                        </li>
                                                        <li>
                                                        Si vous n'êtes pas sur une session considérer comme "Terminée" le bouton permettant de rendre accessible la session n'apparaîtra pas.   
                                                        </li>
                                                        <li>
                                                        Si le bouton où il est écrit "Ouvrir" en dessous de l'icône de la fiche apparaît, vous n'avez qu'à cliquer dessus pour rendre accessible la fiche.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "OpenForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>   
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoOpenStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/OpenForm.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>       
                        </div>

                    <hr id="CloseStudentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment rendre la fiche inaccessible à la modification pour l'étudiant.
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextCloseStudentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoCloseStudentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextCloseStudentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "CloseForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                Pour rendre une fiche inaccessible à la modification pour l'étudiant, vous devez respecter certaines conditions.
                                                    <ul>
                                                        <li>
                                                            Vous devez dans un premier temps avoir cliqué sur une session considérée comme "en cours" ou "planifiée" au niveau de la liste des sessions.
                                                        </li>
                                                        <li>
                                                            Si vous n'êtes pas sur une session considérer comme "en cours" ou "planifiée" le bouton permettant de rendre inaccessible la session n'apparaîtra pas.
                                                        </li>
                                                        <li>
                                                            Si le bouton où il est écrit "Terminer" en dessous de l'icône de la fiche apparaît, vous n'avez qu'à cliquer dessus pour rendre inaccessible la fiche.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>    
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoCloseStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/CloseForm.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>          
                        </div>

                    <hr id="DeleteStudentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer une fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteStudentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteStudentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteStudentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row"> 
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            
                                            <ul>
                                                <li>
                                                Pour supprimer une fiche, vous devez respecter certaines conditions : 
                                                    <ul>
                                                        <li>
                                                            Vous devez dans un premier temps vous situer sur la session que vous souhaitez supprimer.
                                                        </li>
                                                        <li>
                                                            Pour la supprimer, vous devez cliquer sur le bouton où il est écrit "supprimer" situé en dessous de la fiche.
                                                            Il ne vous reste plus qu'à valider la suppression.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div> 
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "DeleteForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>  
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteStudentSession.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>  
                        </div>
                    <hr id="AddCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ajouter un commentaire à la fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddCommentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddCommentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddCommentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "AddComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant d'ajouter un commentaire, vous devez respecter la condition suivante :
                                                    <ul>
                                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires".</li> 
                                                        <li>Pour ajouter un commentaire à la fiche d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."</li>
                                                        <li>Vous pouvez ainsi remplir les différents champs. Le champ "note" attends des notes allant de 0 a 20.</li>
                                                        <li>Vous pouvez également choisir de rendre visible ou invisible votre commentaire à l'étudiant en cliquant sur le bouton "Visible uniquement par l'équipe pédagogique."</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddCommentSession.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>         
                        </div>

                    <hr id="UpdateCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier un commentaire sur la fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateCommentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateCommentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateCommentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de modifier un commentaire, vous devez respecter la condition suivante :
                                                    <ul>  
                                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires."</li>
                                                        <li>Vous devez également avoir déjà écrit un commentaire sur la fiche de l'étudiant.</li>
                                                        <li>Si vous n'en possédez pas déjà un, le bouton permettant de modifier le commentaire n'apparaîtra pas, et vous ne pourrez donc pas modifier le commentaire.</li>
                                                        <li>Si le bouton avec une icône de crayon apparaît à droite du commentaire, cliquez dessus pour modifier le commentaire.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "EditComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/EditComment.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>     
                        </div>

                    <hr id="DeleteCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">   
                            <h3>
                                Comment supprimer un commentaire à la fiche d'un étudiant 
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteCommentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteCommentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeleteCommentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de supprimer un commentaire, vous devez respecter la condition suivante :
                                                    <ul> 
                                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires."</li>
                                                        <li>
                                                            Vous devez également avoir déjà écrit un commentaire sur la fiche de l'étudiant.
                                                            Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire.
                                                        </li>
                                                        <li>
                                                            Si le bouton avec une icône de poubelle apparaît, cliquez dessus et valider la suppression pour supprimer le commentaire.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteComment.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="AddAudioCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">   
                            <h3>
                                Comment ajouter un commentaire audio à une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddAudioCommentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddAudioCommentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant d'ajouter un commentaire audio, vous devez respecter la condition suivante :
                                                    <ul> 
                                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires audios."</li>
                                                        <li>
                                                            Pour ajouter un commentaire audio à la fiche d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."
                                                        </li>
                                                        <li>
                                                            Vous devez ensuite cliquer sur le bouton "commencé" pour commencer l'enregistrement et "Arrêter" pour l'arrêter. 
                                                            Vous pouvez enfin cliquer sur valider si celui-ci vous convient.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "AddAudioComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddAudioComment.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="DeleteAudioCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">   
                            <h3>
                                Comment supprimer un commentaire audio à la fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteAudioCommentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteAudioCommentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "DeleteAudioComment.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de supprimer un commentaire audio, vous devez respecter la condition suivante :
                                                    <ul> 
                                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires audios."</li>
                                                        <li>
                                                            Vous devez également avoir déjà enregistré un commentaire au niveau de la session de l'étudiant.
                                                            Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire audio.
                                                        </li>
                                                        <li>
                                                            Si le bouton avec une icône de poubelle apparaît, cliquezr dessus et validez la suppression pour supprimer le commentaire.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeleteAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeleteAudioComment.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>




                    <hr id="AddPhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment ajouter une photo à la fiche d'un étudiant
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddPhotoSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddPhotoSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextAddPhotoSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour ajouter une photo sur la fiche, réalisez la liste d'opérations suivante :
                                                    <ul>
                                                        <li>Dans un premier temps, cliquez sur l'icône bleue formant un "plus" où il est écrit en dessous "Ajouter une photo."</li>
                                                        <li>Une fenêtre s'ouvre alors.</li>
                                                        <li>Pour choisir la photo, cliquez sur le bouton bleu formant un "plus". Une fois, la photo choisie, choisissez le titre de la photo et cliquez sur "valider".</li>  
                                                    </ul>
                                                </li>    
                                            </ul>
                                        </div> 
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "AddPicture.png" ?>" alt=""  style="width: 300px;">
                                        </div>      
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoAddPhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/AddPicture.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>       
                        </div>

                    <hr id="TakePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment prendre une photo sur une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextTakePhotoSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoTakePhotoSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextTakePhotoSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "TakePicture.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>	
                                                Pour prendre une photo depuis une fiche, vous devez dans un premier temps cliquer sur l'icône représentant un appareil photo où il est écrit en dessous "Prendre une photo".
                                                Une fenêtre s'ouvre alors.
                                                Plusieurs options sont disponibles :
                                                    <ul>
                                                        <li>
                                                            Si vous souhaitez changer de camera, cliquez sur l'icône représentant un cercle au centre du bouton gris.
                                                        </li>
                                                        <li>
                                                            Si vous souhaitez annuler la prise de photo, cliquez sur l'icône représentant une croix au centre du bouton rouge.
                                                        </li>
                                                        <li>
                                                            Si vous souhaitez prendre la photo, cliquez sur l'icône représentant un appareil photo au centre du bouton bleu.
                                                            Pour valider la prise de la photo, choisissez un titre et cliquez sur le bouton vert.
                                                        </li>
                                                    </ul>
                                                </li>    
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoTakePhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/takepicturesession.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        
                    <hr id="DeletePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment supprimer une photo sur une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeletePhotoSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeletePhotoSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextDeletePhotoSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour avoir accès au bouton permettant de supprimer une photo, vous devez respecter la condition suivante :
                                                    <ul>
                                                        <li>Vous devez avoir déjà posté une photo au niveau de la session.</li>
                                                        <li>Si vous n'en possédez pas déjà une, le bouton permettant de supprimer la photo n'apparaîtra pas, et vous ne pourrez donc pas supprimer la photo.</li>
                                                        <li>Si le bouton avec une icône de poubelle apparaît en haut à droite de la photo, cliquez dessus et validez la suppression pour supprimer la photo.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "DeletePicture.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoDeletePhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/DeletePicture.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="mt-5" id="PageCreateForm">
                    <hr id="BackgroudColor" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la couleur de fond lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextBackgroudColor" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoBackgroudColor" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextBackgroudColor" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">     
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "CouleurFond.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour modifier la couleur de fond lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. Dans notre cas, pour modifier la couleur de fond de la fiche, vous devez cliquer sur le carré en dessous de l'écriture "couleur fond".
                                                    Vous pouvez ainsi choisir la couleur de fond de la fiche. Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoBackgroudColor" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/couleurfond.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="GlobalColor" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la couleur globale lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextGlobalColor" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoGlobalColor" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextGlobalColor" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>
                                                    Pour modifier la couleur globale lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. Dans notre cas, pour modifier la couleur globale de la fiche, vous devez cliquer sur le carré en dessous de l'écriture "couleur global".
                                                    Vous pouvez ainsi choisir la couleur de fond de la fiche. Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "CouleurGlobal.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoGlobalColor" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/CouleurGlobal.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="TextToSpeech" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment activer et désactiver le text to speech lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextTextToSpeech" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoTextToSpeech" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextTextToSpeech" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "TextToSpeechEntirePage.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour activer le text to speech lors de la création d'une fiche, vous devez dans un premier temps vous situé dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour activer le text to speech a l'ensemble de la fiche, vous devez activer ou désactiver le bouton situé en dessous de l'écriture "Text to speech". 
                                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>     
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoTextToSpeech" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/TTS.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateColorPolice" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la couleur de la police de caractère lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateColorPolice" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateColorPolice" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateColorPolice" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>
                                                Pour modifier la couleur de la police de caractère lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour modifier la couleur de la police de caractère de la fiche, vous devez cliquer sur le carré en dessous de l'écriture "couleur police".
                                                    Vous pouvez ainsi choisir la couleur de la police de la fiche. Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "CouleurPolice.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateColorPolice" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/PoliceColor.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdatePoliceForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la police de caractère lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdatePoliceForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdatePoliceForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContentUpdatePoliceForm">
                                <div class="tab-pane fade show active" id="nav-HelpText" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "TypePoliceForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour modifier la police de caractère lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour modifier la police de caractère de la fiche, vous devez cliquer sur le menu déroulant en dessous de l'écriture "police".
                                                    Vous pouvez ainsi choisir la police de la fiche. Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                
                                            </ul>
                                        </div>       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdatePoliceForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/ChangePoliceCaractere.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="ActivateBold" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                 Comment mettre en gras le texte lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextActivateBold" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoActivateBold" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextActivateBold" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour mettre en gras le texte lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.</li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour mettre en gras le texte de la fiche, vous devez activer ou désactiver le bouton situé en dessous de l'écriture "B". 
                                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "MiseEnGrasForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoActivateBold" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/Bold.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="ActivateSTT" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment activer et désactiver le speech to text lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextActivateSTT" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoActivateSTT" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextActivateSTT" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "STT.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour activer le speech to text lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour activer le speech to text a l'ensemble de la fiche, vous devez activer ou désactiver le bouton situé en dessous du symbole du micro. 
                                                    Cette modification sera appliquez à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>     
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoActivateSTT" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/STT.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateLevelForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment changer le niveau de difficulté lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateLevelForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateLevelForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateLevelForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour changer la difficulté lors de la création de la fiche, dans un premier temps, vous situez dans l'outil de création d'une fiche.</li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour changer le niveau de difficulté, vous devez choisir parmi les valeur 1, 2 ou 3 en cliquant sur les cercles a coté des numéros. 
                                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "DifficultyForm.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateLevelForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/LevelForm.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateFieldSize" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la taille des champs lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateFieldSize" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateFieldSize" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateFieldSize" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "TailleChamp.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour modifier la taille des champs lors de la création de la fiche, dans un premier temps, vous situé dans l'outil de création d'une fiche.</li>
                                                <li>
                                                    Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                    Dans notre cas, pour changer la taille des champs, vous pouvez faire varier la barre se situant en dessous de l'écriture "Taille champs". 
                                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>      
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateFieldSize" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/TailleChamps.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateFrameSize" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier la taille des cadres lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateFrameSize" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateFrameSize" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateFrameSize" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                                            <ul>
                                                <li>
                                                Pour modifier la taille des cadres lors de la création de la fiche, dans un premier temps, vous situé dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                Si c'est le cas, vous devriez voir apparaître une liste de modifications possibles. 
                                                Dans notre cas, pour changer la taille des cadres, vous pouvez faire varier la barre se situant en dessous de l'écriture "Taille cadres". 
                                                Cette modification sera appliquée à l'ensemble de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "TailleCadre.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateFrameSize" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/TailleCadres.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateFieldsVisibility" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment rendre visible ou invisible certains champs lors de la création de la fiche.
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateFieldsVisibility" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateFieldsVisibility" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateFieldsVisibility" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "ChampVisibleInvisible.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>Pour rendre visible ou invisible certains champs lors de la création de la fiche, dans un premier temps, vous situez dans l'outil de création d'une fiche.</li>
                                                <li>
                                                    Si c'est le cas, en cliquant sur l'élément que vous souhaiter modifier, que ce soit un élément précis ou un cadre en entier, vous devriez voir apparaître différentes options.
                                                    En cliquant sur l'œil, cela a pour effet de rendre visible ou invisible le champ pour l'étudiant lors de la consultation de la fiche.
                                                </li>
                                            </ul>
                                        </div>     
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateFieldsVisibility" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/VisibleInvible.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateTextToSpeechFields" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment activer et désactiver le text to speech lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateTextToSpeechFields" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateTextToSpeechFields" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateTextToSpeechFields" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>Pour activer le text to speech sur certains champs lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.</li>
                                                <li>Si c'est le cas, en cliquant sur l'élément sur lequel vous souhaiter activer le text to speech vous devriez voir apparaître un haut-parleur.</li>
                                                <li>
                                                    En cliquant dessus vous activer et désactiver le text to speech de l'élément en question. 
                                                    Pour savoir si le text to speech est activer sur un élément, un haut-parleur apparaît à droite de l'élément. 
                                                    Cette modification sera appliquée à un élément précis de la fiche.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "ChampAudible.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateTextToSpeechFields" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/TTSElement.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>

                    <hr id="UpdateFieldsForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment modifier un élément précis lors de la création d'une fiche
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateFieldsForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateFieldsForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextUpdateFieldsForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                            <img src="<?= PATH_IMG . "PersonnalisezChamps.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                        <div class="d-flex align-items-center lh-lg div-text">
                                            <ul>
                                                <li>
                                                    Pour modifier un élément précis lors de la création d'une fiche, vous devez dans un premier temps vous situer dans l'outil de création d'une fiche.
                                                </li>
                                                <li>
                                                Si c'est le cas, en cliquant sur l'élément que vous souhaitez modifier, vous devriez voir apparaître un stylo. En cliquant dessus une fenêtre s'ouvre.
                                                </li>
                                                <li>
                                                Vous pouvez ainsi modifier le champ comme bon vous semble. Les différentes fonctionnalités sont décrites au précédemment.
                                                </li>
                                                <li>
                                                Si vous souhaitez modifier un pictogramme, vous pouvez cliquer dessus, vous avez alors la liste des différents pictogrammes qui s'ouvre. Vous pouvez choisir celui qui vous convient.
                                                </li>
                                            </ul>
                                        </div>       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoUpdateFieldsForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/EditElement.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                </div>


                <div class="mt-5" id="PageStudentProgress">
                    <hr id="ConsultFormProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                        <div class="div-block">
                            <h3>
                                Comment consulter la fiche associé à une note
                                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                            </h3>
                            <nav class="mt-5">
                                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultFormProgress" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultFormProgress" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-HelpTextConsultFormProgress" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                                    <div class="d-flex flex-column flex-md-row"> 
                                        <div class="d-flex align-items-center lh-lg div-text me-4">
                                            <ul>
                                                <li>
                                                    Pour consulter la fiche associé a une note, vous devez respecter certaines conditions :
                                                    <ul>
                                                        <li>
                                                            Dans un premier temps, vous devez sur la page qui permet de consulter la progression d'un élève.
                                                        </li>
                                                        <li>
                                                            Ensuite, en cliquant sur une note au niveau du graphique, vous vous déplacerez sur la fiche ou la note en question a été attribuée.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                            <img src="<?= PATH_IMG . "ConsultFormGraph.png" ?>" alt=""  style="width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-HelpVideoConsultFormProgress" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                                    <video controls width="100%" class="mx-auto">
                                        <source src="/assets/video/superadmin/NoteProgressionStudent.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
</div> 
<script>
    document.querySelectorAll(".btn-audio").forEach(btn => {
        btn.addEventListener("click", e => {
            const msg = new SpeechSynthesisUtterance();
            msg.voice = speechSynthesis.getVoices()[2];
            msg.text = btn.closest(".div-block").querySelector(".div-text").innerText;
            msg.lang = 'fr';
            speechSynthesis.speak(msg);
        });
    });
</script>
<?php $content = ob_get_clean();
    require("../app/views/layout.php");
    ?>