<?php

class Sac extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "Sac"; 
    }

    public function ajouter($data)
    {
        $this->sql = "insert into " . $this->table . " (nom, prix, description, courte_description, quantite) 
        VALUE (:nom, :prix, :description, :courte_description, :quantite)";
        return $this->getLines($data, null);

    }

    public function getAll()
    {
        $this->sql = "SELECT s.*, i.chemin_image from " . $this->table . 
            " s left join Image i on s.id_sac = i.id_sac"; 

        return $this->getLines();
    }

    public function lire($data)
    {
        $this->sql = "SELECT s.*, i.chemin_image from " . $this->table . 
            " s left join Image i on s.id_sac = i.id_sac where s.id_sac = :id_sac"; 

        return $this->getLines($data, true);
    }

    public function deleteById($data)
    {
        $this->sql = "delete from " . $this->table . " where id_sac = :id_sac"; 
        return $this->getLines($data, null);
    }

}
