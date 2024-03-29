<?php

/**
 * Class Cavalier 
 * 
 * 
 * 
 */
class Cavalier extends Personne{

    //Property
    private string  $cav_photo;
    private int     $cav_galop;
    private string  $cav_nlic;
    private int     $cav_actif = 1;

    //Constructor
    public function __construct($nom,$prenom,$date,$m,$tel, $ph = "default.jpg", $g, $num)
    {
        parent::__construct($nom,$prenom,$date,$m,$tel);
        $this->cav_photo = $ph;
        $this->cav_galop = $g;
        $this->cav_nlic = $num;
    }

    //Setters
    public function setPhoto($p){
        $this->cav_photo = $p;
    }
    public function setGalop($g){
        $this->cav_galop = $g;
    }
    public function setNlic($num){
        $this->cav_nlic = $num;
    }
    //Getters
    public function getPhoto():string
    {
        return $this->cav_photo;
    }
    public function getGalop():int
    {
        return $this->cav_galop;
    }
    public function getNlic():string
    {
        return $this->cav_nlic;
    }


}