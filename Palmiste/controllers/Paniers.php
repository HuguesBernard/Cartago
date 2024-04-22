<?php

class Paniers extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $panier = new Panier();
        $sacs = $panier->getAll(); 
        if (is_null($sacs)) {
            $sacs = [];
        }
        $this->render("index", compact('sacs')); 
    }

    public function ajouter($id_sac) 
    {
        if (is_numeric($id_sac)) {
            $panier = new Panier();
            $panier->ajouter($id_sac, 1); 
        }
        header("Location: " . URI . "sacs/index"); 

    }

    public function supprimer($id_sac) 
    {
        if (is_numeric($id_sac)) {
            $panier = new Panier();
            $panier->supprimer($id_sac); 
        }
        header("Location: " . URI . "paniers/index");

    }

    public function modifier($id_sac) 
    {
        if (is_numeric($id_sac)) {
            if (isset($_POST['quantite']) && is_numeric($_POST['quantite'])) {
                $panier = new Panier();
                $panier->ajouter($id_sac, $_POST['quantite']); 
            }

        }
        header("Location: " . URI . "paniers/index");

    }
}
