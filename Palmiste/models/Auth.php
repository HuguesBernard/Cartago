<?php

class Auth extends Model
{
    const USER = "Utilisateur";
    const ADMIN = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->table = self::USER;
    }

    public function inscription($datas)
    {
        $this->sql = "INSERT INTO " . $this->table . " (nom,prenom,email,mot_de_passe,numero_telephone,id_role) 
        Values(:nom,:prenom,:email,:mot_de_passe,:numero_telephone,:id_role)";

        return $this->getLines($datas, null);
    }

    public function findByEmail($datas)
    {//u:utilisateur et r:role
        $this->sql = "SELECT u.*,r.description FROM " . $this->table . " u JOIN Role r on u.id_role = r.id_role WHERE email=:email";
        return $this->getLines($datas, true);
    }

    public function findByNom($datas)
    {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE nom=:nom";
        return $this->getLines($datas, null);
    }
}
