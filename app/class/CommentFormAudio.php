<?php

namespace app\class;
use app\class\User;
use app\models\UserModel;

class CommentFormAudio {
    public $idCommentFormAudio;
    public $audio;
    public $lastModif;
    public $idAuthor;
    public $numero;
    public $idStudent;

    // Constructeur de la classe
    public function __construct($obj) {
        $this->idCommentFormAudio = $obj->idCommentFormAudio ?? null;
        $this->audio = $obj->audio ?? null;
        $this->lastModif = $obj->lastModif ?? null;
        $this->idAuthor = $obj->idAuthor ?? null;
        $this->numero = $obj->numero ?? null;
        $this->idStudent = $obj->idStudent ?? null;
    }


    public function getTemplateAudioComment() {
        ob_start();
        ?>
        <div class="col-12 mt-4 p-0 form-floating w-100">
            <div class="form-control comment-container h-auto position-relative" id="audio-<?= $this->idCommentFormAudio ?>">
                <audio controls src="/assets/audio/<?= htmlentities($this->audio) ?>" class="mt-4"></audio>
                <?php if($_SESSION['id'] == $this->idAuthor) { ?>
                <div class="d-flex justify-content-end ">
                    <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
                        <input type="hidden" name="idCommentAudio" value="<?= $this->idCommentFormAudio ?>">
                        <input type="hidden" name="action" value="deleteAudioComment">
                        <button type="submit" class="btn btn-primary px-2">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
                <?php } ?>
            </div>
            <label for="audio-<?= htmlentities($this->idCommentFormAudio) ?>">
                <?= htmlentities(UserModel::getUser($this->idAuthor)->lastName) ?>  <?= htmlentities(UserModel::getUser($this->idAuthor)->firstName)?> --- Dernière modification : <?= htmlentities($this->lastModif) ?>
            </label>
        </div>
        <?php
        return ob_get_clean();
    }
}
