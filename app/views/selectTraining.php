<?php
$title = "Choix formation";
$bsIcons = true;
ob_start(); ?>
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <h1 class="col-12 mb-3">Bienvenue sur l'application de l'APEAJ !</h1>
        <h2 class="col-12">Sélectionnez votre formation :</h2>
    </div>
    <div class="row mb-5 align-items-centerd-flex justify-content-around">   
    <?php 
    foreach ($trainings as $training) {
        echo $training->getCardChooseTraining();
    } ?>
    </div>
</div>
<script>
    document.querySelectorAll(".divTraining").forEach(div => {
        div.addEventListener("click", e => e.currentTarget.closest("form").submit());
    });
</script>
<?php 
$content = ob_get_clean();
require("layout.php");