<?php $title = "Page Aide EducAdmin";
$bsIcons = true;
define("PATH_IMG", "/assets/images/help/EducatorAdmin/");
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
            Prise en main compte éducateur-admin
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
                                        <li class=" mt-3"><a href="#ConsultListSession" class="text-decoration-none text-dark">Consulter la liste des sessions</a></li>
                                        <li class=" mt-3"><a href="#ConsultListStudent" class="text-decoration-none text-dark">Consulter la liste des étudiants</a></li>
                                        <li class=" mt-3"> <a href="#AddSession" class="text-decoration-none text-dark">Ajouter une session</a></li>
                                        <li class=" mt-3"><a href="#ConsultSessionAccueil" class="text-decoration-none text-dark">Consulter une session</a></li>
                                        <li class=" mt-3"><a href="#UpdateStudentAccueil" class="text-decoration-none text-dark">Mettre a jour les informations d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#ConsultStudent" class="text-decoration-none text-dark">Consulter le profil d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#UpdateProfile" class="text-decoration-none text-dark">Modifier son profil</a></li>
                                        <li class=" mt-3"><a href="#AddMaterial" class="text-decoration-none text-dark">Ajouter un materiau</a></li>
                                        <li class=" mt-3"><a href="#AddPicto" class="text-decoration-none text-dark">Ajouter un pictogramme</a></li>
                                    </ul>
                                </li>

                                <li class=" mt-3"> <a href="#PageSession" class="text-decoration-none text-dark">Page accueil session</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"> <a href="#ModifSession" class="text-decoration-none text-dark">Modifier une session</a></li>
                                        <li class=" mt-3"><a href="#DeleteSession" class="text-decoration-none text-dark">Supprimer une session</a></li>
                                        <li class=" mt-3"><a href="#OpenSession" class="text-decoration-none text-dark">Ouvrir une session</a></li>
                                        <li class=" mt-3"><a href="#CloseSession" class="text-decoration-none text-dark">Fermer une session</a></li>
                                        <li class=" mt-3"><a href="#scheduleSession" class="text-decoration-none text-dark">Planifier une session</a></li>
                                        <li class=" mt-3"><a href="#UnscheduleSession" class="text-decoration-none text-dark">Déplanifier une session</a></li>
                                        <li class=" mt-3"><a href="#AddForm" class="text-decoration-none text-dark">Ajouter une fiche</a></li>
                                        <li class=" mt-3"><a href="#ConsultSessionStudent" class="text-decoration-none text-dark">Consulter la session d'un étudiant</a></li>
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
                                        <li class=" mt-3"><a href="#AddPhotoSession" class="text-decoration-none text-dark">Ajouter une photo à la session d'un etudiant</a></li>
                                        <li class=" mt-3"><a href="#TakePhotoSession" class="text-decoration-none text-dark">Prendre une photo de la session d'un étudiant </a></li>
                                        <li class=" mt-3"><a href="#DeletePhotoSession" class="text-decoration-none text-dark">Supprimer une photo de la session d'un étudiant </a></li>
                                    </ul>
                                </li>
                            
                                <li class=" mt-3"> <a href="#PageStudent" class="text-decoration-none text-dark">Page étudiant</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#UpdateStudent" class="text-decoration-none text-dark">Mettre a jour les informations d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#CreateNewForm" class="text-decoration-none text-dark">Création d'une nouvelle fiche</a></li>
                                        <li class=" mt-3"><a href="#ConsultStudentProgress" class="text-decoration-none text-dark">Consulter la progression d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddCommentStudent" class="text-decoration-none text-dark">Ajouter un commentaire</a></li>
                                        <li class=" mt-3"><a href="#UpdateCommentStudent" class="text-decoration-none text-dark">Modifier un commentaire</a></li>
                                        <li class=" mt-3"><a href="#DeleteCommentStudent" class="text-decoration-none text-dark">Supprimer un commentaire</a></li>
                                        <li class=" mt-3"><a href="#ConsultSession" class="text-decoration-none text-dark">Consulter une session</a></li>

                                    </ul>
                                </li>

                                <li class=" mt-3"> <a href="#PageCreateForm" class="text-decoration-none text-dark">Page création d'une fiche</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#BackgroudColor" class="text-decoration-none text-dark">Couleur de fond de la fiche</a></li>
                                        <li class=" mt-3"><a href="#GlobalColor" class="text-decoration-none text-dark">Couleur global de la fiche</a></li>
                                        <li class=" mt-3"><a href="#TextToSpeech" class="text-decoration-none text-dark">Activer le text to speech</a></li>
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
    <div id="PageAccueil" class="mt-5">

        <hr id="ConsultListSession" class="d-none d-md-block mt-4 mb-5 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter la liste des sessions 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultListSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultListSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextConsultListSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "ConsultListSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour consulter des sessions, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>Vous devez cliquer sur le bouton intitulé "Sessions" situé en haut gauche en dessous du bouton "picto". Si le bouton est grisé, c'est que vous êtes déjà sur la liste des sessions.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultListSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/consultsessionlist.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="ConsultListStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter la liste des élèves
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultListStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultListStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextConsultListStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour consulter des élèves, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>Vous devez cliquer sur le bouton intitulé "Élève" situé en haut gauche en dessous du bouton "picto". Si le bouton est grisé, c'est que vous êtes déjà sur la liste des sessions.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>    
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "ConsultListEleve.png" ?>" alt=""  style="width: 300px;">
                        </div> 
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultListStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/consultstudentlist.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="AddSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter une session 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextAddSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "AddSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour ajouter une session, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>Vous devez cliquer sur le bouton bleu intitulé "Ajouter une session" située en haut à gauche. Vous avez alors une fenêtre qui s'ouvre où vous pouvez compléter les différents champs.</li>
                                        <li>Vous pouvez choisir de planifier la session ce qui a pour effet de la rendre invisible aux étudiants. </li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>    
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/btnaddsession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        

        <hr id="ConsultSessionAccueil" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultSessionAccueil" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultSessionAccueil" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextConsultSessionAccueil" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>Pour consulter une session, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>
                                            Dans un premier temps, vous devez vous situer au niveau de la liste des sessions.
                                        </li>
                                        <li>
                                            Ensuite, vous devez cliquer sur l'icône ressemblant à un œil situé à droite de la session que vous souhaitez consulter.
                                            Pour savoir si la session est planifiée dans la liste des sessions, un calendrier apparaît à côté de l'œil.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "ConsultSessionAccueil.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultSessionAccueil" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/consultsession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>



        <hr id="UpdateStudentAccueil" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment modifier les informations d'un étudiant
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUpdateStudentAccueil" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUpdateStudentAccueil" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextUpdateStudentAccueil" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "EditStudentAccueil.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour modifier les informations d'un étudiant, vous devez réaliser les actions suivantes :
                                    <ul>
                                        <li>
                                            Dans un premier temps, vous devez vous situer au niveau de la liste des élèves.
                                        </li>
                                        <li>
                                            Ensuite, vous devez cliquer sur l'icône représentant un stylo situé en dessous du nom et du prénom de l'élève que vous souhaitez modifier.
                                            Une fois la fenêtre ouverte, vous pouvez modifier l'ensemble des champs associé à l'élève.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUpdateStudentAccueil" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/editstudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="ConsultStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter le profil d'un élève 
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
                                Pour consulter le profil d'un élève, vous devez réaliser les actions suivantes.
                                    <ul>
                                        <li>
                                            Dans un premier temps, vous devez vous situer au niveau de la liste des élèves.
                                        </li>
                                        <li>
                                            Ensuite, vous devez cliquer sur l'icône représentant un "i" situé en dessous du nom et du prénom de l'étudiant que vous souhaitez consulter. Vous arrivez sur la page de l'élève.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "ConsultStudentAccueil.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/consultstudent.mp4" type="video/mp4">
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
                                <li>Pour modifier votre profil, vous devez réaliser l'action suivante :
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
                        <source src="/assets/video/educatoradmin/editmyself.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="AddMaterial" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter un matériau 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddMaterial" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddMaterial" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextAddMaterial" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour ajouter un matériau, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>
                                            Vous devez cliquer sur le bouton bleu intitulé "Material" située en haut à gauche. Une fenêtre s'ouvre alors.
                                        </li>
                                        <li>
                                            Pour choisir le matériau, vous devez cliquer sur le bouton bleu formant un "plus". Une fois, le matériau choisi, il ne vous reste plus qu'à lui choisir un libellé, une description ainsi que les différents types du matériau.
                                            Vous pouvez ensuite cliquer sur le bouton "valider".
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 ms-sm-auto">
                            <img src="<?= PATH_IMG . "AddMaterial.png" ?>" alt=""  style="width: 300px;">
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddMaterial" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddMaterial.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="AddPicto" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter un pictogramme 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddPicto" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddPicto" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextAddPicto" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "AddPicto.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour ajouter un pictogramme, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>
                                            Vous devez cliquer sur le bouton bleu intitulé "Picto" situé en haut à gauche. T
                                            Une fenêtre s'ouvre alors.
                                        </li>
                                        <li>
                                            Pour choisir le pictogramme, vous devez cliquer sur le bouton bleu formant un "plus". 
                                            Une fois le pictogramme choisi, il ne vous reste plus qu'à choisir le titre du pictogramme et cliquer sur "valider".
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddPicto" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddPicto.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
    </div>

    <div id="PageSession" class="mt-5">

        <hr id="ModifSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment modifier une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextModifSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoModifSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextModifSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>
                                    Pour modifier une session, vous devez vous situer sur la session que vous souhaitez modifier. Pour la modifier, vous devez cliquer sur l'icône du crayon qui se situe en dessous de la description de la session.
                                </li>
                                <li>
                                    Vous avez alors une fenêtre qui s'ouvre ou vous pouvez modifier le nom, le thème ainsi que la description de la session.
                                </li>
                            </ul>
                        </div>     
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "EditSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoModifSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/editsession.mp4" type="video/mp4">
                    </video>                       
                </div>  
            </div>
        </div>

        <hr id="DeleteSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment supprimer une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextDeleteSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "DeleteSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour supprimer une session, vous devez vous situer sur la session que vous souhaitez supprimer.</li>
                                <li>
                                    Pour la supprimer, vous devez cliquer sur l'icône de la poubelle qui se situe en dessous de la description de la session.
                                    Il ne vous reste plus qu'à valider la suppression de la session.
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeleteSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/deletesession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="OpenSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment rendre accessible à la modification l'ensemble des fiches d'une session pour les étudiants.
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextOpenSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoOpenSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextOpenSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour rendre accessible à la modification l'ensemble des fiches d'une session pour les étudiants, vous devez respecter certaines conditions :
                                    <ul>
                                        <li>Vous devez dans un premier temps avoir cliqué sur une session considérée comme fermée. </li>
                                        <li>
                                            Pour savoir si la session sur laquelle vous êtes est fermée, une icône de clé apparaît dans un bouton en dessous de la description
                                            S'il y en a un bouton avec une icône de croix, c'est que la session est déjà ouverte.
                                            Pour ouvrir la session, vous devez cliquer sur l'icône de la clé.
                                        </li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "OpenSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoOpenSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/opensession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="CloseSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment rendre inaccessible à la modification l'ensemble des fiches d'une session pour les étudiants.
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextCloseSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoCloseSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextCloseSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "CloseSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour rendre inaccessible à la modification l'ensemble des fiches d'une session pour les étudiants, vous devez respecter certaines conditions :
                                    <ul>
                                        <li>Vous devez dans un premier temps avoir cliqué sur une session considérée comme "ouverte" ou qui n'est pas planifiée.</li>
                                        <li>
                                            Pour savoir si la session sest ouverte, une icône de croix apparaît dans un bouton en dessous de la description.
                                            S'il y a un bouton avec une icône de clé, c'est que la session est déjà fermée.
                                            Pour savoir si la session est planifiée, une icône de calendrier apparaît à côté de l'œil au niveau de la liste des sessions.
                                            Pour fermer la session, tu dois cliquer sur l'icône de la croix.
                                        </li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoCloseSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/closesession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="scheduleSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment planifier une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextscheduleSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoscheduleSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextscheduleSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour planifier une session, vous devez respecter certaines conditions :
                                    <ul>
                                        <li>
                                            Vous devez dans un premier temps avoir cliqué sur une session considérée comme "ouverte".
                                            Pour savoir si la session sur laquelle tu es est ouverte, une icône de croix apparaît dans un bouton en dessous de la description.
                                        </li>
                                        <li>    
                                            Vous devez également avoir cliqué sur une session qui n'est pas déjà planifiée. 
                                            Pour savoir si une session est planifiée, un calendrier apparaît à côté de l'œil au niveau de la liste des sessions
                                        </li>
                                        <li>
                                            Pour planifier la session, cliquez sur l'icône de calendrier avec un logo validé.
                                        </li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>  
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "scheduleSession.png" ?>" alt=""  style="width: 300px;">
                        </div>   
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoscheduleSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/scheduleSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="UnscheduleSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment déplanifier une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextUnscheduleSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoUnscheduleSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextUnscheduleSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "UnscheduleSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour déplanifier une session, vous devez respecter certaines conditions:
                                    <ul>
                                        <li>
                                            Vous devez dans un premier temps avoir cliqué sur une session considérée comme planifiée. 
                                            Pour savoir si la session est planifiée, une icône de calendrier se situera au niveau de la liste des sessions.
                                        </li>
                                        <li>
                                            Pour déplanifier la session, cliquez sur l'icône de calendrier avec un logo de croix.
                                        </li>    
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUnscheduleSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/UnscheduleSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        


        <hr id="AddForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter une fiche à une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextAddForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour ajouter une fiche à une session, vous devez vous situer sur la session sur laquelle vous voulez ajouter la fiche.</li>
                                <li>Ensuite, vous devez cliquer sur le bouton "plus" situé au niveau de la liste des fiches. Vous avez alors une fenêtre qui s'ouvre avec la liste des élèves.</li>
                                <li>Il ne vous reste plus qu'à choisir l'étudiant pour lequel vous souhaitez créer la fiche.</li>
                            </ul>
                        
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "AddFormStudent.png" ?>" alt=""  style="width: 300px;">
                        </div>    
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddFromSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="ConsultSessionStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter les informations d'un étudiant sur une session 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultSessionStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultSessionStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextConsultSessionStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "ConsultFormSessionStudent.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg me-4 div-text">
                            <ul>
                                <li>Pour consulter les informations d'un étudiant sur une session, vous devez dans un premier temps vous situer sur la liste des sessions.</li>
                                <li>Ensuite, vous devez cliquer sur l'icône de la fiche pour consulter les informations d'un étudiant sur la session.</li>
                            </ul>
                        </div>   
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultSessionStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/ConsultStudentSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
    </div>

    <div id="PageSessionStudent">

        <hr id="ConsultFormStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter la fiche associé à une session
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
                        <div class="d-flex align-items-center me-4 lh-lg">
                            Pour consulter une fiche, vous devez dans un premier temps vous situer sur la session de la fiche. 
                            Ensuite, il faut cliquer sur l'icône de la fiche comme indiqué sur l'image. 
                            Si vous avez cliqué sur une session en cours ou planifié, vous pourrez modifier la fiche. 
                            Si la session sur laquelle vous avez cliqué est marquée comme "Terminée", vous pourrez uniquement consulter la fiche.
                        </div>    
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "ConsultForm.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultFormStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/ConsultFormSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="OpenStudentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment rendre la fiche accessible à la modification pour l'étudiant.
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ">
                            <img src="<?= PATH_IMG . "OpenForm.png" ?>" alt=""  style="width: 300px;">
                        </div>  
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour rendre une fiche accessible à la modification pour l'étudiant, vous devez respecter certaines conditions.
                                    <ul>
                                        <li>
                                        Vous devez dans un premier temps avoir cliqué sur une session considérée comme "Terminée" au niveau de la liste des sessions.
                                        </li>
                                        <li>
                                        Si vous n'êtes pas sur une session considérée comme "Terminée" le bouton permettant de rendre accessible la session n'apparaîtra pas.   
                                        </li>
                                        <li>
                                        Si le bouton où il est écrit "Ouvrir" en dessous de l'icône de la fiche apparaît, vous n'avez qu'à cliquer dessus pour rendre accessible la fiche.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoOpenStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/opensession.mp4" type="video/mp4">
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
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>
                                Pour rendre une fiche inaccessible à la modification pour l'étudiant, vous devez respecter certaines conditions.
                                    <ul>
                                        <li>
                                            Vous devez dans un premier temps avoir cliqué sur une session considérée comme "en cours" ou "planifiée" au niveau de la liste des sessions.
                                        </li>
                                        <li>
                                            Si vous n'êtes pas sur une session considérée comme "en cours" ou "planifier" le bouton permettant de rendre inaccessible la session n'apparaîtra pas.
                                        </li>
                                        <li>
                                            Si le bouton où il est écrit "Terminer" en dessous de l'icône de la fiche apparaît, vous n'avez qu'à cliquer dessus pour rendre inaccessible la fiche.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "CloseForm.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoCloseStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/closesession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="DeleteStudentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment supprimer une session d'un étudiant 
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "DeleteForm.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>
                                Pour supprimer une session, vous devez respecter certaines conditions : 
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
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeleteStudentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/DeleteStudentSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="AddCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter un commentaire à la session d'un étudiant
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
                        
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                        <ul>
                            <li>Pour avoir accès au bouton permettant d'ajouter un commentaire, vous devez respecter la condition suivante :
                                <ul>
                                    <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires".</li> 
                                    <li>Pour ajouter un commentaire à la session d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."</li>
                                    <li>Vous pouvez ainsi remplir les différents champs. Le champ "note" attend des notes allant de 0 à 20.</li>
                                    <li>Vous pouvez également choisir de rendre visible ou invisible votre commentaire à l'étudiant en cliquant sur le bouton "Visible uniquement par l'équipe pédagogique."</li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "AddComment.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddCommentSession.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="UpdateCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment modifier un commentaire a la une session d'un étudiant
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "EditComment.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour avoir accès au bouton permettant de modifier un commentaire, vous devez respecter la condition suivante :
                                    <ul>  
                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "Commentaires" .</li>
                                        <li>Vous devez également avoir déjà écrit un commentaire au niveau de la session de l'étudiant.</li>
                                        <li>Si vous n'en possédez pas déjà un, le bouton permettant de modifier le commentaire n'apparaîtra pas, et vous ne pourrez donc pas modifier le commentaire.</li>
                                        <li>Si le bouton avec une icône de crayon apparaît à droite du commentaire, il ne te reste plus qu'à cliquer dessus pour modifier le commentaire.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>     
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUpdateCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/EditComment.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="DeleteCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment supprimer un commentaire à la session d'un étudiant 
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
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>Pour avoir accès au bouton permettant de supprimer un commentaire, vous devez respecter la condition suivante :
                                    <ul> 
                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "Commentaires."</li>
                                        <li>
                                            Vous devez également avoir déjà écrit un commentaire au niveau de la session de l'étudiant.
                                            Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer de commentaires.
                                        </li>
                                        <li>
                                            Si le bouton avec une icône de poubelle apparaît, il ne reste plus qu'à cliquer dessus et valider la suppression pour supprimer le commentaire.
                                        </li>
                                    </ul>
                                </li>
                            </ul>  
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "DeleteComment.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeleteCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/DeleteComment.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>

    <hr id="AddAudioCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">   
            <h3>
                Comment ajouter un commentaire audio à une session
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "AddAudioComment.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour avoir accès au bouton permettant d'ajouter un commentaire audio, vous devez respecter la condition suivante :
                                    <ul> 
                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires audios."</li>
                                        <li>
                                            Pour ajouter un commentaire audio à la session d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."
                                        </li>
                                        <li>
                                            Vous devez ensuite cliquer sur le bouton "commencer" pour commencer l'enregistrement et "Arrêter" pour l'arrêter. 
                                            Vous pouvez enfin cliquer sur valider si celui-ci vous convient.
                                        </li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddAudioComment.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>

    <hr id="DeleteAudioCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">   
            <h3>
                Comment supprimer un commentaire audio à la session d'un étudiant
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
                        
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>Pour avoir accès au bouton permettant de supprimer un commentaire audio, vous devez respecter la condition suivante :
                                    <ul> 
                                        <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires audios."</li>
                                        <li>
                                            Vous devez également avoir déjà enregistré un commentaire au niveau de la session de l'étudiant.
                                            Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire audio.
                                        </li>
                                        <li>
                                            Si le bouton avec une icône de poubelle apparaît, il ne reste plus qu'à cliquer dessus et valider la suppression pour supprimer le commentaire.
                                        </li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                            <img src="<?= PATH_IMG . "DeleteAudioComment.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeleteAudioCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/DeleteAudioComment.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    <hr id="AddPhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment ajouter une photo à la session d'un étudiant
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ">
                            <img src="<?= PATH_IMG . "AddPicture.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour ajouter une photo au sein d'une session,vous devez réaliser la liste d'opérations suivante :
                                    <ul>
                                        <li>Dans un premier temps, tu dois cliquer sur l'icône bleue formant un "plus" où il est écrit en dessous "Ajouter une photo."</li>
                                        <li>Une fenêtre s'ouvre alors</li>
                                        <li>Pour choisir la photo, cliquez sur le bouton bleu formant un "plus". Une fois, la photo choisit, il ne reste plus qu'à choisir le titre de la photo et cliquer sur "valider".</li>  
                                    </ul>
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddPhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddPicture.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>

        <hr id="TakePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3>
                    Comment prendre une photo sur une session
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

                            <div class="d-flex align-items-center lh-lg div-text me-4">
                                <ul>
                                    <li>	
                                    Pour prendre une photo depuis une session, vous devez dans un premier temps cliquer sur l'icône représentant un appareil photo où il est écrit en dessous "Prendre une photo".
                                    Une fenêtre s'ouvre alors.
                                    Plusieurs options sont disponibles :
                                        <ul>
                                            <li>
                                                Si vous souhaitez changer de caméra, cliquez sur l'icône représentant un cercle au centre du bouton gris.
                                            </li>
                                            <li>
                                                Si vous souhaitez annuler la prise de photo, cliquez sur l'icône représentant une croix au centre du bouton rouge.
                                            </li>
                                            <li>
                                                Si vous souhaitez prendre la photo, cliquez sur l'icône représentant un appareil photo au centre du bouton bleu.
                                                Pour valider la prise de la photo, il ne reste plus qu'à lui choisir un titre et cliquer sur le bouton vert.
                                            </li>
                                        </ul>
                                    </li>    
                                </ul>
                            </div>
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                <img src="<?= PATH_IMG . "TakePicture.png" ?>" alt=""  style="width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoTakePhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educatoradmin/takepicturesession.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>


        <hr id="DeletePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment supprimer une photo sur une session
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
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                            <img src="<?= PATH_IMG . "DeletePicture.png" ?>" alt=""  style="width: 300px;">
                        </div>
                        <div class="d-flex align-items-center lh-lg div-text">
                            <ul>
                                <li>Pour avoir accès au bouton permettant de supprimer une photo, vous devez respecter la condition suivante :
                                    <ul>
                                        <li>Vous devez avoir déjà posté une photo au niveau de la session.</li>
                                        <li>Si vous n'en possédez pas déjà une, le bouton permettant de supprimer la photo n'apparaîtra pas, et vous ne pourrez donc pas supprimer la photo.</li>
                                        <li>Si le bouton avec une icône de poubelle apparaît en haut à droite de la photo, il ne reste plus qu'à cliquer dessus et valider la suppression pour supprimer la photo.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeletePhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/DeletePicture.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
    </div>

    <div id="PageStudent">

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
                        <source src="/assets/video/educatoradmin/UpdateStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="CreateNewForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment créer une nouvelle fiche
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
                                    Pour créer une nouvelle fiche à un étudiant, vous devez dans un premier temps vous situer au niveau de la page d'un étudiant.
                                </li>
                                <li>
                                    Une fois que c'est le cas, vous devez cliquer sur l'icône représentant une fiche avec le logo "plus" en son centre.
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoCreateNewForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddFormStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="ConsultStudentProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter la progression d'un élève
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
                        <source src="/assets/video/educatoradmin/StudentProgression.mp4" type="video/mp4">
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
                                            Si le bouton "Ajouter un commentaire" apparaît, cliquez sur le bouton et remplissez le champ "contenu" pour ajouter le commentaire.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoAddCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/AddCommentStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="UpdateCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment modifier un commentaire à un étudiant
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
                                            Si le bouton avec une icône de crayon apparaît à droite du commentaire, cliquez dessus pour modifier le commentaire .
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
                        <source src="/assets/video/educatoradmin/EditCommentStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="DeleteCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment supprimer un commentaire à un étudiant 
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteCommentStudent" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteCommentStudent" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextDeleteCommentStudent" role="tabpanel" aria-labelledby="nav-HelpText-tab">
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
                                            Si le bouton avec une icône de poubelle apparaît,cliquez dessus et validez la suppression pour supprimer le commentaire.
                                        </li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoDeleteCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/DeleteCommentStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="ConsultSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter les informations d'une session
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextConsultSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">

                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>Pour consulter les informations d'une session, vous devez réaliser l'action suivante :
                                    <ul>
                                        <li>Vous devez cliquer sur l'icône représentant une fiche située au-dessus du nom de la session que vous souhaitez consulter.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto" style="max-width: 100%;">
                            <img src="<?= PATH_IMG . "ConsultSession.png" ?>" alt=""  style="width: 300px;">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoConsultSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/ConsultSessionStudent.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>

    </div>

    <div id="PageCreateForm">

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
                                    Si c'est le cas, vous devrez voir apparaître une liste de modifications possibles. Dans notre cas, pour modifier la couleur de fond de la fiche, vous devez cliquer sur le carré en dessous de l'écriture "couleur fond".
                                    Vous pouvez ainsi choisir la couleur de fond de la fiche. Cette modification sera apliquée à l'ensemble de la fiche.
                                </li>
                            </ul>
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoBackgroudColor" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/couleurfond.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. Dans notre cas, pour modifier la couleur globale de la fiche, vous devez cliquer sur le carré en dessous de l'écriture "couleur global".
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
                        <source src="/assets/video/educatoradmin/CouleurGlobal.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
                                    Dans notre cas, pour activer le text to speech sur l'ensemble de la fiche, vous devez activer ou désactiver le bouton situé en dessous de l'écriture "Text to speech". 
                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                </li>
                            </ul>                        
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoTextToSpeech" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/TTS.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
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
                        <source src="/assets/video/educatoradmin/PoliceColor.mp4" type="video/mp4">
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
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextUpdatePoliceForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
                                    Dans notre cas, pour modifier la police de caractère de la fiche, vous devez cliquer sur le menu déroulant en dessous de l'écriture "police".
                                    Vous pouvez ainsi choisir la police de la fiche. Cette modification sera appliquée à l'ensemble de la fiche.
                                </li>
                
                            </ul>                        
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUpdatePoliceForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/ChangePoliceCaractere.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
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
                        <source src="/assets/video/educatoradmin/Bold.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
                                    Dans notre cas, pour activer le speech to text a l'ensemble de la fiche, vous devez activer ou désactiver le bouton situé en dessous du symbole du micro. 
                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                </li>
                            </ul>                        
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoActivateSTT" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/STT.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
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
                        <source src="/assets/video/educatoradmin/LevelForm.mp4" type="video/mp4">
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
                                    Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
                                    Dans notre cas, pour changer la taille des champs, vous pouvez faire varier la barre se situant en dessous de l'écriture "Taille champs". 
                                    Cette modification sera appliquée à l'ensemble de la fiche.
                                </li>
                            </ul>                        
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUpdateFieldSize" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/TailleChamps.mp4" type="video/mp4">
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

                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>
                                Pour modifier la taille des cadres lors de la création de la fiche, dans un premier temps, vous situé dans l'outil de création d'une fiche.
                                </li>
                                <li>
                                Si c'est le cas, vous devez voir apparaître une liste de modifications possible. 
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
                        <source src="/assets/video/educatoradmin/TailleCadres.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
        <hr id="UpdateFieldsVisibility" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
            Comment rendre visible ou invisible certain champ lors de la création de la fiche.
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
                                <li>Pour rendre visible ou invisible certain champ lors de la création de la fiche, dans un premier temps, vous situez dans l'outil de création d'une fiche.</li>
                                <li>
                                    Si c'est le cas, en cliquant sur l'élément que vous souhaiter modifier, que ce soit un élément précis ou un cadre en entier, vous devriez voir apparaître différentes options.
                                    En cliquant sur l'œil, cela aura pour effet de rendre visible ou invisible le champ pour l'étudiant lors de la consultation de la fiche.
                                </li>
                            </ul>                        
                        </div>     

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-HelpVideoUpdateFieldsVisibility" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/VisibleInvible.mp4" type="video/mp4">
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
                                <li>Si c'est le cas, en cliquant sur l'élément sur lequel vous souhaiter activer le text to speech vous devez voir apparaître un haut-parleur.</li>
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
                        <source src="/assets/video/educatoradmin/TTSElement.mp4" type="video/mp4">
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
                                Si c'est le cas, en cliquant sur l'élément que vous souhaiter modifier, vous devriez voir apparaître un stylo. En cliquant dessus une fenêtre s'ouvre.
                                </li>
                                <li>
                                Vous pouvez ainsi modifier le champ comme bon vous semble. Les différentes fonctionnalités sont décrites précédemment.
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
                        <source src="/assets/video/educatoradmin/EditElement.mp4" type="video/mp4">
                    </video>                       
                </div>
            </div>
        </div>
    </div>

    <div id="PageStudentProgress">

        <hr id="ConsultFormProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
        <div class="div-block">
            <h3>
                Comment consulter la fiche associée à une note
                <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

            </h3>
            <nav class="mt-5">
                 <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextPageStudentProgress" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoPageStudentProgress" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-HelpTextPageStudentProgress" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex align-items-center lh-lg div-text me-4">
                            <ul>
                                <li>
                                    Pour consulter la fiche associée a une note, vous devez respecter certaines conditions :
                                    <ul>
                                        <li>
                                            Dans un premier temps, vous devez être sur la page qui permet de consulter la progression d'un élève.
                                        </li>
                                        <li>
                                            Ensuite, en cliquant sur un point au niveau du graphique, vous vous déplacerez sur la fiche ou la note en question a été attribuée.
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
                <div class="tab-pane fade" id="nav-HelpVideoPageStudentProgress" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                    <video controls width="100%" class="mx-auto">
                        <source src="/assets/video/educatoradmin/NoteProgressionStudent.mp4" type="video/mp4">
                    </video>                       
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