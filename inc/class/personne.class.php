<?php

/**
 * Class Personne
 * 
 * 
 * 
 */

abstract Class Personne{

    //PROPERTY
    private string $per_nom;
    private string $per_prenom;
    private string $per_birthd;
    private string $per_mail;
    private string $per_tel;
    //CONSTRUCTOR
    public function __construct($per_nom,$per_prenom,$date,$m,$tel)
    {
        $this->per_nom = $per_nom;
        $this->per_prenom = $per_prenom;
        $this->per_birthd = $date;
        $this->per_mail = $m;
        $this->per_tel = $tel;
    }

    //SETTERS
    public function setNomPersonne($n)
    {
        $this->per_nom = $n;
    }
    public function setPrenomPersonne($pn)
    {
        $this->per_prenom = $pn;
    }
    public function setDateNaissance(DateTime $date)
    {
        $this->per_birthd = $date;
    }
    public function setMail( $m)
    {
        $this->per_mail = $m;
    }
    public function setTel($tel)
    {
        $this->per_tel = $tel;
    }
    //GETTERS
    public function getNomPersonne():string
    {
        return $this->per_nom; 
    }
    public function getPrenomPersonne():string
    {
        return $this->per_prenom;
    }
    public function getDateNaissance():string
    {
        return $this->per_birthd; 
    }
    public function getMail():string
    {
        return $this->per_mail;
    }
    public function getTel():string
    {
        return $this->per_tel;
    }

    function set_to_display(){
        $this->per_nom      = html_entity_decode($this->per_nom,ENT_QUOTES,"UTF-8");
        $this->per_prenom   = html_entity_decode($this->per_prenom,ENT_QUOTES,"UTF-8");
        $this->per_mail     = html_entity_decode($this->per_mail,ENT_QUOTES,"UTF-8");
    }

    function set_from_form(){
        $this->per_nom      = html_entity_decode($this->per_nom,ENT_QUOTES,"UTF-8");
        $this->per_prenom   = html_entity_decode($this->per_prenom,ENT_QUOTES,"UTF-8");
        $this->per_mail     = html_entity_decode($this->per_mail,ENT_QUOTES,"UTF-8");
    }

}