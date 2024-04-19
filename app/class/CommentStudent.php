<?php

namespace app\class;
use app\class\User;

class CommentStudent {

    public $idStudent;
    public $text;
    public $lastModif;
    public $educator;

    public function __construct(object $comment, User $educator) {
        $this->idStudent = $comment->idStudent;
        $this->text = $comment->text;
        $this->lastModif = $comment->lastModif;
        $this->educator = $educator;
    }
    
    public function getTemplateCommentStudent() {
        ob_start();
        ?>
        <div class= "col-12 mb-4 p-0 form-floating w-100">
            <div class= "form-control comment-container h-auto position-relative" id = "<?= $this->idStudent . '-' . $this->educator->idUser ?>">
                <p class= "comment-text my-2">
                    <?= htmlentities($this->text) ?>
                </p>
                <?php if($_SESSION['id'] == $this->educator->idUser){?>
                <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary me-2 px-2"data-id-student="<?= $this->idStudent ?>" data-id-educator="<?= $this->educator->idUser ?>" data-bs-toggle = "modal"
                        data-bs-target="#ModalUpdateComs" title="Modifier le commentaire">
                        <i class = "bi bi-pencil"></i>
                    </button>
                    <form action = "<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type = "hidden" name = "idStudent" value = "<?= htmlentities($this->idStudent) ?>">
                        <input type = "hidden" name = "idEducator" value = "<?= htmlentities($this->educator->idUser) ?>">
                        <input type = "hidden" name = "action" value = "deleteComment">
                        <button type = "submit" class = "btn btn-primary btn-delete-comment px-2" title="Supprimer le commentaire">
                            <i class = "bi bi-trash"></i>
                        </button>
                    </form> 
                </div>
                <?php } ?>
            </div>

            <label>
                <?= htmlentities($this->educator->lastName) ?> <?= htmlentities($this->educator->firstName) ?><i class="ms-2 bi bi-volume-up"></i>
            </label>
        </div>
        <?php
        return ob_get_clean();
    }
}

