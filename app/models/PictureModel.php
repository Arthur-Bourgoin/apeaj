<?php
namespace app\models;
use config\Database;
use app\models\FormModel;
use app\class\Feedback;

class PictureModel {

    public static function getPictures(int $numero, int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM picture WHERE numero = :numero AND idStudent = :id");
            $res->execute(array("id" => $idStudent, "numero" => $numero));
            // there is no error because there are probably no photos
            return $res->fetchAll();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getPicture(int $idPicture) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM picture WHERE idPicture = :idPicture");
            $res->execute(array("idPicture" => $idPicture));
            if($res->rowCount() === 0) {
                Feedback::setError("Erreur, la photo demandée n'existe pas.");
                return;
            }
            return $res->fetch();
        } catch (\Exception $e) {
            Feedback::setError("Erreur, la photo demandée n'existe pas.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    // idAuthor in $_POST, not in parameters
    public static function addPicture(array $args) {
        try {
            if(!FormModel::existForm($args["numero"], $args["idStudent"])) {
                Feedback::setError("Ajout impossible, la fiche associée n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("INSERT INTO picture (idAuthor, path, title, numero, idStudent)
                           VALUES (:idAuthor, :path, :title, :numero, :idStudent)")
                ->execute(array_intersect_key($args, array_flip(["idAuthor", "path", "title", "numero", "idStudent"])));
            Feedback::setSuccess("Ajout de la photo enregistré.");
        } catch (\Exception $e) {
            throw($e);
            Feedback::setError("Une erreur s'est produite lors de l'ajout de la photo.");
        }
    }


    public static function deletePicture(int $idPicture) { 
        try {
            if(!self::existPicture($idPicture)) {
                Feedback::setError("Suppression impossible, la photo n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM picture WHERE idPicture = :idPicture")
                ->execute(array("idPicture" => $idPicture));
            Feedback::setSuccess("Suppression de la photo enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression de la photo.");
        }
    }

    public static function getNbPictures() {
        try {
            $res = Database::getInstance()->query("SELECT * FROM picture");
            return $res->rowCount();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la récupération du nombre de photos.");
        }
    }

    public static function existPicture(int $idPicture) {
        $res = Database::getInstance()->prepare("SELECT * FROM picture WHERE idPicture = :idPicture");
        $res->execute(array("idPicture" => $idPicture));
        return $res->rowCount() !== 0;
    }

}