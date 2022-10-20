<?php
/**
 * Class CavalierRepresentant
 * 
 * 
 */

class CavalierRepresentant extends Cavalier{

//Property

//Adresse
private string $car_rue;
private string $car_comp;
private string $car_cp;
private string $car_ville;
private string $car_pays;
//Constructor
public function __construct($nom,$prenom,$date,$m,$tel,$ph, $g, $num,$r ,$n, $cp, $v, $p)
{
    parent::__construct($nom,$prenom,$date,$m,$tel,$ph, $g, $num);
    $this->car_rue = $r;
    $this->car_comp = $n;
    $this->car_cp = $cp;
    $this->car_ville = $v;
    $this->car_pays = $p;
}

//Setters
public function setRue( $r )
{
    $this->car_rue = $r;
}
public function setComp( $n )
{
    $this->car_comp = $n;
}
public function setCodePostal( $cp )
{
    $this->car_cp = $cp;
}
public function setVille( $v )
{
    $this->car_ville = $v;
}
public function setPays( $p )
{
    $this->car_pays = $p;
}
// Getters
public function getRue():string
{
    return $this->car_rue;
}
public function getComplement():string
{
    return $this->car_comp;
}
public function getCodePostal():string
{
    return $this->car_cp;
}
public function getVille():string
{
    return $this->car_ville;
}
public function getPays():string
{
    return $this->car_pays;
}
}
