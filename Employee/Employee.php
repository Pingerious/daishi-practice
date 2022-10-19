<?php

class Employee {

    private $civil_status;
    private $emp_status;
    private $position;
    private $hours;

    function __construct($civil_status, $emp_status, $position, $hours)
    {
        $this -> civil_status = $civil_status;
        $this -> emp_status = $emp_status;
        $this -> position = $position;
        $this -> hours = $hours; #45
    }

    function calculateGrossPay(){

        /* 
            Staff & contractual = 300 per day ~~~ OT = 10 per hr
            Staff & Probationary = 350 per day ~~~ OT = 25 per hr
            Staff & Regular = 400 per day ~~~ OT = 30 per hr
            Admin & Contractual = 350 per day ~~~ OT = 15 per hr
            Admin & Probationary = 400 per day ~~~ OT = 30 per hr
            Admin & Regular = 500 per day ~~~ OT = 40 per hr 
        */

        $ot_rate_staff_contractual = ($this->hours - 40)    * 10;
        $ot_rate_staff_probationary = ($this->hours - 40)   * 25;
        $ot_rate_staff_regular = ($this->hours - 40)        * 30;
        $ot_rate_admin_contractual = ($this->hours - 40)    * 15;
        $ot_rate_admin_regular = ($this->hours - 40)        * 40;

        # 45
        if($this->hours > 40 && $this->emp_status=="Contractual" && $this->position ="Staff"){
            return (300/8) * 40 + $ot_rate_staff_contractual;
        }

        if($this->hours > 40 && $this->emp_status=="Probationary" && $this->position ="Staff"){
            return (350/8) * 40 + $ot_rate_staff_probationary;
        }

        if($this->hours > 40 && $this->emp_status=="Regular" && $this->position ="Staff"){
            return (400/8) * 40 + $ot_rate_staff_regular;
        }

        if($this->hours > 40 && $this->emp_status=="Contractual" && $this->position ="Admin"){
            return (350/8) * 40 + $ot_rate_admin_contractual;
        }

        if($this->hours > 40 && $this->emp_status=="Probationary" && $this->position ="Admin"){
            return (400/8) * 40 + $ot_rate_staff_regular;
        }

        if($this->hours > 40 && $this->emp_status=="Regular" && $this->position ="Admin"){
            return (500/8) * 40 + $ot_rate_admin_regular;
        }

        #35
        if($this->hours <= 40 && $this->emp_status=="Contractual" && $this->position ="Staff"){
            return (300/8) * $this->hours;
        }

        if($this->hours <= 40 && $this->emp_status=="Probationary" && $this->position ="Staff"){
            return (350/8) * $this->hours;
        }

        if($this->hours > 40 && $this->emp_status=="Regular" && $this->position ="Staff"){
            return (400/8) * $this->hours;
        }

        if($this->hours <= 40 && $this->emp_status=="Contractual" && $this->position ="Admin"){
            return (350/8) * $this->hours;
        }

        if($this->hours <= 40 && $this->emp_status=="Probationary" && $this->position ="Admin"){
            return (400/8) * $this->hours;
        }

        if($this->hours <= 40 && $this->emp_status=="Regular" && $this->position ="Admin"){
            return (500/8) * $this->hours;
        }
    }

    function getTaxableIncome(){
         /*  
         TAX
            Single  - Gross income > 1000 = tax 5%
                - Gross income <= 1000 = no tax
            Married - Gross income <= 1500 = no tax
                - Gross income > 1500 = tax 3% 
        */
            # TRUE
        if( $this->civil_status =="Single" && $this->calculateGrossPay() <= 1000 || $this->civil_status == "Married" && $this-> calculateGrossPay() <= 1500 ) {
            return $this->calculateGrossPay();
        }
        if($this->civil_status =="Single" && $this->calculateGrossPay()>1000) {
            return number_format($this->calculateGrossPay() - (($this->calculateGrossPay() * 0.05)+200),2);
        }

        if($this->civil_status =="Married" && $this->calculateGrossPay()>1500) {
            return number_format($this->calculateGrossPay() - (($this->calculateGrossPay() * 0.03)+75),2);
        }
    }

}

?>