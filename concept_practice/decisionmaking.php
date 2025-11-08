<?php
$score=90;
if($score>=0&&$score<=100){
    if($score>=90&&$score<=100){
        echo "student score is A grade";
        if($score%5==0){
            echo "-Excellent";
        }
    }
    elseif($score>=80){
        echo "student score is B grade";
    }
    elseif($score>=70){
        echo "student score is C grade";
    }
    elseif($score>=60){
        echo "student score is D grade";
    }
 else{
    echo "Student is fail";
 }
}

else{
    echo "Please Enter valid number";
}
$a=5;
$b=6;
$c=7;
echo ($a > $b) ? (($a > $c ) ? $a : $c) : (($b > $c) ? $b : $c);
echo max($a,$b,$c);
?>
