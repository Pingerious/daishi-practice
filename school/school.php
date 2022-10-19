<?php
class school{
  private $year;
  private $unit;
  private $lab;

  public function __construct($year, $unit, $lab){
    $this -> year = $year;
    $this -> unit = $unit;
    $this -> lab = $lab;
  }

  public function calculateFees(){
    if($this->lab =="lab"){
      if($this->year == "1st Year"){
        return ($this->unit * 550) + 3359;
      } elseif($this->year =="2nd Year"){
        return ($this->unit * 630) +4000;
      } elseif($this->year =="3rd Year"){
        return($this->unit * 470) + 2890;
      } else{
        return($this->unit * 501) + 3555;
      }
    } 
    elseif($this->lab =="no_lab"){
      if($this-> year == "1st Year"){
        return ($this->unit * 550);
      } elseif($this-> year == "2nd Year"){
        return ($this->unit * 630);
      }  elseif($this-> year == "3rd Year"){
      return ($this->unit * 470);
      } elseif($this-> year == "4th Year"){
        return ($this->unit * 501);
      }
    }
  }
}  
?>
