<?php



/**
 * Class Representant
 * 
 * 
 */

 Class Representant extends Personne{
    //Property

    //Adresse
    private string $rep_rue;
    private string $rep_comp;
    private string $rep_cp;
    private string $rep_ville;
    //private string $rep_pays;

    //Constructor
    public function __construct($nom,$prenom,$date,$m,$tel,$r ,$n, $cp, $v, $p)
    {
        parent::__construct($nom,$prenom,$date,$m,$tel);
        $this->rep_rue = $r;
        $this->rep_comp = $n;
        $this->rep_cp = $cp;
        $this->rep_ville = $v;
        $this->rep_pays = $p;
    }

    //Setters
    public function setRue( $r )
    {
        $this->rep_rue = $r;
    }
    public function setComplement( $n )
    {
        $this->rep_comp = $n;
    }
    public function setCodePostal( $cp )
    {
        $this->rep_cp = $cp;
    }
    public function setVille( $v )
    {
        $this->rep_ville = $v;
    }
    public function setPays( $p )
    {
        $this->rep_pays = $p;
    }
    // Getters
    public function getRue():string
    {
        return $this->rep_rue;
    }
    public function getComplement():string
    {
        return $this->rep_comp;
    }
    public function getCodePostal():string
    {
        return $this->rep_cp;
    }
    public function getVille():string
    {
        return $this->rep_ville;
    }
    public function getPays():string
    {
        return $this->rep_pays;
    }

    public function rep_get_all(){
        global $con;
        $sql = "SELECT nom_personne, prenom_personne, tel, mail, rue, complement FROM personne
            WHERE DATEDIFF(NOW(), date_de_naissance) / 365 > 18"; //Sélectionne personnes ayant plus de 18 ans
        $req = $con->prepare($sql);
        $req->execute(array($sql));
        try{
            $req = $con->query($sql);
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
 }