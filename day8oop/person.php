<?php 
class person
{
    private $name;
    private $age;
    public $hobby;
    public static $count;
    public function __construct($name='', $age=10, $hobby=null){
        $this->name=$name;
        $this->age=$age;
        $this->hobby=$hobby;
        self::$count++;
    }
    public function introduce(){
        $info= "My name is {$this->name} and I am {$this->age} years old.";
        if(!empty($this->hobby)){
            $info .= " and my hobby is {$this->hobby}. Thank you !";
        }
        return $info;
    }
    public function getage(){
        return $this->age;
    }
    public function setage($newage){
        if($this->age>0){
            $this->age=$newage;
        }
    }
    public function getname(){
        return $this->name;
    }
    public function setname($newname){
        // if($this->name = ''){
            $this->name=$newname;
        // }
    }
}