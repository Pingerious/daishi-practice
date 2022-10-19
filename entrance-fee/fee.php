<?php

class Fee{
  private $age;
  // private $birthday;

  public function setAge($age){
    $this->age=$age;
  }

  //public function birthday($birthday){
    //$this->birthday=$birthday;
  //}

  public function computeFee(){
    if($this->age<6){
      $this->fee=0;
    } elseif($this->age<12){
      $this->fee=2;
    } elseif($this->age<18){
      $this->fee=4;
    } elseif($this->age<22){
      $this->fee=5;
    } elseif($this->age>=70){
      $this->fee=5;
    } else{
      $this->fee=10;
    } return $this->fee;
  } 




  public function getAge(){
    return $this->age;
  }
}

