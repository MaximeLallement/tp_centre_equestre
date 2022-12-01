<?php

/* Class Pension */

abstract class Robe{
    /*Propriété */
    private int $id_rob;
    private string $lib_rob;
    
    private function __construct(int $id, string $lib)
    {
        $this->id_rob = $id;
        $this->lib_rob = $lib;   
    }

    /*Getter */
    public function getTarif(){
        return $this->id_rob;
    }
    
    public function getLibelle(){
        return $this->lib_rob;
    }
    
}