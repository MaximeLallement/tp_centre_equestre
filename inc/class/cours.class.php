<?php

/**
 * Class Cours 
 * 
 * 
 * 
 */
class Cours{

    //Property
    private int  $id_cours;
    private int     $id_week_cours;
    private string  $start_event;
    private string     $end_event;
    private string     $title;

    //Constructor
    public function __construct($id,$idw,$start,$end,$t)
    {
        $this->id_cours = $id;
        $this->id_week_cours = $idw;
        $this->start_event = $start;
        $this->end_event = $end;
        $this->title = $t;
    }

    //Setters
    public function setId($id){
        $this->id_cours = $id;
    }
    public function setIdWeek($idw){
        $this->id_week_cours = $idw;
    }
    public function setStartEvent($start){
        $this->start_event = $start;
    }
    public function setEndEvent($end){
        $this->end_event = $end;
    }
    public function setTitle($t){
        $this->title = $t;
    }
    //Getters
    public function getId():int
    {
        return $this->id_cours;
    }
    public function getIdWeek():int
    {
        return $this->id_week_cours;
    }
    public function getStartEvent():string
    {
        return $this->start_event;
    }
    public function getEndEvent():string
    {
        return $this->end_event;
    }
    public function getTitle():string
    {
        return $this->title;
    }


}