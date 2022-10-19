<?php
require "database.php";

class User extends Database{

  public function store($request){
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $password = $request['password'];
    $photo = "profile.jpg";

    $password = password_hash($password, PASSWORD_DEFAULT);
    // QUERY
    $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`, `photo`) VALUES ('$first_name', '$last_name', '$username', '$password', '$photo')";
    // EXECUTE THE QUERY
    if($this->conn->query($sql)){
        // REDIRECT
        header('location: ../views');   // go to index.php of views folder
        exit;                           // same as die()
    } else {
        die('Error creating user: ' . $this->conn->error);
    }
  }

  public function login($request){
    $username = $request['username'];
    $password = $request['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    if($result = $this->conn->query($sql)){
        // Check if the username is existing
        if($result->num_rows == 1){
            // Check if the password is correct
            $user_details = $result->fetch_assoc();
            // $user_details is an associative array
            // print_r($user_details);
            if(password_verify($password, $user_details['password'])){
                session_start();
                $_SESSION['user_id'] = $user_details['user_id'];
                $_SESSION['username'] = $user_details['username'];
                $_SESSION['full_name'] = $user_details['first_name'] . " " . $user_details['last_name'];

                header("location: ../views/dashboard.php");
                exit;
            } else {
                // Password is incorrect
                die("Password is incorrect.");
            }
        } else {
            // Username is not existing
            die("Username not found.");
        }
    } else {
        die("Error logging in: " . $this->conn->error);
    }
}

  public function getAllUsers(){
    $sql = "SELECT user_id, first_name, last_name, username, photo FROM users";

    if($result = $this->conn->query($sql)){
        return $result;
    } else {
        die('Error retriving users: ' . $this->conn->error);
    }
  }

  public function getUser(){
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT first_name, last_name, username, photo FROM users WHERE user_id = $user_id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
    } else {
        die("Error retriving the user:" . $this->conn->error);
    }
  }

  public function update($request, $files){
    session_start();
    $user_id = $_SESSION['user_id'];
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $photo = $files['photo']['name'];
    $tmp_photo = $files['photo']['tmp_name'];

    $sql = "UPDATE users SET first_name = '$first_name' last_name = '$last_name' username = '$username' WHERE user_id= $user_id";

    if ($this->conn->query($sql)){
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = "$first_name $last_name";

        if($photo){
            $sql= "UPDATE users SET photo = '$photo' WHERE user_id= $user_id";
            $destination = "../assets/images/$photo";

            if($this-> conn-> query($sql)){
                if(move_uploaded_file($tmp_photo, $destination)){
                    header('location: ../views/dashboard.php');
                    exit;
                } else {
                    die('Error moving the photo');
                }
            } else {
                die('Error uploading photo: ' . $this->conn->error);
            }
        }
        header('location: ../views/dashboard.php');
        exit;
    } else {
        die('Error updating the user: ' .$this->conn->error);
    }
  }

  public function updateUser($user_id, $first_name, $last_name, $username){
    $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username', WHERE user_id = '$user_id'";

    if($this-> conn-> query($sql)){
        header("location: ../views/dashboard.php");
    } else{
        die("Error updating user: " . $this-> conn->error);
    }
  }

  public function deleteUser(){
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM users WHERE user_id = '$user_id'";

    if($this-> conn->query($sql)){
        $this->logout();
    } else {
        die ('Error deleting your account: ' . $this->conn->error);
    }
  }
}