<?php
namespace app\models;
use config\Database;
use app\models\FormModel;
use app\class\CommentForm;
use app\class\Feedback;

class CommentFormModel {
//verif info student
public static function getComments(int $numero, int $idStudent) {
    try {
        $comments = [];
        if(!FormModel::existForm($numero, $idStudent)) {
            Feedback::setError("Erreur, la fiche demandée n'existe pas.");
            return;
        }
        $res = Database::getInstance()->prepare("SELECT * FROM commentForm WHERE numero = :numero AND idStudent = :id");
        $res->execute(array("id" => $idStudent, "numero" => $numero));
        while($comment = $res->fetch()) {
            $author = UserModel::getUser($comment->idAuthor);
            $comments[] = new CommentForm($comment, $author);
        }
        return $comments;
    } catch (\Exception $e) {
        Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
    } finally {
        if(!empty($res))
            $res->closeCursor();
    }
}

    public static function addComment(array $args, int $idAuthor) {
        try {
            if(!FormModel::existForm($args["numero"], $args["idStudent"])) {
                Feedback::setError("Impossible d'ajouter le commentaire, la fiche associée n'existe pas.");
                return;
            }
            $keys = ["wording", "text", "admin", "lastModif", "numero", "idStudent", "idAuthor","note"];
            $args["idAuthor"] = $idAuthor;
            $args["lastModif"] = date('Y-m-d H:i:s');
            Database::getInstance()
            ->prepare("INSERT INTO commentForm (wording, text, admin, lastModif, numero, idStudent, idAuthor, note)
                       VALUES (:wording, :text, :admin, :lastModif, :numero, :idStudent, :idAuthor, :note)")
            ->execute(array_intersect_key($args, array_flip($keys)));
            Feedback::setSuccess("Ajout du commentaire enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout du commentaire.");
        }
    }

    public static function updateComment(array $args) {
        try {
            if(!self::existCommentForm($args["idCommentForm"])) {
                Feedback::setError("Mise à jour impossible, le commentaire n'existe pas.");
                return;
            }
            $args["lastModif"] = date('Y-m-d H:i:s');
            Database::getInstance()
                ->prepare("UPDATE commentForm
                           SET wording = :wording,
                               text = :text,
                               admin = :admin,
                               lastModif = :lastModif,
                               note = :note
                           WHERE idCommentForm = :idCommentForm")
                ->execute(array_intersect_key($args, array_flip(["wording", "text", "admin", "lastModif", "idCommentForm","note"])));
            Feedback::setSuccess("Mise à jour du commentaire enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la mise à jour du commentaire.");
        }
    }

    public static function deleteComment(int $idCommentForm) {
        try {
            if(!self::existCommentForm($idCommentForm)) {
                Feedback::setError("Suppression impossible, le commentaire n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM commentForm WHERE idCommentForm = :id")
                ->execute(array("id" => $idCommentForm));
            Feedback::setSuccess("Suppression du commentaire enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression du commentaire.");
        }
    }

    // useless function ?
    public static function getComment(int $idCommentForm) {
        try {
            if(!self::existCommentForm($idCommentForm)) {
                Feedback::setError("Le commentaire demandée n'existe pas.");
                return;
            }
            $res = Database::getInstance()->prepare("SELECT * FROM commentForm WHERE idCommentForm = :id");
            $res->execute(array("id" => $idCommentForm));
            return $res->fetch();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la récupération du commentaire.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function existCommentForm(int $idCommentForm) {
        $res = Database::getInstance()->prepare("SELECT * FROM commentForm WHERE idCommentForm = :id");
        $res->execute(array("id" => $idCommentForm));
        return $res->rowCount() !== 0;
    }

}