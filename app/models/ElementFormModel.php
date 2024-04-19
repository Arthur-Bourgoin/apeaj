<?php
namespace app\models;
use config\Database;
use app\models\FormModel;
use app\class\Feedback;

class ElementFormModel {

    public static function getElements() {
        try {
            //$res = Database::getInstance()->query("SELECT * FROM ElementForm WHERE idElementForm in ('studentFirstName', 'studentLastName', 'urgencyDegree', 'applicantName', 'applicationDate', 'location', 'description', 'interventionDate', 'interventionDuration', 'interventionValidation', 'maintenanceAmeliorative', 'maintenancePreventive', 'maintenanceCorrective', 'interventionElectricalInstallation', 'interventionHealthFacility', 'interventionFinition', 'interventionLayout', 'workNotDone', 'workDone', 'newIntervention')");
            $res = Database::getInstance()->query("SELECT * FROM elementForm WHERE idElementForm != 'fsTitle'");
            return $res->fetchAll();
        } catch(\Exception $e) {
            Feedback::setError("Une erreur est survenue lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

}