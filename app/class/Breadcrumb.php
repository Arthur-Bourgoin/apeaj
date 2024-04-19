<?php
namespace app\class;

class Breadcrumb {

    public static function add($label, $name, $icon, $url = null ) {
        if (!isset($_SESSION['breadcrumb'])) {
            $_SESSION['breadcrumb'] = [];
        }
        if (! self::contains($label)){
            $_SESSION['breadcrumb'][] = ['label' => $label, 'name' => $name, 'url' => $url, 'icon'=> $icon];
        }
    }

    public static function contains($label){
        if (isset($_SESSION["breadcrumb"])){
            foreach ($_SESSION['breadcrumb'] as $breadcrumb) {
                if ($breadcrumb['label'] === $label) {
                    return true;
                }
            }
            return false;
        }
    }

    public static function render() {
        $html = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
        if (isset($_SESSION['breadcrumb'])) {
            foreach ($_SESSION['breadcrumb'] as $index => $breadcrumb) {
                if ($index == count($_SESSION['breadcrumb']) - 1) {
                    // Dernier élément actif sans lien
                    $html .= '<li class="breadcrumb-item active" aria-current="page"><i class="'.htmlspecialchars($breadcrumb['icon']).' me-2"></i>' . htmlspecialchars($breadcrumb['name']) . '</li>';
                } else {
                    // Éléments précédents avec lien
                    $html .= '<li class="breadcrumb-item"><a href="' . htmlspecialchars($breadcrumb['url']) . '"><i class="'.htmlspecialchars($breadcrumb['icon']).' me-2"></i>' . htmlspecialchars($breadcrumb['name']) . '</a></li>';
                }
            }
        }
        $html .= '</ol></nav>';

        return $html;
    }

    public static function removeAfter($label) {
        if (isset($_SESSION['breadcrumb'])) {
            $removeAfterIndex = null;
            // Trouver l'index de l'élément après lequel on veut supprimer les éléments
            foreach ($_SESSION['breadcrumb'] as $index => $breadcrumb) {
                if ($breadcrumb['label'] === $label) {
                    $removeAfterIndex = $index;
                    break;
                }
            }
    
            // Si un index a été trouvé, supprimer tous les éléments après cet index
            if (null !== $removeAfterIndex) {
                $_SESSION['breadcrumb'] = array_slice($_SESSION['breadcrumb'], 0, $removeAfterIndex);
            }
        }
    }
    

    public static function clear() {
        unset($_SESSION['breadcrumb']);
    }

}
