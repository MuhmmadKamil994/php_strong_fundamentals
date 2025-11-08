<?php
// Datatypes 
// int,boolean,double,float,string,null,object,array
$fname="Muhammad"; //str
$lname="Ali"; //str
 $edu="Bs IT"; //str 
$account=34.343; //double
$age=21; //int
$male=true; //bolean
$$fname="Ahmad";
echo "<h1> $fname, $lname, $age, $edu,  $$fname, $male</h1>";
// null 
$x=null;
// array 
$fruits=["apple","banana","grapes","gova"];
echo $fruits[2];
echo $fruits[1];
echo "<pre>";
print_r($fruits);
echo "<pre>";
// type casting
print var_dump($fname);
print var_dump($lname);
print var_dump($age);
print var_dump($account);
echo var_dump($male);
echo var_dump($x);