<?php

/**
 * Class Inscription 
 * 
 * 
 * 
 */
class Inscription{

    //Property
    private string  $ins_cottisation;
    private int     $ins_ffe;
    private string  $ins_annee;
    private int     $ins_cav;

    //Constructor
    public function __construct($cot,$ffe,$a,$cav)
    {
        $this->ins_cottisation = $cot;
        $this->ins_ffe = $ffe;
        $this->ins_annee = $a;
        $this->ins_cav = $cav;
    }

    //Setters
    public function setCottisation($c){
        $this->ins_cottisation = $c;
    }
    public function setFFE($ffe){
        $this->ins_ffe = $ffe;
    }
    public function setAnnee($a){
        $this->ins_annee = $a;
    }
    public function setCav($a){
        $this->ins_cav = $a;
    }
    //Getters
    public function getCottisation():string
    {
        return $this->ins_cottisation;
    }
    public function getFFE():int
    {
        return $this->ins_ffe;
    }
    public function getAnnee():string
    {
        return $this->ins_annee;
    }
    public function getCav():int
    {
        return $this->ins_cav;
    }


}