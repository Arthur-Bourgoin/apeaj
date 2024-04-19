<?php

namespace app\class;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class User {

    const PATH = "/assets/images/users/";

    public $idUser;
    public $login;
    public $lastName;
    public $firstName;
    public $picture;
    public $typePwd;
    public $role;
    public $idTraining;

    public $comments;


    public function __construct(object $obj, ?array $comments) {
        $this->idUser =  $obj->idUser;
        $this->login = $obj->login;
        $this->lastName = $obj->lastName;
        $this->firstName = $obj->firstName;
        $this->picture = self::PATH . $obj->picture;
        $this->typePwd = $obj->typePwd;
        $this->role = $obj->role;
        $this->idTraining = $obj->idTraining;
        $this->comments = $comments;

    }

    // $footer = "connexion" || "sadmin" || "admin"
    public function getDenomination($footer): String {

    }

    public function getCardConnexion() {
        switch($this->typePwd){
            case 1:
                $target = "modalConnexionTexte";break;
            case 2:
                $target = "modalConnexionCode";break;
            case 3:
                $target = "modalConnexionSchema";break;
        }
        ob_start();?>
        <div class="col-lg-3 col-md-4 col-6">
            <div class="divStudent border border-3 border-dark rounded" data-id="<?= $this->idUser ?>" data-bs-toggle="modal" data-bs-target="#<?=$target?>">
                    <img src="<?= htmlentities($this->picture) ?>" class="w-100 p-1 my-2  " alt="Photo de l'étudiant <?= htmlentities($this->idUser)?>">
                <div class="text-center">
                    <h5><?=htmlentities($this->lastName)?></h5>
                    <p><?= htmlentities($this->firstName)?></p>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    public function getCardTemplateSAdmin() {
        ob_start(); ?>
        <div class="col-md-4 col-6 col-lg-3">
            <div class="card d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center mt-3 mx-3" style="height: 150px;">
                    <img src="<?= htmlentities($this->picture)?>" class="img-thumbnail object-fit-contain mw-100 mh-100" alt="Image Educateur">
                </div>
                <div class="card-body">
                    <p class="card-title text-center fs-4 fw-bold"><?= htmlentities($this->lastName)?></p>
                    <p class="card-text text-center fs-4 fw-bold"><?= htmlentities($this->firstName)?></p>
                </div>
                <div class="card-footer d-flex justify-content-evenly w-100">
                    <?php
                        if($this->role === "student") {
                            echo '<a href="/etudiants' . '-' . $this->idUser . '"><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a>';
                        } else {
                            echo '<button type="button" class=" btn btn-primary btn-update-admin" data-id="' . $this->idUser . '" data-bs-toggle="modal" data-bs-target="#updateUserModal"><i class="bi bi-eye"></i></button>';
                        }
                        if ($this->role === "student"){?>
                            <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                                <input type="hidden" name="action" value="exportUser">
                                <input type="hidden" name="idUser" value="<?= htmlentities($this->idUser) ?>">
                                <input type="hidden" name="idTraining" value="<?= htmlentities($this->idTraining) ?>">
                                <button class=" btn btn-primary btn-export">
                                    <i class="bi bi-box-arrow-down"></i>
                                </button>
                            </form>
                    <?php } 
                    ?>
                    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type="hidden" name="action" value="deleteUser">
                        <input type="hidden" name="idUser" value="<?= htmlentities($this->idUser) ?>">
                        <input type="hidden" name="idTraining" value="<?= htmlentities($this->idTraining) ?>">
                        <button class=" btn btn-primary btn-removed">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
      <?php return ob_get_clean();
    }

    public function setLineXLS(Worksheet $sheet, int $line) {
        $sheet->setCellValue('A'.$line , $this->idUser);
        $sheet->setCellValue('B'.$line , $this->lastName);
        $sheet->setCellValue('C'.$line , $this->firstName);
        switch ($this->role){
            case('student'):
                $sheet->setCellValue('D'.$line , 'Étudiant');
                break;
            case('educator-admin'):
                $sheet->setCellValue('D'.$line , 'Éducateur-admin');
                break;
            case('educator'):
                $sheet->setCellValue('D'.$line , 'Éducateur');
                break;          
        }
        $sheet->mergeCells('E'.$line.':H'.$line);
        foreach($this->comments as $comment) {
            $line++;
            $sheet->mergeCells('F'.$line.':H'.$line);
            $sheet->setCellValue('E'.$line, $comment->educator->lastName);
            $sheet->setCellValue('F'.$line, $comment->text);
        }
        $line++;
    }


}