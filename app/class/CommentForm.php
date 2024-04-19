<?php

namespace app\class;
use app\class\User;

class CommentForm {
    public $idCommentForm;
    public $wording;
    public $text;
    public $admin;
    public $lastModif;
    public $idAuthor;
    public $numero;
    public $idStudent;
    public $author;
    public $note;
    
    const TAB_ICONS = ["bi-emoji-angry-fill", "bi-emoji-frown-fill", "bi-emoji-neutral-fill", "bi-emoji-smile-fill", "bi-emoji-laughing-fill", "bi-emoji-laughing-fill"];
    const COLORS = ["#ff0000", "#ffa600", "#ffe800", "#22e52e", "#27962e", "#27962e"];
    
    public function __construct(Object $obj, User $author) {
        $this->idCommentForm = $obj->idCommentForm;
        $this->wording = $obj->wording;
        $this->text = $obj->text;
        $this->admin = $obj->admin;
        $this->lastModif = $obj->lastModif;
        $this->idAuthor = $obj->idAuthor;
        $this->numero = $obj->numero;
        $this->idStudent = $obj->idStudent;
        $this->author = $author;
        $this->note =$obj->note;    }

    public function getTemplateComment() {
        ob_start();
        ?>
        <div class= "col-12  mt-4 p-0 form-floating w-100">
            <div class= "form-control comment-container h-auto position-relative" id = "<?= $this->idCommentForm ?>">
                <p class= "comment-text my-2">
                    <?= htmlentities($this->text) ?>
                </p>
                <?php if($_SESSION['id'] == $this->idAuthor){?>
                <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary me-2 px-2" data-id="<?= $this->idCommentForm ?>" data-bs-toggle = "modal" data-bs-target="#ModalUpdateComs">
                        <i class = "bi bi-pencil"></i>
                    </button>
                    <form action = "<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type = "hidden" name = "idCommentForm" value = "<?= $this->idCommentForm ?>">
                        <input type = "hidden" name = "action" value = "deleteComment">
                        <button type = "submit" class = "btn btn-primary px-2">
                            <i class = "bi bi-trash"></i>
                        </button>
                    </form> 
                </div>
                <?php } ?>
            </div>

            <label for = "<?= htmlentities($this->idCommentForm) ?>">
                <?= htmlentities($this->author->lastName) ?> <?= htmlentities($this->author->firstName) ?> --- <?= htmlentities($this->wording) ?><i class="ms-2 bi bi-volume-up"></i>
            </label>
            <span class = "position-absolute top-0 end-0 translate-middle z-3" style="color: <?= self::COLORS[(int) ($this->note / 4)] ?>;">
                <i class = "bi <?= self::TAB_ICONS[(int) ($this->note / 4)] ?>" style = "font-size: 1.8rem; margin-right: -18px;"></i>
            </span>
            <?php 
            if ($this->admin == 1){ ?>
                <span class = "position-absolute top-0 end-0 translate-middle z-3">
                <i class="bi bi-incognito" style = "font-size: 1.8rem; margin-right: 10px;"></i>
                </span>
            <?php } ?>
        </div>
        <?php
        return ob_get_clean();
    }
}