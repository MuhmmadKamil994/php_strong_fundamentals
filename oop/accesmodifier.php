<?php
class base{
    public $name;
    private $age;
    protected $depart;
   function __construct($n,$a,$d){
        $this->name=$n;
        $this->age=$a;
        $this->depart=$d;
    }
    function get(){
        echo "The name of student is :".$this->name."<br>";
        echo "The age of student is :".$this->age."<br>";
        echo "The depart of student is :".$this->depart."<br>";
    }
}
$stu1=new base("Malik Kamil",21,"Information Technology");
$stu2=new base("Malik Ali",24,"Computer Scince");

 $stu1->get();
 echo "<br>";
 $stu2->get();


?>