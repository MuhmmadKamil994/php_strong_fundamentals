<?php
function &refFunction(){
    static $x=10;
    echo "value of x inside funciton $x \n";
    return $x;
}
$a=&refFunction();
echo "value x outside the function $a \n";
$a=$a+10;
$a=&refFunction();

function percent($p,$c,$m,$total=300){
    $result=($p+$c+$m) * 100/$total;
    echo "marks obtained :";
    echo "'Physics':$p  'Chemistry': $c    'Math': $m". ' with percentage = '. $result."\n";
}
percent(45,64,23);
function average(...$number){
$result=array_sum($number)/count($number);
return $result;
}
$avg=average(4,6,43,6,7,3,5,7);
echo "The total average of nubmers is:  $avg".PHP_EOL;
function square($number){
return $number*$number;
}
$arr=[1,3,5,6,7,3,7,8];
foreach ($arr as $a) {
   echo "The sqaure of $a  : ".call_user_func("square",$a).PHP_EOL ;
}
function myfunction($function , $number){
$result=$function($number);
return  $result;
}
function cube($number){
return $number**3;
}
function squar($number){
    return $number**2;
}
$x=6;
echo myfunction("cube",$x).PHP_EOL;
echo myfunction("squar",$x).PHP_EOL;
function factorial($n){
    if($n==1){
        echo $n.PHP_EOL;
        return 1;
    }
else{
    echo "$n*";
   return  $n*factorial($n-1);
}
}
echo "factorial of number :" .factorial(7).PHP_EOL;
function fbreach($mylist,$low,$high,$elem){
    if($high>=$low){
        $mid=intval($high+$low)/2;
    }
    if($mylist[$mid]===$elem){
        return $mid;
    }
    elseif($mylist[$mid]>$elem){
return fbreach($mylist,$low,$low-1,$elem);
    }
    else{
        return fbreach($mylist,$low+1,$high,$elem);
    }
    return -1;
}
$list=[4,6,7,3,7,78,456,6,7,83,6];
$num=456;
$result=fbreach($list,0,count($list)-1,$num);
if($result!=-1){
    echo "The $num is at index : ".$result.PHP_EOL;
}
else{
    echo "The number is not found.".PHP_EOL;
}
$maxmarks=300;
$percentage=function($marks) use ( $maxmarks){
    return $marks/$maxmarks*100;
};
$m=200;
echo "Number : $m  with percentage is : ".$percentage($m);
$arr=[4,6,3,6,7,3,8,6,10,42];
$evennumber=array_filter($arr,fn($n)=>$n%2==0);
foreach($arr as $num)
echo $num.PHP_EOL;
echo "This is sorting in Accending order";
$Num=[3,56,75,4,8,43,8,9,92,34];
usort($Num,fn($x,$y)=>$x>$y);
foreach ($Num as $value) {
 echo $value.PHP_EOL;
}
?>