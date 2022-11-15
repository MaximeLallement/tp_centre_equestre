<?php

/**
 * Class Cavalier 
 * 
 * 
 * 
 */
class Cheval{

    //Property
    private string $che_nom;
    private string $che_sire;
    private int $che_robe_id;
    private $che_cav_id;
    private string $che_photo;

    //Constructor
    public function __construct($n,$s,$id_r,$id_c = null, $p = "default.jpg")
    {
        $this->che_nom = $n;
        $this->che_sire = $s;
        $this->che_robe_id = $id_r;
        $this->che_cav_id = $id_c;
        $this->che_photo = $p;
    }

    //Setters
    public function setNom(string $n){
        $this->che_nom= $n;
    }
    public function setSIRE($s){
        $this->che_sire = $s;
    }
    public function setRobe(int $r){
        $this->che_robe_id = $r;
    }
    public function setCavalier( $c){
        $this->che_cav_id = $c;
    }
    public function setPhoto( $p ){
        $this->che_photo = $p;
    }
    //Getters
    public function getNom()
    {
        return $this->che_nom;
    }
    public function getSIRE()
    {
        return $this->che_sire;
    }
    public function getRobe()
    {
        return $this->che_robe_id;
    }
    public function getCavalier()
    {
        return $this->che_cav_id;
    }
    public function getPhoto()
    {
        return $this->che_photo;
    }


}