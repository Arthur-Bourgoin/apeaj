<?php
namespace app\models;
use config\Database;
use app\models\ {
    UserModel,
    SessionModel,
    CommentFormModel,
    PictureModel
};
use app\class\ {
    Form,
    Feedback
};

class FormModel {

    public static function getForms(int $idStudent){
        try {
            $forms = [];
            $res = Database::getInstance()->prepare("SELECT * FROM form WHERE idStudent = :id");
            $res->execute(array("id" => $idStudent));
            while ($form = $res->fetch()) {
                $comments = CommentFormModel::getComments($form->numero, $form->idStudent);
                $forms[] = new Form($form, $comments, null, null, null, null, null, null, true);
            }
            return $forms;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getFinishedForms(int $idStudent) {
        try {
            $forms = [];
            $query = "SELECT f.* FROM form f 
                      INNER JOIN session s ON f.idSession = s.idSession 
                      WHERE f.idStudent = :id AND f.finish = true AND s.state = 1";
            $res = Database::getInstance()->prepare($query);
            $res->execute(array("id" => $idStudent));
            while ($form = $res->fetch()) {
                $session = SessionModel::getSession($form->idSession);
                $student = UserModel::getUser($form->idStudent);
                $forms[] = new Form($form, null, null, null, null, $session, $student, null, null);
            }
            return $forms;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if (!empty($res))
                $res->closeCursor();
        }
    }

    public static function getCurrentForm(int $idStudent) {
        try {
            $forms = [];
            $query = "SELECT f.* FROM form f 
                      INNER JOIN session s ON f.idSession = s.idSession 
                      WHERE f.idStudent = :id AND f.finish = false AND s.state = 2";
            $res = Database::getInstance()->prepare($query);
            $res->execute(array("id" => $idStudent));
            while ($form = $res->fetch()) {
                $session = SessionModel::getSession($form->idSession);
                $student = UserModel::getUser($form->idStudent);
                $forms[] = new Form($form, null, null, null, null, $session, $student, null, null);
            }
            return $forms;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if (!empty($res))
                $res->closeCursor();
        }
    }

    public static function getPlannedForms(int $idStudent) {
        try {
            $forms = [];
            $query = "SELECT f.* FROM form f 
                      INNER JOIN session s ON f.idSession = s.idSession 
                      WHERE f.idStudent = :id AND s.state = 3";
            $res = Database::getInstance()->prepare($query);
            $res->execute(['id' => $idStudent]);
            while ($form = $res->fetch()) {
                $session = SessionModel::getSession($form->idSession); 
                $student = UserModel::getUser($form->idStudent); 
                $forms[] = new Form($form, null, null, null, null, $session, $student, null, null);
            }
            return $forms; 
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
            return []; 
        } finally {
            if (isset($res) && !empty($res)) {
                $res->closeCursor(); 
            }
        }
    }

    public static function getFormsBySession(int $idSession) {
        try {
            $forms = [];
            $res = Database::getInstance()->prepare("SELECT * FROM form WHERE idSession = :id");
            $res->execute(array("id" => $idSession));
            while ($form = $res->fetch())
                $forms[] = new Form($form, null, null, null, null, null, UserModel::getUser($form->idStudent), null, null);
            return $forms;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getFormsByTraining(int $idTraining) {
        try {
            $forms = [];
            $res = Database::getInstance()->prepare("SELECT * FROM form, session WHERE form.idSession = session.idSession AND session.idTraining = :id");
            $res->execute(array("id" => $idTraining));
            while ($form = $res->fetch()) {
                $comments = CommentFormModel::getComments($form->numero, $form->idStudent);
                $forms[] = new Form($form, $comments, null, null, null, null, null, null, null);
            }
            return $forms;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getForm(int $numero, int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM form WHERE numero = :numero AND idStudent = :idStudent");
            $res->execute(array("numero" => $numero, "idStudent" => $idStudent));
            if($res->rowCount() === 0) {
                Feedback::setError("Erreur, la fiche demandée n'existe pas.");
                return;
            }
            $form = $res->fetch();
            $comments = CommentFormModel::getComments($numero, $idStudent);
            $pictures = PictureModel::getPictures($numero, $idStudent);
            $elements = DisplayElementModel::getDisplayElements($numero, $idStudent);
            $materials = MaterialModel::getMaterials($numero, $idStudent);
            $session = SessionModel::getSession($form->idSession);
            $student = UserModel::getUser($idStudent);
            $educator = UserModel::getUser($form->idEducator);
            if(!is_array($comments) || !is_array($pictures) || !is_array($elements) || !is_array($materials)) {
                Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
                return;
            }
            return new Form($form, $comments, $pictures, $elements, $materials, $session, $student, $educator,null);
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getSimpleForm(int $numero, int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM form WHERE numero = :numero AND idStudent = :idStudent");
            $res->execute(array("numero" => $numero, "idStudent" => $idStudent));
            return $res->fetch();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la fiche.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getMaxNumero(int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT max(numero) as max FROM form WHERE idStudent = :idStudent");
            $res->execute(array("idStudent" => $idStudent));
            return $res->fetch()->max;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la création de la fiche.");
        }
    }  

    public static function finishForm(int $numero, int $idStudent) {
        try {
            if (!self::existForm($numero, $idStudent)) {
                Feedback::setError("Mise à jour impossible, la fiche n'existe pas.");
                return;
            }
    
            // Marquer la fiche comme terminée
            Database::getInstance()
                ->prepare("UPDATE form SET finish = true WHERE numero = :numero AND idStudent = :idStudent")
                ->execute(array("numero" => $numero, "idStudent" => $idStudent));
    
            // Récupérer l'identifiant de session de cette fiche
            $form = self::getSimpleForm($numero, $idStudent);
            $idSession = $form->idSession;
                SessionModel::closeSession($idSession);
            Feedback::setSuccess("Mise à jour de la fiche enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la mise à jour de la fiche.");
        }
    }

    public static function addForm(array $args) {
        try {
            $keys = ["idEducator", "numero", "idStudent", "finish", "creationDate", "bgColor", "idSession"];
            Database::getInstance()
                ->prepare("INSERT INTO form (idEducator, numero, idStudent, finish, creationDate, bgColor, idSession)
                           VALUES (:idEducator, :numero, :idStudent, :finish, :creationDate, :bgColor, :idSession)")
                ->execute(array_intersect_key($args, array_flip($keys)));
            return true;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la création de la fiche.");
            return false;
        }
    }

    public static function updateForm(array $args) {
        try {
            $keys = ["idStudent", "numero", "studentLastName", "studentFirstName", "applicantName", "applicationDate", "location", "description", "urgencyDegree", "interventionDate", "interventionDuration", "interventionValidation", "maintenanceType", "interventionNature", "workDone", "workNotDone", "newIntervention"];
            if(!self::existForm($args["numero"], $args["idStudent"])) {
                Feedback::setError("Mise à jour impossible, la fiche n'existe pas.");
                return;
            }
            foreach($args as &$arg) {
                if($arg === "") {
                    $arg = null;
                } elseif($arg === False) {
                    $arg = 0;
                }
            }
            Database::getInstance()
                ->prepare("UPDATE form 
                           SET studentLastName = :studentLastName,
                               studentFirstName = :studentFirstName,
                               applicantName = :applicantName,
                               applicationDate = :applicationDate,
                               location = :location,
                               description = :description,
                               urgencyDegree = :urgencyDegree,
                               interventionDate = :interventionDate,
                               interventionDuration = :interventionDuration,
                               interventionValidation = :interventionValidation,
                               maintenanceType = :maintenanceType,
                               interventionNature = :interventionNature,
                               workDone = :workDone,
                               workNotDone = :workNotDone,
                               newIntervention = :newIntervention
                           WHERE numero = :numero AND idStudent = :idStudent")
                ->execute(array_intersect_key($args, array_flip($keys)));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function deleteForm(int $numero, int $idStudent) {
        try {
            if(!self::existForm($numero, $idStudent)) {
                Feedback::setError("Suppression impossible, la fiche n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM form WHERE numero = :numero AND idStudent = :idStudent")
                ->execute(array("numero" => $numero, "idStudent" => $idStudent));
            Feedback::setSuccess("Suppression de la fiche enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression de la fiche.");
        }
    }

    public static function avgLevelElements(int $numero, int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT avg(level) as avg FROM display WHERE numero = :numero AND idStudent = :idStudent");
            $res->execute(array("numero" => $numero, "idStudent" => $idStudent));
            return $res->fetch()->avg;
        } catch(\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        }
    }

    public static function avgNoteComments(int $numero, int $idStudent) {
        try {
            $res = Database::getInstance()->prepare("SELECT avg(note) as avg FROM commentForm WHERE numero = :numero AND idStudent = :idStudent");
            $res->execute(array("numero" => $numero, "idStudent" => $idStudent));
            return $res->fetch()->avg;
        } catch(\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        }
    }

    public static function openForm(int $numero, int $idStudent) {
        try {
            if (!self::existForm($numero, $idStudent)) {
                Feedback::setError("Mise à jour impossible, la fiche n'existe pas.");
                return;
            }
    
            // Marquer la fiche comme non terminée
            Database::getInstance()
                ->prepare("UPDATE form SET finish = false WHERE numero = :numero AND idStudent = :idStudent")
                ->execute(array("numero" => $numero, "idStudent" => $idStudent));
    
            // Récupérer l'identifiant de session de cette fiche
            $form = self::getSimpleForm($numero, $idStudent);
            $idSession = $form->idSession;
            SessionModel::reOpenSession($idSession);
            Feedback::setSuccess("La fiche est bien marquée comme non finie");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la mise à jour de la fiche.");
        }
    }
    

    public static function existForm(int $numero, int $idStudent) {
        $res = Database::getInstance()->prepare("SELECT * FROM form WHERE numero = :numero AND idStudent = :id");
        $res->execute(array("id" => $idStudent, "numero" => $numero));
        return $res->rowCount() === 1;
    }

}