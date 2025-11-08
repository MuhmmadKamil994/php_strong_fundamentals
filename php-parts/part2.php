<?php
$arr1=["kamil",21,3.46,"IT","Rajanpur"];
var_dump($arr1);
for($i=0;$i<count($arr1);$i++){
echo "numbers[$i]:$arr1[$i]".PHP_EOL;
}
echo "while Loop";
$i=count($arr1)-1;
while ($i>=0) {
echo "numbers[$i]: $arr1[$i]".PHP_EOL;
$i--;
}

$size=count($arr1);
for($i=0;$i<$size;$i++){
    $arr2[$size-$i-1]=$arr1[$i];
}
for($i=0;$i<$size;$i++){
echo "arr1[$i] = $$arr1[$i], arr2[$i] = $$arr2[$i]".PHP_EOL;
}

foreach($arr1 as $value){
    echo "$value \n";
}
$capitals = array(
    "USA" => "Washington D.C.",
    "France" => "Paris",
    "Japan" => "Tokyo"
);
foreach ($capitals as $key => $value) {
   echo "The country $key has  capital $value. \n";
}
$key=array_keys($capitals);

for($i=0;$i<count($key);$i++){
    $cap=$key[$i];
    echo "The country $cap  has  capital $capitals[$cap]  \n";
}
// Multi dimensional array
$arr = [
   "row1" => ["key11" => "val11", "key12" => "val12", "key13" => "val13"],
   "row2" => ["key21" => "val21", "key22" => "val22", "key23" => "val23"],
   "row3" => ["key31" => "val31", "key32" => "val32", "key33" => "val33"]
];
foreach ($arr as $rk => $rv) {
    echo "$rk\n";
    foreach ($rv as $key => $value) {
       echo "$key=>$value ";
    }
    echo "\n";
}
$arr3D = [ 
      [[1, 0, 9],[0, 5, 6],[1, 0, 3]],
      [[0, 4, 6],[0, 0, 1],[1, 2, 7]],
   ];
foreach ($arr3D as $row) {
   foreach ($row as $elem) {
   foreach ($elem as  $value) {
    echo $value ." ";
   }
   echo "\n";
   }
   echo "\n";
};
define('NAME',[
    "Kamil",21,"Karachi","bhawalpur"
]);
print_r(NAME);

?>