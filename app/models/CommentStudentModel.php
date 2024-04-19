<?php
namespace app\models;
use config\Database;
use app\models\UserModel;
use app\class\CommentForm;
use app\class\CommentStudent;
use app\class\Feedback;
class CommentStudentModel {

    public static function getComments(int $idStudent) {
        try {
            $comments = [];
            $res = Database::getInstance()->prepare("SELECT * FROM commentStudent WHERE idStudent = :id");
            $res->execute(array("id" => $idStudent));
            while($comment = $res->fetch()) {
                $educator = UserModel::getUser($comment->idEducator);
                $comments[] = new CommentStudent($comment, $educator);
            }
            return $comments;
        } catch (\Exception $e) {
            throw $e;
            exit;
            Feedback::setError("Une erreur est survenue lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    // idEducator in $_POST, not in parameters
    public static function addComment(array $args) {
        try {
            if(!UserModel::existUser($args["idStudent"])) {
                Feedback::setError("Ajout du commentaire impossible, l'étudiant associé n'existe pas.");
                return;
            }
            $args["lastModif"] = date('Y-m-d H:i:s');
            Database::getInstance()
                ->prepare("INSERT INTO commentStudent (idStudent, idEducator, text, lastModif)
                           VALUES (:idStudent, :idEducator, :text, :lastModif)")
                ->execute(array_intersect_key($args, array_flip(["idStudent", "idEducator", "text", "lastModif"])));
            Feedback::setSuccess("Ajout du commentaire enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout du commentaire.");
        }
    }   
    
    // idEducator in $_POST, not in parameters
    public static function updateComment(array $args) {
        try {
            if(!self::existCommentStudent($args["idStudent"], $args["idEducator"])) {
                Feedback::setError("Mise à jour impossible, le commentaire n'existe pas.");
                return;
            }
            $args["lastModif"] = date('Y-m-d H:i:s');
            Database::getInstance()
                ->prepare("UPDATE commentStudent SET text = :text, lastModif = :lastModif WHERE idStudent = :idStudent AND idEducator = :idEducator")
                ->execute(array_intersect_key($args, array_flip(["idStudent", "idEducator", "text", "lastModif"])));
            Feedback::setSuccess("Mise à jour du commentaire enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la mise à jour du commentaire.");
        }

    }

    public static function deleteComment(int $idStudent, int $idEducator) {
        try {
            if(!self::existCommentStudent($idStudent, $idEducator)) {
                Feedback::setError("Suppression impossible, le commentaire n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM commentStudent WHERE idEducator = :idEducator AND idStudent = :idStudent")
                ->execute(array("idEducator" => $idEducator, "idStudent" => $idStudent));
            Feedback::setSuccess("Suppression du commentaire enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression du commentaire.");
        }
    }

    public static function existCommentStudent(int $idStudent, int $idEducator) {
        $res = Database::getInstance()->prepare("SELECT * FROM commentStudent WHERE idStudent = :idStudent AND idEducator = :idEducator");
        $res->execute(array("idStudent" => $idStudent, "idEducator" => $idEducator));
        return $res->rowCount() !== 0;
    }

}