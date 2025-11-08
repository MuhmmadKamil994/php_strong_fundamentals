<?php
$x=5;
if($x%2==0){
if($x%3==0)
    echo "The number is divided by 2 and 3",PHP_EOL;

else
    echo "The number is divided by 2 but not 3".PHP_EOL;
}
elseif($x%3==0){
echo "The number is divided by 3 but not 2".PHP_EOL;
}
else
    echo "The number is  not divisible by 2 and 3".PHP_EOL;
$day=date("D");
switch ($day) {
    case 'Mon':
        echo "Today is monday".PHP_EOL;
        break;
        case 'Tues':
        echo "Today is tuesday".PHP_EOL;
        break;
        case 'Wed':
        echo "Today is wednesday".PHP_EOL;
        break;
        case 'Thur':
        echo "Today is thursday".PHP_EOL;
        break;
        case 'Fri':
        echo "Today is friday".PHP_EOL;
        break;
        case 'Sat':
        echo "Today is saturday".PHP_EOL;
        break;

       case 'Sun':
        echo "Today is sunday".PHP_EOL;
    
    default:
       echo "YOu have entered invalid day name ".PHP_EOL;
        break;
        
}
$country="germany";
$continent="Europe";

switch ($continent) {
    case 'Asia':
switch ($country) {
    case 'india':
        echo "The country is india".PHP_EOL;
        break;
    case 'pakistan':
        echo "The country is Pakistan".PHP_EOL;
        break;
        default:
        echo "The Country is not is Asia".PHP_EOL;
    }
    break;
    echo "\n";
    case "Europe":
switch ($country) {
    case 'germany':
        echo "The country is Germany".PHP_EOL;
        break;
    case 'Italy':
        echo "The country is Italy".PHP_EOL;
        break;
        default:
       echo "The country is not in Europe".PHP_EOL;
}
 break;
default:
echo "You entered invalid continent".PHP_EOL;
}
$n=7;
for($i=0;$i<$n;$i++){
    for($j=0;$j<=$i;$j++){
        echo " * ";
    }
    echo "\n";
}
 $twoD = array(
      array(1,2,3,4),
      array("one", "two", "three", "four"),
      array("one"=>1, "two"=>2, "three"=>3)
   );
   foreach($twoD as $idx=>$arr){
    echo "index no $idx  \n";
    foreach ($arr as $key => $value) {
        echo "$key => $value"."\n";
    } 
    echo "\n";
   }
      $line = "PHP is a popular general-purpose scripting language that is especially suited to web development.";
      $i=0;
      $size=strlen($line);
      $count=0;
      $vovles="aeiou";
      while ($i<= $size) {
        if(str_contains($vovles,$line[$i])){
$count++;
        }
       $i++;
      }
      echo "Number of Vovles: $count".PHP_EOL;

for($x=1;$x<=3;$x++){
    $y=1;
    while ($y <= 3) {
       $z=1;
        do{
            echo "x:$x   y:$y   z:$z \n";
if($z==2){
    break 2;
}
$z++;
   }while($z<=3);
        $z=1;
    $y++;
    }    
}
echo "Continue Statment!".PHP_EOL;
for($i=1;$i<=3;$i++){
    for($j=1;$j<=3;$j++){
        for($k=1;$k<=3;$k++){
            if($k>1){
                continue 2;
            }
           print "i: $i  j:$j  k:$k \n";  
        }
    }
}
?>