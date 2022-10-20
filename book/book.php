<?php
    class Book{

        //properties/variables
        private $title;
        private $author;
        private $price;

        //setters
        public function setTitle($title){
            $this->title = $title;
        }

        public function setAuthor($new_author){
            $this->author = $new_author;
        }

        public function setPrice($new_price){
            $this->price = $new_price;
        }

        public function setValues($new_title, $new_author, $new_price){
            $this->title = $new_title;
            $this->author = $new_author;
            $this->price = $new_price;
        }
        //getter
        public function getTitle(){
            return $this->title;
        }

        public function getAuthor(){
            return $this->author;
        }

        public function getPrice(){
            return $this->price;
        }

        public function displayInformation(){
            echo "Title: " . $this->getTitle();
            echo "<br> Price: " . $this->price;
            echo "<br> Author: " . $this->author;
        }

    }

?>

<!-- anpanman -->