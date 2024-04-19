<?php $title = "Page Aide Elève";
$bsIcons = true;
define("PATH_IMG", "/assets/images/help/student/");
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
            Aide étudiant
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
                                <li class=" mt-3"> <a href="#PageAcc" class="text-decoration-none text-dark">Page Accueil</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"> <a href="#ConsultCurrentSession" class="text-decoration-none text-dark">Consulter une session en cours</a></li>
                                        <li class=" mt-3"><a href="#ConsultFinishSession" class="text-decoration-none text-dark">Consulter une session terminer</a></li>
                                    </ul>
                                </li>
                                <li class=" mt-3"> <a href="#PageSession" class="text-decoration-none text-dark">Page Session</a>
                                    <ul class="mt-3">
                                        <li class=" mt-3"><a href="#ConsultForm" class="text-decoration-none text-dark">Consulter/completer la fiche d'une session</a></li>
                                        <li class=" mt-3"> <a href="#AddComment" class="text-decoration-none text-dark">Ajouter un commentaire</a></li>
                                        <li class=" mt-3"> <a href="#DeleteComment" class="text-decoration-none text-dark">Supprimer un commentaire</a></li>
                                        <li class=" mt-3"> <a href="#EditComment" class="text-decoration-none text-dark">Editer un commentaire</a></li>
                                        <li class=" mt-3"><a href="#AddPicture" class="text-decoration-none text-dark">Ajouter une photo</a></li>
                                        <li class=" mt-3"><a href="#TakePicture" class="text-decoration-none text-dark">Prendre une photo</a></li>
                                        <li class=" mt-3"><a href="#DeletePicture" class="text-decoration-none text-dark">Supprimer une photo</a></li>

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
        <div id="PageAcc" class="mt-5" >
            <hr id="ConsultCurrentSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block">
                    <h3>
                        Comment consulter les informations d'une session en cours
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultCurrentSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultCurrentSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextConsultCurrentSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                    <img src="<?= PATH_IMG . "ConsultCurrentSession.png" ?>" alt=""  style="width: 300px;">
                                </div>
                                <div class="d-flex align-items-center lh-lg div-text">
                                    <ul>
                                        <li>
                                            Pour consulter les informations d'une session en cours, vous devez réaliser l'action suivante :
                                            <ul>
                                                <li>
                                                    Vous devez cliquer sur l'icône représentant un stylo dans le bouton bleu comme indiqué sur l'image.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoConsultCurrentSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/consultcurrentsession.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>

            <hr id="ConsultFinishSession" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block">
                    <h3>
                        Comment consulter les informations d'une session qui est termineée
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultFinishSession" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultFinishSession" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextConsultFinishSession" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="d-flex align-items-center lh-lg me-4 div-text">
                                    <ul>
                                        <li>	
                                            Pour consulter les informations d'une session considérée comme terminée , vous devez réaliser l'action suivante :
                                            <ul>
                                                <li>
                                                    Vous devez cliquer sur l'icône représentant un œil dans le bouton bleu comme indiqué sur l'image.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>    
                            
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-md-auto">
                                    <img src="<?= PATH_IMG . "ConsultFinishSession.png" ?>" alt=""  style="width: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoConsultFinishSession" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/consultfinishsession.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
        </div>

        <div id="PageSession">
            <hr id="ConsultForm" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block">
                    <h3>
                        Comment consulter/remplir la fiche d'une session
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextConsultForm" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoConsultForm" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextConsultForm" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                    <img src="<?= PATH_IMG . "ConsultForm.png" ?>" alt=""  style="width: 300px;">
                                </div>
                                <div class="d-flex align-items-center lh-lg div-text">
                                    Pour consulter ou remplir une fiche, vous devez dans un premier temps vous situer sur la session de la fiche. 
                                    Ensuite, il faut cliquer sur l'icône de la 	fiche comme indiqué sur l'image. Si vous avez cliqué sur une session en cours, vous pourrez modifier la fiche. 
                                    Si la session sur laquelle vous avez cliquée est marquée comme "Terminée", vous ne pourrez que consulter la fiche.
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoConsultForm" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/consultform.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            <hr id="AddComment" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3>
                    Comment ajouter un commentaire sur une fiche
                    <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                </h3>
                <nav class="mt-5">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddComment" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddComment" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-HelpTextAddComment" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                        <div class="d-flex flex-column flex-md-row">
                            <div class="d-flex align-items-center lh-lg me-4 div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton : "Ajouter un commentaire", vous devez respecter la condition suivante :
                                        <ul>
                                            <li>
                                                Vous ne devez pas déjà posséder un commentaire.
                                                Si vous en possédez déjà un, le bouton n'apparaîtra pas, vous ne pourrez que modifier ou supprimer votre commentaire déjà existant.
                                            </li> 
                                            <li>
                                                Si le bouton "Ajouter un commentaire" apparaît, cliquez sur le bouton et remplissez les champs pour ajouter le commentaire.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>     
                            </div>    
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-md-auto ">
                                <img src="<?= PATH_IMG . "AddComment.png" ?>" alt=""  style="width: 300px;">
                            </div>  
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoAddComment" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/student/addcomment.mp4" type="video/mp4">
                        </video>
                    </div>             
                </div>
            </div>

            <hr id="DeleteComment" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3>
                    Comment supprimer un commentaire sur une session  
                    <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                </h3>
                <nav class="mt-5">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeleteComment" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeleteComment" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-HelpTextDeleteComment" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                        <div class="d-flex flex-column flex-md-row">
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                <img src="<?= PATH_IMG . "DeleteComment.png" ?>" alt=""  style="width: 300px;">
                            </div>
                            <div class="d-flex align-items-center lh-lg div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant de supprimer un commentaire, vous devez respecter la condition suivante :
                                        <ul> 
                                            <li>
                                                Vous devez avoir déjà écrit un commentaire au niveau de la session.
                                                Si vous n'en possédez pas déjà un, le bouton n'apparaîtra pas, et vous ne pourrez pas supprimer le commentaire.
                                            </li>
                                            <li>
                                                Si le bouton avec une icône de poubelle apparaît, cliquez dessus et validez la suppression pour supprimer le commentaire.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>  
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoDeleteComment" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/student/deletecommentsession.mp4" type="video/mp4">
                        </video>    
                    </div>
                </div>         
            </div>


            <hr id="EditComment" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
            <div class="div-block">
                <h3>
                    Comment modifier un commentaire sur une fiche 
                    <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                </h3>
                <nav class="mt-5">
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextEditComment" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoEditComment" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-HelpTextEditComment" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                        <div class="d-flex flex-column flex-md-row">
                            <div class="d-flex align-items-center lh-lg me-4 div-text">
                                <ul>
                                    <li>Pour avoir accès au bouton permettant de modifier un commentaire, vous devez respecter la condition suivante :
                                        <ul>  
                                            <li>
                                                Vous devez avoir déjà écrit un commentaire sur la fiche.
                                                Si vous n'en possédez pas déjà un, le bouton permettant de modifier le commentaire n'apparaîtra pas, et vous ne pourrez donc pas modifier le commentaire.
                                            </li>
                                            <li>
                                                Si le bouton avec une icône de crayon apparaît à droite du commentaire,cliquez dessus pour modifier le commentaire.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>    
                            
                            <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-md-auto">
                                <img src="<?= PATH_IMG . "EditComment.png" ?>" alt=""  style="width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-HelpVideoEditComment" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                        <video controls width="100%" class="mx-auto">
                            <source src="/assets/video/student/editcommentsession.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>


            <hr id="AddPicture" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block" >
                    <h3>
                        Comment ajouter une photo sur une fiche
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextAddPicture" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoAddPicture" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextAddPicture" role="tabpanel" aria-labelledby="nav-HelpText-tab">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4"  style="max-width: 100%;">
                                    <img src="<?= PATH_IMG . "AddPicture.png" ?>" alt=""  style="height: 100%; ">
                                    
                                </div>
                                <div class="d-flex align-items-center lh-lg div-text">
                                    <ul>
                                        <li>	
                                            Pour ajouter une photo au sein d'une session, rélaisez la liste d'opération suivante :
                                            <ul>
                                                <li>
                                                    Dans un premier temps, cliquez sur l'icône bleu formant un "plus" où il est écrit en dessous "Ajouter une photo".
                                                </li>
                                                <li>
                                                    Une fenêtre s'ouvre alors
                                                    Pour choisir la photo, cliquezr sur le bouton bleu formant un "plus". Une fois la photo choisie, choisissez le titre de la photo et cliquez sur "valider".
                                                </li>
                                            </ul>
                                        </li>    
                                    </ul>       
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoAddPicture" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/addpicturesession.mp4" type="video/mp4">
                            </video>
                        </div>
                
                    </div>
                </div>


            <hr id="TakePicture" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block" >
                    <h3>
                        Comment prendre une photo sur une fiche
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>
                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextTakePicture" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoTakePicture" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextTakePicture" role="tabpanel" aria-labelledby="nav-HelpText-tab">
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
                                                    Pour valider la prise de la photo, choisissez un titre et cliquer sur le bouton vert.
                                                </li>
                                            </ul>
                                        </li>    
                                    </ul>       
                                </div>
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4 ms-md-auto">
                                    <img src="<?= PATH_IMG . "takePicture.png" ?>" alt="" style="width: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoTakePicture" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/takepicturesession.mp4" type="video/mp4">
                            </video>
                        </div>
                
                    </div>
                </div>


            <hr id="DeletePicture" class="d-none d-md-block mt-5 mb-5 my-2 ms-3">
                <div class="div-block">
                    <h3>
                        Comment supprimer une photo sur une fiche
                        <i class="bi bi-volume-up ms-3 btn-audio" role="button"></i>

                    </h3>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpTextDeletePicture" type="button" role="tab" aria-selected="true">Aide Textuel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-HelpVideoDeletePicture" type="button" role="tab"  aria-selected="false">Aide Vidéo</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-HelpTextDeletePicture" role="tabpanel" aria-labelledby="nav-HelpText-tab">

                            <div class="d-flex flex-column flex-md-row">
                                <div class="border rounded d-flex align-items-center justify-content-center p-2 me-4">
                                    <img src="<?= PATH_IMG . "DeletePicture.png" ?>" alt="" style="width: 300px;">
                                </div>
                                <div class="d-flex align-items-center lh-lg div-text">
                                    <ul>
                                        <li>	
                                            Pour avoir accès au bouton permettant de supprimer une photo, vous devez respecter la condition suivante :
                                            <ul>
                                                <li>
                                                    Vous devez avoir déjà posté une photo au niveau de la session.
                                                    Si vous n'en possédez pas déjà une, le bouton permettant de supprimer la photo n'apparaîtra pas, et vous ne pourrez donc pas supprimer la photo.
                                                </li>
                                                <li>
                                                    Si le bouton avec une icône de poubelle apparaît en haut à droite de la photo, cliquez dessus et validé la suppression pour supprimer la photo.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>    
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-HelpVideoDeletePicture" role="tabpanel" aria-labelledby="nav-HelpVideo-tab">
                            <video controls width="100%" class="mx-auto">
                                <source src="/assets/video/student/deletepicture.mp4" type="video/mp4">
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