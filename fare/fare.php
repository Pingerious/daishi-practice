<?php

class Fare{
  private $distance;
  private $age;
  private $fare;

  //setter
  public function setDistance($distance){
    $this->distance =$distance;
  }

  public function setAge($age){
    $this->age = $age;
  }

  public function computeFare(){
    if($this->distance<=4){
      if($this->age<60){
        $this->fare = 8;
      }else{
        $this-> fare = 8 * 0.8;
      }
    } elseif($this->distance>4){
      $adjusted_fare = 4 + $this->distance;
      if($this->age<60){
      $this->fare = $adjusted_fare;
      }else{
      $this->fare = $adjusted_fare * 0.8;
      }
    } return $this->fare;
  }


//getter
public function getDistance(){
  return $this->distance;
}

public function getAge(){
  return $this->age;
}


}