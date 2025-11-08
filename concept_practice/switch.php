<?php
$age=23;
switch ($age) {
    case ($age>=0&&$age<=12):
        echo "child";
        break;
    case ($age>=13&&$age<=19):
        echo "teenager";
        break;
         case ($age>=20&&$age<=59):
        echo "Adults";
        break;
         case ($age>=60):
        echo "senior";
        break;
    default:
        echo "Invalid age";
        break;
}
?>
<?php
function numberchecker($numbers){
    if(empty($numbers)){
echo "array is empty";
    }
    foreach ($numbers as $num) {
        if($num<0){
            return "array contain negative number";
        }
        if($num===0){
            return "array contain zeros";
        }

    }
    return "contain positive numbers";
}
echo "<br>";
echo numberchecker([1,3,5,36,45]);
echo "<br>";
echo numberchecker([-3,-34,3,4,2,45]);
echo "<br>";
echo numberchecker([7,4,0,4,36]);
echo "<br>";
echo numberchecker([]);

?>
<?php
// Create a PHP script for a shopping cart discount system.
// If the total purchase amount is > 5000 → apply 20% discount.
// If the total is between 3000 and 5000 → apply 10% discount.
// If the customer is a “VIP” → apply an additional 5% discount on top of other discounts.
// Print the final price after all applicable discounts.
// Focus: Multiple nested conditions, combination of logical operators, real-world decision-making.

$totalpur=4600;
$discount=0;
$Vip=true;
if($totalpur>5000){
    $discount=10;
}
elseif($totalpur>=3000 && $totalpur<=5000){
    $discount=20;
}
else{
    $discount=0;
}
if($Vip){
    $discount +=5;
}
$finalprice=$totalpur-($totalpur * $discount/100);
echo "<br>";
echo "<br>";
echo "The totol price is $totalpur"."<br>";
echo "the discount apply is $discount"."<br>";;
echo "The final price of purchasing with discount is $finalprice"."<br>";;
?>
