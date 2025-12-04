<?php
interface  personalInfo{
    public function setInfo($n,$a,$d);
    public function getInfo();
} 
interface contactInfo{
    public function setcontact($e,$p);
    public function getcontact();
}
class person implements personalInfo,contactInfo{
    private $name;
    private $age;
    private $depart;
    private $Email;
    private $phone;


 function setInfo($n,$a,$d){
$this->name=$n;
$this->age=$a;
$this->depart=$d;
}
 function getInfo(){
    echo "Name of person: ".$this->name;
    echo "<br>";
    echo "age of person: ".$this->age;
    echo "<br>";
    echo "depart of person: ".$this->depart;
    echo "<br>";
}
function setcontact($e,$p){
$this->Email=$e;
$this->phone=$p;
}
function getcontact(){
    echo "Email :".$this->Email;
    echo "<br>";
    echo "Phone:".$this->phone;
}
}
$myobj=new person("kamil",21);
$myobj->setInfo("Malik Ali",21,"Special Education");
$myobj->setcontact("kamil@gmail.com","03332523563");
$myobj->getInfo();
$myobj->getcontact();
?>