<?php
// Create a class BankAccount that uses private properties for balance and accountNumber.
// Use a public constructor to set initial values.
// Implement getter and setter methods to access and update the balance safely (ensure it cannot go below zero).
// Demonstrate how encapsulation prevents direct modification.
class bankAccount{
   private $balance;
  private  $acountNumber;
  public function __construct($acountNumber,$balance)
  {
    $this->balance=$balance;
    $this->acountNumber=$acountNumber;
  }
  public function getAccount(){
    return $this->acountNumber;
  }
  public function getballance(){
    return $this->balance;
  }
  public function setballance($amount){
    if($amount>=0){
        echo "The amount is ".$this->balance=$amount;
    }
    else
        echo "The ballance is below Zero";
  }
}
$account= new bankAccount("abceda",1500);
// echo $account->setballance(45000);
echo "this is account number  " .$account->getAccount();
echo " with this amount  ".$account->getballance().PHP_EOL;
?>
<?php
// Create a base class Employee with a protected property $salary.
// Then create a derived class Manager that:
// Increases salary by 20% in its own method using the protected property.
// Has a public method showSalary() to display it.
class Bank{
protected $salary;
public function __construct($salary)
{
    $this->salary=$salary;
}
}
class manager extends  Bank{
public function salarymake(){
return $this->salary*=1.2;
}
public function getsalary(){
    echo "The salary of employee is  ".$this->salary.PHP_EOL;
}
}
$obj=new manager(45000);
$obj->salarymake();
$obj->getsalary();
?>
<?php
// Problem:
// Create an abstract class Shape with:
// A protected property $color.
// A private property $area.
// A protected method setArea($area) to safely assign $area.
// Then create a subclass Circle that computes area and shows both area and color.
abstract class Shape{
    protected $color;
    private $area;
    public function __construct($color)
    {
        $this->color=$color;
    }
    protected function setArea($area){
 $this->area=$area;
    }
    protected function getArea(){
        return $this->area;
    }
    abstract public function calculateArea() ;
}
class Circle extends Shape{
private $radius;
public function __construct($color,$radius)
{
    parent::__construct($color);
    $this->radius=$radius;
}
public function calculateArea()
{
    $area=pi()*pow($this->radius,2);
 $this->setArea($area);
}
public function showdetails(){
    echo "Color : ".$this->color."  \n Area : ".$this->getArea();
}
}
$object=new Circle('blue',8);
$object->calculateArea();
$object->showdetails();
?>
<?php

?>