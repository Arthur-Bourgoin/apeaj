<?php

namespace app\class;

class Training {

    const PATH_IMG = "/assets/images/trainings/";
    public $idTraining;
    public $wording;
    public $description;
    public $qualifLevel;
    public $picture;

    public function __construct(object $obj) {
        $this->idTraining=$obj->idTraining;
        $this->wording=$obj->wording;
        $this->description=$obj->description;
        $this->qualifLevel=$obj->qualifLevel;
        $this->picture = self::PATH_IMG . $obj->picture;
    }


    // $footer = "connexion" || "sadmin" || "admin"
    public function getDenomination($footer): String {

    }


    
    public function getCardChooseTraining() {
        ob_start();?>
        <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST" class="row mb-3 col-12 col-md-6">
            <input type="hidden" name="idTraining" value="<?= $this->idTraining ?>">
            <div class="divTraining d-flex align-items-center border border-dark rounded-3" role="button">
                <div class="col-md-4 my-4 d-flex align-items-center justify-content-center" style="height: 150px;">
                    <img src= <?= $this->picture ?> class="object-fit-contain mw-100 mh-100">
                </div>
                <div class="col-8">
                    <h3 class="fw-bold text-center lh-base"><?= htmlentities($this->wording)?></h3>
                </div>
            </div>
        </form>
        <?php
        return ob_get_clean();       
    }

    public function getCardHome() {
        ob_start();
        ?>
        <div class="row mx-0 border mb-3 divTraining">
            <div class="col-4 d-flex align-items-center justify-content-center my-3" style="height: 200px;">
                <img src="<?= $this->picture ?>" class="object-fit-contain mw-100 mh-100">
            </div>
            <div class="col-8 d-flex flex-column justify-content-evenly py-3">
                <p class=" fs-3 fw-bold text-center"><?= htmlentities($this->wording)?></p>
                <p class="text-center fs-5 d-none d-md-block"><?= htmlentities($this->description)?></p>                            
                <div class="d-flex justify-content-evenly" >  
                    <button type="button" class="btn-add-user btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUser" data-id-training="<?= $this->idTraining ?>" title="Ajouter un profil à la formation">
                        <i class="bi bi-person-plus-fill" style="font-size: 1.5rem"></i>
                    </button>
                    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type="hidden" name="action" value="exportTraining">
                        <input type="hidden" name="idTraining" value="<?= htmlentities($this->idTraining) ?>">
                        <button class=" btn btn-primary btn-export" title="Télécharger la formation au format excel">
                            <i class="bi bi-box-arrow-down" style="font-size: 1.5rem"></i>
                        </button>
                    </form>
                    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type="hidden" name="action" value="deleteTraining">
                        <input type="hidden" name="idTraining" value="<?= $this->idTraining ?>">
                        <button type="submit" class="btn btn-primary btn-removed" title="Supprimer la formation">
                            <i class="bi bi-trash" style="font-size: 1.5rem"></i>
                        </button>
                    </form>
                    <a href="/formation-<?=htmlentities($this->idTraining)?>">
                        <button class=" btn btn-primary" title="Consulter la formation">
                            <i class="bi bi-eye" style="font-size: 1.5rem"></i>
                        </button>
                    </a>                              
                </div>                                
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}