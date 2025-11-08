<?php
// Problem:
// Create three classes to represent a multi-level inheritance hierarchy:
// Person (base class)
// Employee (child of Person)
// Manager (child of Employee)
// Each class should have its own constructor and method
// Person → initializes name and age
// Employee → adds employee ID and salary
// Manager → adds department and overrides displayInfo() to show all data
// Use parent::__construct() in each subclass properly to demonstrate constructor chaining.

use person as GlobalPerson;

class Person{
    public $name;
    public $age;
 public function __construct($name,$age) {
    $this->name=$name;
    $this->age=$age;
}
public function displayInfo(){
    echo "Name: $this->name,  age: $this->age".PHP_EOL;
}
}
class Employee extends Person{
   public $employee_Id;
   public $salary;
public function __construct($name,$age,$employee_Id,$salary)
{
    parent::__construct($name,$age);
$this->employee_Id=$employee_Id;
$this->salary=$salary;
}
public function displayInfo()
{
    parent::displayInfo();
    echo " EmployeeId : $this->employee_Id  Salary : $this->salary".PHP_EOL;
}
}
class Manager extends Employee{
    public $departments;
    public function __construct($name,$age,$employee_Id,$salary,$deparments)
    {
        parent::__construct($name,$age,$employee_Id,$salary);
      $this->departments=$deparments  ;
    }
  public function displayInfo()
  {
    parent::displayInfo();
    echo "Departments : $this->departments".PHP_EOL;
  }  
}
$obj1=new Manager("Malik Kamil",21,"45ji%3",450000,"Web Development");
$obj1->displayInfo();
$ojb2=new Person("Kamil",31);
$ojb2->displayInfo();
?>
<?php
// Create a system for vehicles where:
// You have an abstract class Vehicle that defines:
// Protected properties $brand and $speed
// Abstract method getFuelEfficiency()
// Concrete method displayInfo() that prints brand and speed
// Then create a class Car that extends Vehicle and implements an interface Maintenance.
// The Maintenance interface has a method serviceCost()
// Car implements both abstract and interface methods
// Car overrides displayInfo() but still calls parent::displayInfo()
// Finally, demonstrate polymorphism by using a Vehicle reference to call methods on a Car object.
interface Maintainance{
    public function costInfo();
}
abstract class Vehicle{
    protected $brand;
    protected $speed;
    public function __construct($brand,$speed)
    {
       $this->brand=$brand;
        $this->speed=$speed; 
    }
    abstract function getFuelEfficiency();
    public function displayInfo(){
        echo "The brand  $this->brand    has speed limit $this->speed \n";
    }
}

class Car extends Vehicle implements Maintainance{
    private $fuelEfficiency;
    public function __construct($brand,$speed,$fuelEfficiency)
    {
        parent::__construct($brand,$speed);
        $this->fuelEfficiency=$fuelEfficiency;
    }
public function costInfo()
{
    return 50000;
}
public function getFuelEfficiency()
{
    return  $this->fuelEfficiency;
}
public function displayInfo()
{
    parent::displayInfo();
    echo "fuel Efficiency: {$this->fuelEfficiency } km/1 \n ";
    echo "Service Cost: ₹ : {$this->costInfo()}";
}
}
$obj3=new Car("Honda",300,3);
$obj3->displayInfo();
?>
