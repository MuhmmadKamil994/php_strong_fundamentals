<?php
$name="Malik Kamil";
$age=21;
$city="Rajanpur";
echo "$name is a student aged $age living in $city"."\n";
$price="100";
$tax=0.15;
$totalcost=(int)$price+$tax;
echo var_dump($totalcost);
$varName="fruit";
$$varName="mango";
echo $fruit."\n";
$a=5;
$b=&$a;
$a=10;
echo $a."\n";
echo $b."\n";

function counter(){
  static $a=1;
  return $a++;
}
echo counter();
echo counter();
echo counter();

?>
