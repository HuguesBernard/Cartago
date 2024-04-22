<?php

class Panier
{
    const NAME = "Panier";

    public function __construct()
    {
        if (!isset($_SESSION[self::NAME])) {
            $_SESSION[self::NAME] = [];
        }
    }

    public function ajouter($id_sac, $quantite) 
    {
        $_SESSION[self::NAME][$id_sac] = $quantite; 
    }

    public function supprimer($id_sac) 
    {
        unset($_SESSION[self::NAME][$id_sac]); 
    }

    public function getAll()
    {
        $sacs = []; 
        foreach ($_SESSION[self::NAME] as $id_sac => $quantite) { 
            $sac = new Sac(); 
            $currentSac = $sac->lire(compact('id_sac')); 
            if ($currentSac) {
                $sacs[] = [$quantite, $currentSac]; 
            } else {
                // Si le sac n'existe plus dans la base de données, vous pouvez choisir de le supprimer du panier ici
                 unset($_SESSION[self::NAME][$id_sac]);
            }
        }
        return $sacs;
    }

}
