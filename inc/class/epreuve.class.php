<?php

/**
 * Class Cavalier 
 * 
 * 
 * 
 */
class Epreuve {

    //Property
    private string  $epr_date;
    private int $epr_cavalier;
    private int $epr_galop;


    //Constructor
    public function __construct($d,$c,$g)
    {
        $this->epr_date = $d;
        $this->epr_cavalier = $c;
        $this->epr_galop = $g;
    }

    //Setters
    public function setDate($p){
        $this->epr_date = $p;
    }
    public function setCavalier($c){
        $this->epr_cavalier = $c;
    }
    public function setGalop($g){
        $this->epr_galop = $g;
    }
    //Getters
    public function getDate():string
    {
        return $this->epr_date;
    }
    public function getCavalier():int
    {
        return $this->epr_cavalier;
    }
    public function getGalop():int
    {
        return $this->epr_galop;
    }


}