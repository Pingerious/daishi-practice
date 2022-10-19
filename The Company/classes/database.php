<?php

class Database{
  private $server_name = "localhost";
  private $username = "root";
  private $password = "root"; 
  private $db_name = "the_company";

  protected $conn; //大きなものを扱うときには、これを使うことが良い。安全のため！
 
  public function __construct(){
    $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

  if($this->conn->connect_error){
      //rcoffe There is an error.
      die("Connection failed: " . $this->conn->connect_error);
      // die() will terminate the current script
  } 

  }
  
  }
