<?php $title = "Page Aide Educateur";
$bsIcons = true;
define("PATH_IMG", "/assets/images/help/Educator/");
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
            Prise en main compte éducateur
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
                                        <li class=" mt-3"><a href="#ConsultSessionAccueil" class="text-decoration-none text-dark">Consulter une session en particulier</a></li>
                                        <li class=" mt-3"><a href="#ConsultStudent" class="text-decoration-none text-dark">Consulter le profil d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#UpdateProfile" class="text-decoration-none text-dark">Modifier son profil</a></li>
                                        <li class=" mt-3"><a href="#AddMaterial" class="text-decoration-none text-dark">Ajouter un materiau</a></li>
                                        <li class=" mt-3"><a href="#AddPicto" class="text-decoration-none text-dark">Ajouter un picto</a></li>
                                    </ul>
                                </li>

                                <li class=" mt-3"> <a href="#PageSession" class="text-decoration-none text-dark">Page accueil session</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"> <a href="#ModifSession" class="text-decoration-none text-dark">Modifier une session</a></li>
                                        <li class=" mt-3"><a href="#ConsultSessionStudent" class="text-decoration-none text-dark">Consulter la session d'un étudiant</a></li>
                                    </ul>
                                </li>
                            
                                <li class=" mt-3"> <a href="#PageSessionStudent" class="text-decoration-none text-dark">Page Session Étudiant</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#ConsultFormStudent" class="text-decoration-none text-dark">Consulter la fiche d'un étudiant</a></li>
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
                                        <li class=" mt-3"><a href="#ConsultStudentProgress" class="text-decoration-none text-dark">Consulter la progression d'un étudiant</a></li>
                                        <li class=" mt-3"><a href="#AddCommentStudent" class="text-decoration-none text-dark">Ajouter un commentaire</a></li>
                                        <li class=" mt-3"><a href="#UpdateCommentStudent" class="text-decoration-none text-dark">Modifier un commentaire</a></li>
                                        <li class=" mt-3"><a href="#DeleteCommentStudent" class="text-decoration-none text-dark">Supprimer un commentaire</a></li>
                                        <li class=" mt-3"><a href="#ConsultSession" class="text-decoration-none text-dark">Consulter une session</a></li>

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
    <div class="tab-content mt-3" id="v-pills-tabContent">
        <div id="PageAccueil">
            <hr id="ConsultListSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <source src="/assets/video/educator/ConsultSessionList.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            <hr id="ConsultListStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                                            <li>Vous devez cliquer sur le bouton intitulé "Élève" situé en haut gauche en dessous du bouton "picto". Si le bouton est grisé, c'est que vous êtes déjà sur la liste des élèves.</li>
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
                            <source src="/assets/video/educator/ConsultStudentList.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>    
            </div>

            <hr id="AddSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                                            <li>Vous pouvez choisir de planifier la session ce qui a pour effet de la rendre invisible pour les étudiants. </li>    
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoAddSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/btnaddsession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            <hr id="ConsultSessionAccueil" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                                                Ensuite, vous devez cliquer sur l'icône ressemblant a un œil située à droite de la session que vous souhaitez consulter.
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
                            <source src="/assets/video/educator/ConsultSession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>

            <hr id="ConsultStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "ConsultStudent.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>
                                    Pour consulter le profil d'un élève, vous devez réaliser les actions suivantes.
                                        <ul>
                                            <li>
                                                Dans un premier temps, vous vous devez vous situer au niveau de la liste des élèves.
                                            </li>
                                            <li>
                                                Ensuite, vous devez cliquer sur l'icône représentant un "i" situé en dessous du nom et du prénom de l'étudiant que vous souhaitez consulter. Vous arrivez sur la page de l'élève.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>     
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoConsultStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/consultStudent.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            <hr id="UpdateProfile" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            
                            <div class="d-flex align-items-center lh-lg me-4 div-text me-4">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                <img src="<?= PATH_IMG . "UpdateProfile.png" ?>" alt=""  style="width: 300px;">
                            </div>     
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoUpdateProfile" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/UpdateMySelf.mp4" type="video/mp4">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2">
                                <img src="<?= PATH_IMG . "AddMaterial.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour ajouter un matériau, vous devez réaliser l'action suivante :
                                        <ul>
                                            <li>
                                                Vous devez cliquer sur le bouton bleu intitulé "Materiaux" situéeen haut à gauche. Une fenêtre s'ouvre alors.
                                            </li>
                                            <li>
                                                Pour choisir le matériau, cliquez le bouton bleu formant un "plus". Une fois, le matériau choisi , il ne reste plus qu'à lui choisir un libellé, une description ainsi que les différents types du matériau.
                                                Vous pouvez ensuite cliquer sur le bouton "valider".
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
     
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoAddMaterial" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/AddMaterial.mp4" type="video/mp4">
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

                            <div class="d-flex align-items-center lh-lg me-4 div-text">
                                <ul>
                                    <li>Pour ajouter un pictogramme, vous devez réaliser l'action suivante :
                                        <ul>
                                            <li>
                                                Vous devez cliquer sur le bouton bleu intitulé "Picto" située en haut à gauche.
                                                Une fenêtre s'ouvre alors .
                                            </li>
                                            <li>
                                                Pour choisir le pictogramme, cliquez sur le bouton bleu formant un "plus". 
                                                Une fois le pictogramme choisi, il ne reste plus qu'à choisir le titre du pictogramme et cliquer sur "valider".
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                <img src="<?= PATH_IMG . "AddPicto.png" ?>" alt=""  style="width: 300px;">
                            </div>    
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoAddPicto" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/AddPicto.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
        </div>

        <div id="PageSession" class="mt-5">
            
            <hr id="ModifSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "EditSession.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>
                                        Pour modifier une session, vous devez vous situer sur la session que vous souhaitez modifier. Pour la modifier, vous devez cliquer sur l'icône du crayon qui se situe en dessous de la description de la session.
                                    </li>
                                    <li>
                                        Vous avez alors une fenêtre qui s'ouvre ou vous pouvez modifier le nom, le thème ainsi que la description de la session.
                                    </li>
                                </ul>
                            </div>     

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoModifSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/UpdateSession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            


            
            <hr id="ConsultSessionStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="d-flex align-items-center lh-lg me-4 div-text">
                                <ul>
                                    <li>Pour consulter les informations d'un étudiant sur une session, vous devez dans un premier temps vous situer sur la liste des sessions.</li>
                                    <li>Ensuite, vous devez cliquer sur l'icône de la fiche pour consulter les informations d'un étudiant sur la session.</li>
                                </ul>
                            </div> 
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-sm-auto">
                                <img src="<?= PATH_IMG . "ConsultFormSessionStudent.png" ?>" alt=""  style="width: 300px;">
                            </div>
                                
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoConsultSessionStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/ConsultStudentSession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
        </div>

        <div id="PageSessionStudent">
            <hr id="ConsultFormStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                                Si vous avez cliqué sur une session en cours ou planifié, vous pourrez modifier la fiche. 
                                Si la session sur laquelle vous avez cliqué est marquée comme "Terminée", vous ne pourrez que consulter la fiche.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoConsultFormStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/ConsultForm.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="AddCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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

                            <div class="d-flex align-items-center lh-lg div-text me-4">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant d'ajouter un commentaire, vous devez respecter la condition suivante :
                                        <ul>
                                            <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires".</li> 
                                            <li>Pour ajouter un commentaire à la fiche d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."</li>
                                            <li>Vous pouvez ainsi remplir les différents champs. Le champ "note" attend des notes allant de 0 a 20.</li>
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
                            <source src="/assets/video/educator/AddCommentSession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="UpdateCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "EditComment.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant de modifier un commentaire, vous devez respecter la condition suivante :
                                        <ul>  
                                            <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires."</li>
                                            <li>Vous devez également avoir déjà écrit un commentaire sur la fiche de l'étudiant.</li>
                                            <li>Si vous n'en possédez pas déjà un, le bouton permettant de modifier le commentaire n'apparaîtra pas, et vous ne pourrez donc pas modifier le commentaire.</li>
                                            <li>Si le bouton avec une icône de crayon apparaît à droite du commentaire, il ne reste plus qu'à cliquer dessus pour modifier le commentaire.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>     
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoUpdateCommentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/EditCommentSession.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="DeleteCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
                    Comment supprimer un commentaire sur la fiche d'un étudiant 
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
                                            <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires."</li>
                                            <li>
                                                Vous devez également avoir déjà écrit un commentaire sur la fiche de l'étudiant.
                                                Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire.
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
                            <source src="/assets/video/educator/DeleteCommentSession.mp4" type="video/mp4">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "AddAudioComment.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant d'ajouter un commentaire audio, vous devez respecter la condition suivante :
                                        <ul> 
                                            <li>Vous devez dans un premier temps vous situer au niveau de l'onglet "commentaires audios."</li>
                                            <li>
                                                Pour ajouter un commentaire audio à la fiche d'un étudiant, vous devez cliquer sur le bouton où il est écrit "Ajouter un commentaire."
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
                            <source src="/assets/video/educator/AddAudioComment.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

            <hr id="DeleteAudioCommentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">   
                <h3>
                    Comment supprimer un commentaire audio sur la fiche d'un étudiant
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
                                                Vous devez également avoir déjà enregistré un commentaire sur la fiche de l'étudiant.
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
                            <source src="/assets/video/educator/DeleteAudioComment.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            
            <hr id="AddPhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "AddPicture.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour ajouter une photo au sein d'une fiche,vous devez réaliser la liste d'opérations suivante :
                                        <ul>
                                            <li>Dans un premier temps, cliquez sur l'icône bleue formant un "plus" où il est écrit en dessous "Ajouter une photo."</li>
                                            <li>Une fenêtre s'ouvre alors.</li>
                                            <li>Pour choisir la photo, cliquez sur le bouton bleu formant un "plus". Une fois, la photo choisit, il ne reste plus qu'à choisir le titre de la photo et cliquer sur "valider".</li>  
                                        </ul>
                                    </li>    
                                </ul>
                            </div>     

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoAddPhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/AddPicture.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>

            <hr id="TakePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block">
                    <h3>
                        Comment prendre une photo pour une fiche
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
                                        Pour prendre une photo depuis une fiche, vous devez dans un premier temps cliquer sur l'icône représentant un appareil photo où il est écrit en dessous "Prendre une photo".
                                        Une fenêtre s'ouvre alors
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
                                <source src="/assets/video/educator/takepicturesession.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            
            <hr id="DeletePhotoSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "DeletePicture.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant de supprimer une photo, vous devez respecter la condition suivante :
                                        <ul>
                                            <li>Vous devez avoir déjà posté une photo au niveau de la session.</li>
                                            <li>Si vous n'en possédez pas déjà une, le bouton permettant de supprimer la photo n'apparaîtra pas, et vous ne pourrez donc pas supprimer la photo.</li>
                                            <li>Si le bouton avec une icône de poubelle apparaît en haut à droite de la photo, il ne reste plus qu'à cliquer dessus et validé la suppression pour supprimer la photo.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoDeletePhotoSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/DeletePicture.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
        </div>

        <div id="PageStudent">         
            
            <hr id="ConsultStudentProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                                <img src="<?= PATH_IMG . "ConsultStudentProgression.png" ?>" alt=""  style="width: 300px;">
                            </div>    
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoConsultStudentProgress" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/ConsultStudentProgression.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="AddCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
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
                            <source src="/assets/video/educator/AddCommentStudent.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="UpdateCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
                    Comment modifier un commentaire sur un étudiant
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
                            <source src="/assets/video/educator/UpdateCommentStudent.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="DeleteCommentStudent" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
                    Comment supprimer un commentaire sur un étudiant 
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
                                                Si le bouton avec une icône de poubelle apparaît, il ne te reste plus qu'à cliquer dessus et valider la suppression pour supprimer le commentaire.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoDeleteCommentStudent" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/DeleteCommentStudent.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
            
            <hr id="ConsultSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
                    Comment consulter les informations d'une fiche
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
                            <source src="/assets/video/educator/ConsultSessionStudent.mp4" type="video/mp4">
                        </video>                       
                    </div>
                </div>
            </div>
        </div>

        <div id="PageStudentProgress">
            <hr id="ConsultFormProgress" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3 class="fs-2">
                    Comment consulter la fiche associée à une note
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
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "ConsultFormGraph.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>
                                        Pour consulter la fiche associé a une note, vous devez respecter certaines conditions :
                                        <ul>
                                            <li>
                                                Dans un premier temps, vous devez être sur la page qui permet de consulter la progression d'un élève.
                                            </li>
                                            <li>
                                                Ensuite, en cliquant sur une note au niveau du graphique, vous vous déplacerez sur la fiche ou la note en question a été attribuer.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>                            
                            </div>  
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoConsultFormProgress" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/educator/ConsultFormNote.mp4" type="video/mp4">
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