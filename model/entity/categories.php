<?php
class category extends entity{
  protected $id;
  protected $name;

  //Constructor
  public function __construct($data = null){
    //Permet d'hydrater mon objet
    if($data){
      $this->hydrate($data);
    }
  }


  //setter/getter
  public function setCategory($name){
    $this->nam = $nam;
  }
  public function getCategory(){
    return $this->name;
  }

}
?>