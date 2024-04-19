<?php $title = "Suivi de l'étudiant";
$bsIcons = true;
$scripts ="<script src='/assets/js/account.js' type='module'></script>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
ob_start(); ?>

<div class="container">
<div class="row mx-0">
        <?php if(!empty($student)){ ?>
        <h2 class="text-center mt-3">
           Progression de l'étudiant <?=htmlentities($student->lastName)?> <?=htmlentities($student->firstName)?> 
        </h2>
        <?php } ?>
        <div class="d-flex justify-content-between align-items-center px-0">
            <div>
                <?php
                    \app\class\Breadcrumb::removeAfter('Stats');
                    \app\class\Breadcrumb::add('Stats', 'Statistiques', 'bi-graph-up', "/etudiants"  . "-" . $student->idUser. "/progression");
                    echo \app\class\Breadcrumb::render();
                ?>
            </div>
            
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
    </div>

    <div class="row mx-0">
        <div class="col-md-3 col-5 mt-3 mr-3 d-flex align-items-center">
            <img src="<?= $student->picture ?>" class="img-thumbnail" alt="Photo de l\'étudiant 1">
        </div>
        <div class="col-md-9 col-7">
            <div class="row mt-3 ms-3 align-items">
            <?php if (!empty($student)) { ?>
                <div class="col-12 my-3">
                    <h2>
                        <?= htmlentities($student->lastName) ?>
                        <?= htmlentities($student->firstName) ?>
                    </h2>
                </div>
                <div class="col-12 my-3">
                    <h5>
                        login:
                        <?= htmlentities($student->login) ?>
                    </h5>
                </div>
                <?php } ?>
                <div class="col-12 mt-4">
                    <?= app\class\Feedback::getMessage() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0 mt-2 mb-4">
        <div class="col-12 col-xl-6 mt-4">
            <canvas id="graphiqueNoteMoyenne"></canvas>
        </div> 
        <div class="col-12 col-xl-6 mt-4">
            <canvas id="graphiqueNiveauMoyen"></canvas>
        </div> 
    </div>
</div>


<script>
     // Récupération des données PHP dans des variables JavaScript
 const levelsData = <?= json_encode($tabLevels) ?>;
 const notesData = <?= json_encode($tabNotes) ?>;
 const tablink = <?=json_encode($tablink) ?>;
 // Récupération du contexte pour les graphiques
 const levelChartCanvas = document.querySelector('#graphiqueNiveauMoyen').getContext('2d');
 const noteChartCanvas = document.querySelector('#graphiqueNoteMoyenne').getContext('2d');

 // Création des graphiques
 const levelChart = new Chart(levelChartCanvas, {
     type: 'line',
     data: {
         labels: Object.keys(levelsData),
         datasets: [{
             label: 'Niveau Moyen',
             data: Object.values(levelsData),
             fill: false,
             borderColor: 'rgba(75, 192, 192, 1)',
             tension: 0.1
         }]
     },
     options: {
         responsive: true,
         plugins: {
             title: {
                 display: true,
                 text: 'Évolution du niveau moyen des éléments '
             }
         },
         onClick: (event, elements) => {
            if (elements.length > 0) {
                const index = elements[0].index;
                const dateClicked = Object.keys(levelsData)[index];
                const url = tablink[dateClicked];
                if (url) {
                    window.location.href = url;
                }
            }
        }
     }
 });

 const noteChart = new Chart(noteChartCanvas, {
     type: 'line',
     data: {
         labels: Object.keys(notesData),
         datasets: [{
             label: 'Note Moyenne',
             data: Object.values(notesData),
             fill: false,
             borderColor: 'rgba(255, 99, 132, 1)',
             tension: 0.1
         }]
     },
     options: {
         responsive: true,
         plugins: {
             title: {
                 display: true,
                 text: 'Évolution de la note moyenne des commentaires'
             }
         },
         onClick: (event, elements) => {
            console.log("clic");
            if (elements.length > 0) {
                const index = elements[0].index;
                const dateClicked = Object.keys(levelsData)[index];
                const url = tablink[dateClicked];
                if (url) {
                    window.location.href = url;
                }
            }
        }
     }
 });
     
 const currentUser = <?= json_encode($currentUser) ?>;

</script>
    
<?php 
$content = ob_get_clean();
require("../app/views/layout.php");
require("../app/views/modalAccount.php");