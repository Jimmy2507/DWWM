<?php class user { 
/*****************Attributs***************** */
	 private $_idUser;
	 private $_nomUser;
	 private $_prenomUser;
	 private $_mdpUser;
	 private $_idRole;
/*****************Accesseurs***************** */
public function getIdUser(){
	return $this->_idUser;
}
public function setIdUser($idUser){
	$this->_idUser = $idUser;
}
public function getNomUser(){
	return $this->_nomUser;
}
public function setNomUser($nomUser){
	$this->_nomUser = $nomUser;
}
public function getPrenomUser(){
	return $this->_prenomUser;
}
public function setPrenomUser($prenomUser){
	$this->_prenomUser = $prenomUser;
}
public function getMdpUser(){
	return $this->_mdpUser;
}
public function setMdpUser($mdpUser){
	$this->_mdpUser = $mdpUser;
}
public function getIdRole(){
	return $this->_idRole;
}
public function setIdRole($idRole){
	$this->_idRole = $idRole;
}
/*****************Constructeur******************/ 
public function __construct(array $options = [])
{
    if (!empty($options)) // empty : renvoi vrai si le tableau est vide
    {
        $this->hydrate($options);
    }
}
public function hydrate($data)
{
    foreach ($data as $key => $value)
    {
        $methode = "set" . ucfirst($key); //ucfirst met la 1ere lettre en majuscule
        if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
        {
            $this->$methode($value);
        }
    }
}
/*****************Autres Méthodes***************** */ 
    /**
    * Transforme l'objet en chaine de caractères
    *
    * @return String
    */
   public function toString()
   {
       return "";
   }

   /**
    * Renvoi vrai si l'objet en paramètre est égal à l'objet appelant
    *
    * @param [type] $obj
    * @return bool
    */
   public function equalsTo($obj)
   {
       return true;
   }
   /**
    * Compare 2 objets
    * Renvoi 1 si le 1er est >
    *        0 si ils sont égaux
    *        -1 si le 1er est <
    *
    * @param [type] $obj1
    * @param [type] $obj2
    * @return void
    */
   public static function compareTo($obj1, $obj2)
   {
       return 0;
   }
}