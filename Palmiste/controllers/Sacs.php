<?php

class Sacs extends Controller
{

    public function index()
    {
        $sac = new Sac(); 
        $sacs = $sac->getAll(); 
        $this->render('index', compact("sacs"));
    }

    public function admin()
    {
        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                $sac = new Sac(); 
                $sacs = $sac->getAll(); 
                $this->render('admin', compact("sacs"));
                return;
            }
        }

        header("Location: " . URI . "sacs/index");
    }

    public function __construct()
    {
        parent::__construct();
    }

    private function uploadImage($id_sac)
    {
        
    }

    public function ajouter()
    {
        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                if (isset($_POST['save'])) {
                    if ($this->isValid($_POST)) {
                        unset($_POST['save']);
                        $sac = new Sac(); 
                        if ($sac->ajouter($_POST)) { 
                            global $oPDO;
                            $id_sac = $oPDO->lastInsertId();
                            $this->uploadImage($id_sac);
                            header("Location: " . URI . "sacs/admin"); 
                            return;
                        } else {
                            header("Location: " . URI . "sacs/admin"); 
                            return;
                        }
                    }
                }
                $this->render("ajouter");
                return;
            }
        }
        header("Location: " . URI . "sacs/index"); 
    }

    public function supprimer($id_sac)
    {
        if (isset($_SESSION[Auth::USER])) {
            if ($_SESSION[Auth::USER]->description === Auth::ADMIN) {
                if (is_numeric($id_sac)) {
                    $sac = new Sac(); 
                    if ($sac->deleteById($id_sac)) { 
                        header("Location: " . URI . "sacs/admin"); 
                        return;
                    }
                    header("Location: " . URI . "sacs/admin"); 
                    return;
                }
                header("Location: " . URI . "sacs/admin"); 
                return;
            }
        }
        header("Location: " . URI . "sacs/index"); 
    }

    
}
