<?php

class Image extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Image"; 
    }

    public function upload($data)
    {
        $this->sql = "insert into " . $this->table . "(id_sac, chemin_image) VALUE (:id_sac, :chemin_image)";
        return $this->getLines($data, null);

    }

}
