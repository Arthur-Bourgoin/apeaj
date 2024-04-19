<?php
namespace app\models;
use config\Database;
use app\models\FormModel;
use app\class\Feedback;

class DisplayElementModel {

    public static function getDisplayElements(int $numero, int $idStudent) {
        try {
            if(!FormModel::existForm($numero, $idStudent)) {
                Feedback::setError("Une erreur est survenue lors du chargement de la page.");
                return;
            }
            $res = Database::getInstance()->prepare("SELECT display.*, elementForm.type FROM display, elementForm WHERE display.idElementForm = elementForm.idElementForm AND numero = :numero AND idStudent = :id");
            $res->execute(array("id" => $idStudent, "numero" => $numero));
            return $res->fetchAll();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function addElement(array $args) {
        try {
            unset($args["temp"]);
            unset($args["type"]);
            $args["italic"]=0;
            $keys = ["numero", "idStudent", "level", "label", "picto", "active", "bold", "italic", "fontFamily", "fontColor", "fontSize", "bgColor", "textToSpeechBool", "textToSpeechText", "speechToTextBool", "idElementForm"];
            Database::getInstance()
                ->prepare("INSERT INTO display (numero, idStudent, level, label, picto, active, bold, italic, fontFamily, fontColor, fontSize, bgColor, textToSpeechBool, textToSpeechText, speechToTextBool, idElementForm)
                           VALUES (:numero, :idStudent, :level, :label, :picto, :active, :bold, :italic, :fontFamily, :fontColor, :fontSize, :bgColor, :textToSpeechBool, :textToSpeechText, :speechToTextBool, :idElementForm)")
                ->execute(array_intersect_key($args, array_flip($keys)));
            return true;
        } catch(\Exception $e) { 
            Feedback::setError("Une erreur s'est produite lors de la création d'une fiche.");
            return false;
        }
    }

}