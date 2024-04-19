<?php
namespace app\models;
use config\Database;
use app\class\Training;
use app\class\ExportExcel;
use app\class\Feedback;

class TrainingModel {

    public static function getTrainings() {
        try {
            $trainings = [];
            $res = Database::getInstance()->query("SELECT * FROM training");
            while($training = $res->fetch()) {
                $trainings[] = new Training($training);
            }
            return $trainings;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getTraining(int $idTraining) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM training WHERE idTraining = :id");
            $res->execute(array("id" => $idTraining));
            if($res->rowCount() === 0) {
                Feedback::setError("Erreur, la formation demandée n'existe pas.");
                return;
            }
            return new Training($res->fetch());
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'initialisation de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function addTraining(array $args) {
        try {
            Database::getInstance()
                ->prepare("INSERT INTO training (wording, description, qualifLevel, picture)
                        VALUES (:wording, :description, :qualifLevel, :picture)")
                ->execute(array_intersect_key($args, array_flip(["wording", "description", "qualifLevel", "picture"])));
            Feedback::setSuccess("Ajout de la formation enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout de la formation.");
        }
    }

    public static function updateTraining(array $args) {
        try {
            if(!self::existTraining($args["idTraining"])) {
                Feedback::setError("Mise à jour impossible, la formation n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE training
                           SET wording = :wording, description = :description, qualifLevel = :qualifLevel
                           WHERE idTraining = :idTraining")
                ->execute(array_intersect_key($args, array_flip(["wording", "description", "qualifLevel", "idTraining"])));
            Feedback::setSuccess("Mise à jour de la formation enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la modification de la formation.");
        }
    }

    /**
     * Undocumented function
     * @TODO export excel
     * @param integer $idTraining
     */
    public static function deleteTraining(int $idTraining) {
        try {
            if(!self::existTraining($idTraining)) {
                Feedback::setError("Suppression impossible, la formation n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM training WHERE idTraining = :id")
                ->execute(array("id" => $idTraining));
            Feedback::setSuccess("Suppression de la formation enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression de la formation.");
        }
    }

    public static function existTraining(int $idTraining) {
        $res = Database::getInstance()->prepare("SELECT * FROM training WHERE idTraining = :id");
        $res->execute(array("id" => $idTraining));
        return $res->rowCount() === 1;
    }

}