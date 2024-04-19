<?php
namespace app\models;
use config\Database;
use app\class\Feedback;
use app\class\CommentFormAudio;
use app\models\FormModel;

class AudioModel{

    public static function addAudio(array $args) {
        try {
            // Vérifier l'existence du formulaire associé
            if (!FormModel::existForm($args["numero"], $args["idStudent"])) {
                Feedback::setError("Impossible d'ajouter le commentaire audio, la fiche associée n'existe pas.");
                return false;
            }
    
            $keys = ["audio", "lastModif", "numero", "idStudent", "idAuthor"];
            $args["lastModif"] = date('Y-m-d H:i:s');
    
            Database::getInstance()
            ->prepare("INSERT INTO commentFormAudio (audio, lastModif, numero, idStudent, idAuthor)
                       VALUES (:audio, :lastModif, :numero, :idStudent, :idAuthor)")
            ->execute(array_intersect_key($args, array_flip($keys)));
    
            Feedback::setSuccess("Commentaire audio ajouté avec succès.");
            return true;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout du commentaire audio : " . $e->getMessage());
            return false;
        }
    }

    public static function getAudioComments(int $idStudent, int $numero) {
        try {
            $audioComments = [];
            if(!FormModel::existForm($numero, $idStudent)) {
                Feedback::setError("Erreur, la fiche demandée n'existe pas.");
                return [];
            }

            // Supposons que la table pour les commentaires audio s'appelle `commentFormAudio`
            $res = Database::getInstance()->prepare("SELECT * FROM commentFormAudio WHERE numero = :numero AND idStudent = :id");
            $res->execute(["id" => $idStudent, "numero" => $numero]);

            while ($comment = $res->fetch()) {
                $audioComments[] = new CommentFormAudio($comment);
            }

            return $audioComments;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
            return [];
        } finally {
            if (isset($res) && $res) {
                $res->closeCursor();
            }
        }
    }
    public static function deleteAudioComment(int $idCommentFormAudio) {
        try {
            if (!self::existAudioComment($idCommentFormAudio)) {
                Feedback::setError("Suppression impossible, le commentaire audio n'existe pas.");
                return;
            }

            Database::getInstance()
                ->prepare("DELETE FROM commentFormAudio WHERE idCommentFormAudio = :id")
                ->execute(["id" => $idCommentFormAudio]);
            Feedback::setSuccess("Suppression du commentaire audio enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la suppression du commentaire audio.");
        }
    }

    public static function getAudioComment(int $idCommentFormAudio) {
        try {
            // Vérification de l'existence du commentaire audio
            if (!self::existAudioComment($idCommentFormAudio)) {
                Feedback::setError("Le commentaire audio demandé n'existe pas.");
                return null;
            }

            // Préparation et exécution de la requête SQL pour récupérer le commentaire audio
            $res = Database::getInstance()->prepare("SELECT * FROM commentFormAudio WHERE idCommentFormAudio = :id");
            $res->execute(["id" => $idCommentFormAudio]);
            $audioComment = $res->fetch();

            // Retour du commentaire audio trouvé
            return $audioComment;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la récupération du commentaire audio : " . $e->getMessage());
            return null;
        } finally {
            if (isset($res)) {
                $res->closeCursor();
            }
        }
    }

    // Assurez-vous d'implémenter cette fonction ou d'ajuster le nom si elle existe déjà
    public static function existAudioComment(int $idCommentFormAudio): bool {
        $query = Database::getInstance()->prepare("SELECT COUNT(*) FROM commentFormAudio WHERE idCommentFormAudio = :id");
        $query->execute(["id" => $idCommentFormAudio]);
        return $query->fetchColumn() > 0;
    }
}

    
    
    

