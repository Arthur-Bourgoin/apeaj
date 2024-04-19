<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <?php 
    if(isset($bsIcons) && $bsIcons === true) {
        // echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">';
        echo '<link rel="stylesheet" href="/assets/css/bootstrap-icons.css">';
    }
    ?>
    <?= isset($scripts) ? $scripts : "" ?>
    <title><?= isset($title) ? $title : "Titre" ?></title>
    
</head>
<style>
    @media (min-width: 992px) {
        .footer-noms {
            border-right: 2px solid #000; /* Ajoute la bordure à droite pour les écrans LG */
        }
    }

    @media (max-width: 992px) {
        .footer-noms {
            border-bottom: 2px solid #000; /* Ajoute la bordure à droite pour les écrans LG */
        }
    }
</style>
<body class="d-flex flex-column vh-100">
    <header class="mb-4">
        <div class="container p-0">
            <img class="w-100" src="/assets/images/BaniereAPK.bmp" alt="Image banière">
        </div>
    </header>
    <main>
        <?= isset($content) ? $content : "Contenu de la page." ?>
    </main>
    <footer class="mt-auto border-top border-2 border-dark bg-light">
        <div class="container">
            <div class="row mx-0">
                <div class="footer-noms col-lg-8 col-12 p-0 text-center my-lg-4 mt-4">
                    <p class="col-12">Application développée par l'IUT Informatique Paul Sabatier</p>
                    <div class="row col-12 d-flex justify-content-between align-items-center">
                            <p class="col-5 m-0 text-end">BOURGOIN Arthur</p>
                            <i class="col-2 bi bi-gear-fill"></i>
                            <p class="col-5 m-0 text-start">GAYRARD Matéo</p>                            
                    </div>
                    <div class="row col-12 mb-4 d-flex justify-content-between align-items-center">
                            <p class="col-5 m-0 text-end">BIGNON Charley</p>
                            <i class="col-2 bi bi-gear-fill"></i>
                            <p class="col-5 m-0 text-start">RENAUD Paulin</p> 
                    </div>
                </div>
                <?php if (isset($_SESSION["role"])){?>
                    <div class="col-lg-2 col-8 text-center my-4">
                        <p class="col-12">Aide et prise en main de l'application</p>
                        <a href="/aide">
                            <i class="bi bi-info-circle" style="font-size: 1.5rem"></i>
                        </a>
                    </div>
                    <div class="col-lg-2 col-4 text-center my-4">
                        <img class="w-50 img-fluid" src="/assets/images/logo_iut.png" alt="Image footer">
                    </div>
                <?php }else{ ?>
                    <div class="col-lg-4 col-12 text-center my-4">
                        <img class="w-25 img-fluid" src="/assets/images/logo_iut.png" alt="Image footer">
                    </div>
                <?php } ?>
                    
            </div>
        </div>
    </footer>    
</body>
</html>