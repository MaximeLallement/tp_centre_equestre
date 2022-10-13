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
    public function __construct($nom,$prenom,$date,$m,$tel,$ph, $g, $num)
    {
        parent::__construct($nom,$prenom,$date,$m,$tel);
        $this->cav_photo = $ph;
        $this->cav_galop = $g;
        $this->setNlic($num);
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
    
    // FUNCTIONS

    /**
     * Permet de décoder une chaine de caractères encode au format UTF-8
     */
    public function set_to_display(){
        parent::set_to_display();
        $this->cav_photo = html_entity_decode($this->cav_photo,ENT_QUOTES,"UTF-8");

    }
    /**
     * Permet d'encoder une chaine de caractère au format UTF-8
     */
    public function set_from_form(){
        parent::set_from_form();
        $this->cav_photo = html_entity_decode($this->cav_photo,ENT_QUOTES,"UTF-8");


    }
}