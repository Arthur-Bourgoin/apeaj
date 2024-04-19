<?php
namespace app\models;
use app\models\FormModel;
use config\Database;
use app\class\Feedback;

class MaterialModel {

    public static function getMaterials(int $numero, int $idStudent) {
        try {
            if(!FormModel::existForm($numero, $idStudent)) {
                Feedback::setError("Une erreur est survenue lors du chargement de la page.");
                return;
            }
            $res = Database::getInstance()->prepare('SELECT * FROM material 
                                                     WHERE idMaterial in (SELECT idMaterial FROM used WHERE numero = :numero AND idStudent = :id)
                                                     ORDER BY idMaterial');
            $res->execute(array("id" => $idStudent, "numero" => $numero));
            return $res->fetchAll();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getAllMaterials() {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM material ORDER BY idMaterial");
            $res->execute();
            return $res->fetchAll();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }
    public static function getAllTypes() {
        try {
            $res = Database::getInstance()->query("SELECT type FROM material");
            $types = [];
            while ($row = $res->fetch(\PDO::FETCH_ASSOC)) {
                $typeArray = json_decode($row['type'], true); // Décode le tableau JSON en PHP
                if(isset($typeArray)){
                    foreach ($typeArray as $type) {
                        if (!in_array($type, $types)) {
                            $types[] = $type; // Ajoute le type au tableau des types s'il n'est pas déjà présent
                        }
                    }
                }
            }
            return $types;
        } catch (\Exception $e) {
            // Gérer les erreurs si nécessaire
            Feedback::setError("Une erreur est survenue lors de la récupération des types.");
            return [];
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }
    public static function addMaterial(int $numero, int $idStudent, int $idMaterial) {
        try {
            Database::getInstance()
                ->prepare("INSERT INTO used (numero, idStudent, idMaterial)
                           VALUES (:numero, :idStudent, :idMaterial)")
                ->execute(array("numero" => $numero, "idStudent" => $idStudent, "idMaterial" => $idMaterial));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function deleteMaterials(int $numero, int $idStudent) {
        try {
            Database::getInstance()
                ->prepare("DELETE FROM used WHERE numero = :numero AND idStudent = :idStudent")
                ->execute(array("numero" => $numero, "idStudent" => $idStudent));
        } catch (\Exception $e) {
        }
    }

    public static function addNewMaterial($args) {
        try {
            $db = Database::getInstance(); 
            $query = "INSERT INTO material (wording, description, type, picture) VALUES (:wording, :description, :type, :picture)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':wording', $args['wording']);
            $stmt->bindValue(':description', $args['description']);
            
            $stmt->bindValue(':type', json_encode($args['type']));
            
            $stmt->bindValue(':picture', $args['picture']);
    
            $stmt->execute();
    
            if($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch (\PDOException $e) {
            // Gestion des erreurs
            error_log("Erreur lors de l'ajout d'un nouveau matériel : " . $e->getMessage());
            return false; 
        }
    }

}