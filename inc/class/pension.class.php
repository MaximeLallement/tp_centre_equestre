<?php

/* Class Pension */

abstract class Pension{
    const errmessage = "Une erreur s'est produite \n";

    /*Propriété */
    private int $tarif;
    private int $duree;
    private string $date_de_debut;
    private string $libelle;
    
    
    /*Constructor */
    public function __construct($letarif, $laduree, $date, $lelibelle) {
        $this->tarif=$letarif;
        $this->duree=$laduree;
        $this->date_de_debut=$date;
        $this->libelle=$lelibelle;
    }
    
    
    /*Setter */
    public function setTarif($letarif){
        $this->tarif=$letarif;
    }
    
    public function setDuree($laduree){
        $this->duree=$laduree;
    }
    
    public function setDate_de_debut($date){
        $this->date_de_debut=$date;
    }
    
    public function setLibelle($lelibelle) {
        $this->libelle=$lelibelle;
    }
    
    
    /*Getter */
    public function getTarif(){
        return $this->tarif;
    }
    
    public function getDuree(){
        return $this->duree;
    }
    
    public function getDate_de_debut(){
        return $this->date_de_debut;
    }
    
    public function getLibelle(){
        return $this->libelle;
    }
    
    
    /*Fonction */
    public function get_all(){
        global $con;
        
        $req="SELECT * FROM ".DB_TABLE_PENSION;
        try{
            $sql=$conn->query($req);
            return $sql->fetchAll (PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }        
    }
}