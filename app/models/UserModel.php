<?php
namespace app\models;
use config\Database;
use app\class\User;
use app\models\CommentStudentModel;
use app\class\Feedback;

class UserModel {

    public static function getUsers(int $idTraining) {
        try {
            $users = [];
            $res = Database::getInstance()->prepare("SELECT * FROM users WHERE idTraining = :id ORDER BY role DESC");
            $res->execute(array("id" => $idTraining));
            if($res->rowCount() === 0) {
                Feedback::setError("Aucun utilisateur n'est associé à cette formation.");
                return;
            }
            while($user = $res->fetch()) {
                $comments = CommentStudentModel::getComments($user->idUser);
                $users[] = new User($user, $comments);
            }
            return $users;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getStudents(int $idTraining) {
        try {
            $users = [];
            $res = Database::getInstance()->prepare("SELECT * FROM users WHERE idTraining = :id AND role = 'student'");
            $res->execute(array("id" => $idTraining));
            while($user = $res->fetch()) {
                $comments = CommentStudentModel::getComments($user->idUser);
                $users[] = new User($user, $comments);
            }
            return $users;
        } catch (\Exception $e) {
            throw $e;
            exit();
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getAdmins() {
        try {
            $admins = [];
            $res = Database::getInstance()->query("SELECT * FROM users WHERE role in ('educator-admin', 'educator', 'CIP','super-admin')");
            while($admin = $res->fetch()) {
                $admins[] = new User($admin, null);
            }
            return $admins;
        } catch (\Exception $e) {
            throw $e;
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getAdminsWithoutSA() {
        try {
            $admins = [];
            $res = Database::getInstance()->query("SELECT * FROM users WHERE role in ('educator-admin', 'educator', 'CIP')");
            while($admin = $res->fetch()) {
                $admins[] = new User($admin, null);
            }
            return $admins;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }
    public static function getAdminsByTraining() {
        try {
            $admins = [];
            $res = Database::getInstance()->query("SELECT * FROM users WHERE role in ('educator-admin', 'educator', 'CIP','super-admin') AND idTraining=".$_SESSION["training"]." OR idTraining IS NULL");
            while($admin = $res->fetch()) {
                $admins[] = new User($admin, null);
            }
            return $admins;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getAdminsByTrainingWithoutSA(int $idTraining) {
        try {
            $admins = [];
            $res = Database::getInstance()->query("SELECT * FROM users WHERE role IN ('educator-admin', 'educator', 'CIP') AND (idTraining=".$idTraining." OR idTraining IS NULL)");
            while($admin = $res->fetch()) {
                $admins[] = new User($admin, null);
            }
            return $admins;
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getUser(int $idUser) {
        try {
            $res = Database::getInstance()->prepare("SELECT * from users WHERE idUser = :id");
            $res->execute(array("id" => $idUser));
            if($res->rowCount() === 0) {
                Feedback::setError("Une erreur s'est produite lors du chargement dkjlhe la page.");
                return;
            }
            $user = $res->fetch();
            $comments = CommentStudentModel::getComments($user->idUser);
            return new User($user, $comments);
        } catch (\Exception $e) {
            throw $e;
            exit;
            Feedback::setError("Une erreur s'est produite lors du chargement de la page.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function getUserByLogin(string $login) {
        try {
            $res = Database::getInstance()->prepare("SELECT * FROM users WHERE login = :login");
            $res->execute(array("login" => $login));
            return $res->fetch();
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de la connexion.");
        } finally {
            if(!empty($res))
                $res->closeCursor();
        }
    }

    public static function addUser(array $args) {
        try {
            if(!TrainingModel::existTraining($args["idTraining"])) {
                Feedback::setError("Impossible d'ajouter l'utilisateur, la formation associée n'existe pas.");
                return;
            }
            $keys = ["login", "lastName", "firstName", "picture", "typePwd", "pwd", "role", "idTraining"];
            $args["login"] = self::generateLogin($args["firstName"], $args["lastName"]);
            $args["pwd"] = password_hash($args["pwd"], PASSWORD_BCRYPT);
            Database::getInstance()
                ->prepare("INSERT INTO users (login, lastName, firstName, picture, typePwd, pwd, role, idTraining)
                           VALUES (:login, :lastName, :firstName, :picture, :typePwd, :pwd, :role, :idTraining)")
                ->execute(array_intersect_key($args, array_flip($keys)));
            Feedback::setSuccess("Ajout de l'utilisateur enregistré.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur s'est produite lors de l'ajout de l'utilisateur.");
        }
    }

    public static function updateUser(array $args) {
        try {
            if(!self::existUser($args["idUser"])) {
                Feedback::setError("Mise à jour impossible, l'utilisateur n'existe pas.");
                return;
            }
            $keys = ["lastName", "firstName", "idUser", "role"];
            $args["login"] = self::generateLogin($args["firstName"], $args["lastName"]);      
            Database::getInstance()
                ->prepare("UPDATE users 
                        SET lastName = :lastName,
                            firstName = :firstName,
                            role = :role
                        WHERE idUser = :idUser")
                ->execute(array_intersect_key($args, array_flip($keys)));
                Feedback::setSuccess("Mise à jour de l'utilisateur enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors de la mise à jour de l'utilisateur.");
        }
    }

    public static function updateUserAndPwd(array $args) {
        try {
            if(!self::existUser($args["idUser"])) {
                Feedback::setError("Mise à jour impossible, l'utilisateur n'existe pas.");
                return;
            }
            $keys = ["lastName", "firstName", "typePwd", "pwd", "idUser", "role"];
            $args["pwd"] = password_hash($args["pwd"], PASSWORD_BCRYPT);
            Database::getInstance()
                ->prepare("UPDATE users 
                        SET lastName = :lastName,
                            firstName = :firstName,
                            role = :role,
                            typePwd = :typePwd,
                            pwd = :pwd
                        WHERE idUser = :idUser")
                ->execute(array_intersect_key($args, array_flip($keys)));
                Feedback::setSuccess("Mise à jour de l'utilisateur enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors de la mise à jour de l'utilisateur.");
        }
    }

    public static function deleteUser(int $idUser) {
        try {
            if(!self::existUser($idUser)) {
                Feedback::setError("Suppression impossible, l'utilisateur n'existe pas.");
                return;
            }
            Database::getInstance()
                ->prepare("DELETE FROM users WHERE idUser = :idUser")
                ->execute(array("idUser" => $idUser));
            Feedback::setSuccess("Suppression de l'utilisateur enregistrée.");
        } catch (\Exception $e) {
            Feedback::setError("Une erreur est survenue lors de la suppression de l'utilisateur.");
        }
    }

    public static function existUser(int $idUser) {
        $res = Database::getInstance()->prepare("SELECT * FROM users WHERE idUser = :id");
        $res->execute(array("id" => $idUser));
        return $res->rowCount() === 1;
    }

    /**
     * Undocumented function
     * problem both login
     * @param string $fName
     * @param string $lName
     * @return void
     */
    private static function generateLogin(string $fName, string $lName) {
        $res = Database::getInstance()->prepare("SELECT * FROM users WHERE lastName = :lName AND firstName = :fName");
        $res->execute(array("lName" => $lName, "fName" => $fName));
        if( ($num=$res->rowCount()) > 1)
            return strtolower($fName) . "." . strtolower($lName) . ($num+1);
        else
            return strtolower($fName) . "." . strtolower($lName);
    }

}