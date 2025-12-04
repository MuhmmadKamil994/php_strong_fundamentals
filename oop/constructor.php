<?php
class constructor{
public $name,$age;
function __construct($name="no name",$age=0){
$this->name=$name;
$this->age=$age;
}
function info(){
    echo "Mr  ".$this->name."  has ".$this->age;
}
}
$person1=new constructor();
$person2=new constructor("Malik Kamil",30);
$person3=new constructor("Ali Afzal",40);
echo $person1->info()."\n";
echo $person2->info()."\n";
echo $person3->info();
?>