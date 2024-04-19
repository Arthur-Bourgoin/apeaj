<?php
namespace app\class;

class UploadImg {

    const EXTENSIONS = ["jpg", "jpeg", "png", "webp"];
    const MAX_SIZE = 100000000000000000000;

    private $extension;
    private $uniq_name;

    public function __construct() {}

    public function getUniqName() { return $this->uniq_name; }

    public function upload(array $file, string $path): bool {
        $this->extension = strtolower(end(explode('.', $file["name"])));
        if(!$this->verifData($file)) {
            return false;
        } else {
            $this->uniq_name = uniqid('', true) . "." . $this->extension;
            if(move_uploaded_file($file["tmp_name"], $path . $this->uniq_name)) {
                return true;
            } else {
                Feedback::setError("Une erreur s'est produite lors de l'upload de l'image.");
                return false;
            }
        }
    }

    private function verifData(array $file) {
        if($file["error"] !== UPLOAD_ERR_OK) {
            Feedback::setError("Une erreur s'est produite lors de l'upload de l'image.");
            return false;
        } elseif($file["size"] > self::MAX_SIZE) {
            Feedback::setError("Erreur, le fichier est trop volumineux.");
            return false;
        } elseif(!in_array($this->extension, self::EXTENSIONS)) {
            Feedback::setError("Erreur, cette extension n'est pas autorisée.");
            return false;
        } else {
            return true;
        }
        // handle file inclusion
    }

}