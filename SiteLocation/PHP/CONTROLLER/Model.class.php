<?php class Model { 
/*****************Attributs***************** */
	 private $_idModel;
	 private $_nomModel;
	 private $_idMarque;
	 private $_idVoiture;
/*****************Accesseurs***************** */
public function getIdModel(){
	return $this->_idModel;
}
public function setIdModel($idModel){
	$this->_idModel = $idModel;
}
public function getNomModel(){
	return $this->_NomModel;
}
public function setNomModel($NomModel){
	$this->_NomModel = $NomModel;
}
public function getIdMarque(){
	return $this->_idMarque;
}
public function setIdMarque($idMarque){
	$this->_idMarque = $idMarque;
}
public function getIdVoiture(){
	return $this->_idVoiture;
}
public function setIdVoiture($idVoiture){
	$this->_idVoiture = $idVoiture;
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