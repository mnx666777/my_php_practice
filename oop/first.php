<?php 
class person{
    public $name;
    Private $age;
    public function __construct($name,$age){
        $this->name=$name;
        $this->age=$age;
    }
    public function introduce(){
        return "hi I am {$this->name} and my age is {$this->age}. thank you!";
    }
    public function getage(){
        return $this->age;
    }
    public function newage($new){
        if($new>0){
            $this->age=$new;
        }
    }
}