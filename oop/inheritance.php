<?php
class inheritance{
    public $age,$name,$rollno,$depart;
    function __construct($a,$n,$r,$d){
        $this->name=$n;
        $this->age=$a;
        $this->rollno=$r;
        $this->depart=$d;
    }
    function info(){
        echo "<h1>Profile of a student</h1>";
        echo "Name of student :".$this->name."<br>";
        echo "age of student :".$this->age."<br>";
        echo "rollno of student :".$this->rollno."<br>";
        echo "depart of student :".$this->depart."<br>";
    }
    
}
class account extends inheritance{
       public $fee=50000;
        function info(){
            echo "Fee structure of student: ".$this->fee;
        }
    }
$stu1=new inheritance("malik Kamil",21,"FM3M2034","Information Tehnology");
$stu2=new inheritance("Ali",34,"454dkjas","CS");
echo $stu1->info();
echo $stu2->info();
?>
