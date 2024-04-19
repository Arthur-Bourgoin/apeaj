<?php
namespace app\models;
use config\Database;
use app\class\Session;
use app\models\TrainingModel;
use app\class\Feedback;

class SessionModel {

    public static function getSessions(int $idTraining) {
        try {
            $sessions = [];
            $res = Database::getInstance()->prepare("SELECT * FROM session WHERE idTraining = :id");
            $res->execute(array("id" => $idTraining));
            while($session = $res->fetch()) {
                $sessions[] = new Session($session);
            }
            return $sessions;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getSession(int $idSession) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM session WHERE idSession = :id");
            $res->execute(array("id" => $idSession));
            if($res->rowCount() === 0) {
                Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
                return;
            }
            return $res->fetch();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getSessionNotFinish() {
        try {
            $res = Database::getInstance()->query("SELECT * FROM session WHERE state != 1 AND idTraining=".$_SESSION['training']);
            if($res->rowCount() == 0)
                Feedback::setError("Impossible de créer une fiche, il n'existe aucune session en cours.");
            else
                return $res->fetchAll();
        } catch(\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        }
    }

    public static function addSession(array $args) {
        try {
            if(!TrainingModel::existTraining($args["idTraining"])) {
                Feedback::setError("Impossible d'ajouter la session, la formation associée n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("INSERT INTO session (wording, theme, description, timeBegin, idTraining,state) 
                           VALUES (:wording, :theme, :description, :timeBegin, :idTraining, :state)")
                ->execute(array_intersect_key($args, array_flip(["wording", "theme", "description", "timeBegin", "idTraining","state"])));
            Feedback::setSuccess("Ajout de la session enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout de la session.");
        }
    }

    public static function updateSession(array $args) {
        try {
            if(!self::existSession($args["idSession"])) {
                Feedback::setError("Mise à jour impossible, la session n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE session
                           SET wording = :wording,
                               theme = :theme,
                               description = :description,
                               timeBegin = :timeBegin,
                               state = :state
                           WHERE idSession = :idSession")
                ->execute(array_intersect_key($args, array_flip(["wording", "theme", "description", "timeBegin", "idSession","state"])));
            Feedback::setSuccess("Modification de la session enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la modification de la session.");
        }
    }

    public static function deleteSession(int $idSession) {
        try {
            if(!self::existSession($idSession)) {
                Feedback::setError("Suppression impossible, la session n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM session WHERE idSession = :id")
                ->execute(array("id" => $idSession));
            Feedback::setSuccess("Suppression de la session enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression de la session.");
        }
    }

    public static function closeSession(int $idSession) {
        try {
            if(!self::existSession($idSession)) {
                Feedback::setError("Erreur, la session n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE session SET timeEnd = :timeEnd, state = :state WHERE idSession = :id")
                ->execute(array("id" => $idSession, "timeEnd" => date('Y-m-d H:i:s'), "state" => 1));
            Database::getInstance()
                ->prepare("UPDATE form SET finish = true WHERE idSession = :id")
                ->execute(array("id" => $idSession));
            
            Feedback::setSuccess("Fin de la session enregistrée le " . date('d/m/Y H:i'));
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la fermeture de la session.");
        }
    }

    public static function reOpenSession(int $idSession){
        try {
            if (!self::existSession($idSession)) {
                Feedback::setError("Erreur, la session n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE session SET timeEnd = NULL, state = 2 WHERE idSession = :id")
                ->execute(array("id" => $idSession));
            Database::getInstance()
                ->prepare("UPDATE form SET finish = 0 WHERE idSession = :id")
                ->execute(array("id" => $idSession));
    
            Feedback::setSuccess("La session a été réouverte.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la réouverture de la session.");
        }
    }

    public static function unPlanSession(int $idSession){
        try {
            if (!self::existSession($idSession)) {
                Feedback::setError("Erreur, la session n'existe pas.");
                return;
            }elseif(!self::isOpenSession($idSession)){
                Feedback::setError("Erreur, la session que vous voulez activer n'est pas ouverte");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE session SET state = 2 WHERE idSession = :id")
                ->execute(array("id" => $idSession));
            Feedback::setSuccess("La session a été activée");
        } catch (\Exception $e) {

            Feedback::setError("Une erreur s'est produite lors de l'activation de la session.");
        }

    }

    public static function planSession(int $idSession){
        try {
            if (!self::existSession($idSession)) {
                Feedback::setError("Erreur, la session n'existe pas.");
                return;
            }elseif(!self::isOpenSession($idSession)){
                Feedback::setError("Erreur, la session que vous voulez activer n'est pas ouverte");
                return;
            }
            Database::getInstance()
                ->prepare("UPDATE session SET state = 3 WHERE idSession = :id")
                ->execute(array("id" => $idSession));
            Feedback::setSuccess("La session a été plannifiée");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la planification de la session.");
        }
    }
    

    public static function existSession(int $idSession) {
        $res = Database::getInstance()->prepare("SELECT * FROM session WHERE idSession = :id");
        $res->execute(array("id" => $idSession));
        return $res->rowCount() === 1;
    }

    public static function isOpenSession(int $idSession) {
        $res = Database::getInstance()->prepare("SELECT * FROM session WHERE idSession = :id AND timeEnd IS NULL");
        $res->execute(array("id" => $idSession));
        return $res->rowCount() === 1;
    }
}