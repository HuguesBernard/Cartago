<?php

class Auths extends Controller
{
    public function deconnexion()
    {
        unset($_SESSION[Auth::USER]);
        header("Location: " . URI . "sacs/index");
    }

    public function login()
    {
        if (isset($_SESSION['Utilisateur'])) {
            header("Location: " . URI . "sacs/index");
        }

        if (isset($_POST["submit"])) {
            if ($this->isValid($_POST)) {
                $mot_de_passe = $_POST["mot_de_passe"];
                unset($_POST["mot_de_passe"]);
                unset($_POST["submit"]);

                $auth = new Auth();
                $utilisateur = $auth->findByEmail($_POST);
                if ($utilisateur) {
                    if (password_verify($mot_de_passe, $utilisateur->mot_de_passe)) {
                        unset($utilisateur->mot_de_passe);
                        $_SESSION[Auth::USER] = $utilisateur;
                        header("Location: " . URI . "sacs/index");

                    } else {
                        $erreurs["message"] = "Email or password invalid!";
                        $this->render("login", $erreurs);
                        return;
                    }
                } else {
                    $erreurs["message"] = "Email or password invalid!";
                    $this->render("login", $erreurs);
                }
            } else {
                $erreurs["message"] = "Remplir tous les champs!";
                $this->render("login", $erreurs);
            }
        }
        $this->render("login");
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function inscription()
    {
        if (isset($_SESSION[Auth::USER])) {
            header("Location: " . URI . "sacs/index");
        }
        if (isset($_POST["inscription"])) {
            if ($this->isValid($_POST)) {
                if ($_POST["mot_de_passe"] === $_POST["c_mot_de_passe"]) {
                    unset($_POST["inscription"]);
                    unset($_POST["c_mot_de_passe"]);
                    $_POST["id_role"] = 2;
                    $_POST["mot_de_passe"] = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
                    $auth = new Auth();
                    $auth->inscription($_POST);
                }
                echo "valide";
            } else {
                echo "invalide";
            }
        }
        $this->render("inscription");
    }
}
