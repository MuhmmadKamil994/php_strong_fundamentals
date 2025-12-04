<?php
// PHP arrays are ordered maps storing key-value pairs; can act as 
// lists, dictionaries, or hash tables
// Types: Indexed ([1,2,3]), Associative (['id'=>1]),
//  Multidimensional ([['id'=>1]]), Hybrid ([0=>'A','key'=>'B'])
// Creation: $arr=['apple','banana']; Access: $arr[1]; Append: $arr[]='date'; Remove: array_pop($arr)/array_shift($arr)
// Associative: $user=['name'=>'Kamil']; Modify: $user['role']='Lead'; Remove: unset($user['name'])
// Core functions: array_map(), array_filter(), array_reduce(), array_walk() for transformation
// Extraction: array_column(), array_combine(), array_merge(), array_replace() for combining and restructuring
// Searching: in_array(), array_key_exists(), array_search() for value/key lookup
// Sorting: sort()/asort()/ksort()/usort() for indexed/assoc/custom sorting
// Multidimensional arrays: foreach($arr as $sub){} for nested processing (e.g., employees by dept)
// Recursive manipulation: function flatten($arr){foreach($arr as $v){is_array($v)?flatten($v):$result[]=$v;}} for deep arrays
// Closures: array_filter($products, fn($p)=>$p['price']>1000) for inline filtering
// Functional pipelines: array_reduce(array_filter(...), fn($sum,$p)=>$sum+$p['price'],0) for professional data processing
// Performance tips: foreach faster than array_map(), avoid array_merge() in loops, use generators yield for large datasets
// Real-world example: Group orders by customer using $result[$order['customer']]=($result[$order['customer']]??0)+$order['amount']
// Deep comparison: recursiveDiff($a,$b) returns differences in nested arrays
// Arrays in OOP: (object)$arr, or typed arrays/classes for collections (UserCollection class example)
// Mastery: Combine transformations, recursion, functional pipelines, memory optimization, and professional data manipulation
?>
<?php
// ====================== Creation ======================
$indexed = [1,2,3]; // Indexed array
$assoc = ['name'=>'Kamil','role'=>'Developer']; // Associative array
$multi = [['id'=>1],['id'=>2]]; // Multidimensional array

// ====================== Adding / Removing ======================
$arr = [1,2,3];
$arr[] = 4; // Append
array_push($arr,5); // Append
array_unshift($arr,0); // Add at start
array_pop($arr); // Remove last
array_shift($arr); // Remove first
unset($arr[1]); // Remove by key

// ====================== Access ======================
echo $arr[0]; // Indexed
echo $assoc['name']; // Associative

// ====================== Array Info ======================
count($arr); // Length
empty($arr); // True if empty
in_array(2,$arr); // Check value exists
array_key_exists('name',$assoc); // Check key exists
array_keys($assoc); // Get all keys
array_values($assoc); // Get all values
array_flip($assoc); // Swap keys and values

// ====================== Sorting ======================
$nums = [3,1,2];
sort($nums); // Ascending
rsort($nums); // Descending
asort($assoc); // By value ascending (assoc)
arsort($assoc); // By value descending (assoc)
ksort($assoc); // By key ascending
krsort($assoc); // By key descending
usort($multi, fn($a,$b)=>$a['id']<=>$b['id']); // Custom sort

// ====================== Transformation ======================
$squared = array_map(fn($n)=>$n*$n,$nums); // Apply function
$filtered = array_filter($nums, fn($n)=>$n>1); // Filter
$sum = array_reduce($nums, fn($carry,$n)=>$carry+$n,0); // Reduce/accumulate
array_walk($nums, fn(&$n)=>$n*2); // Modify in-place

// ====================== Merge / Combine ======================
$arr1 = ['a','b']; $arr2=['c','d'];
$merged = array_merge($arr1,$arr2); // Merge
$combined = array_combine(['x','y'],$arr2); // Keys and values
array_replace($arr1,['a'=>'z']); // Replace by key

// ====================== Search ======================
$key = array_search('b',$arr1); // Get key of value
$exists = in_array('c',$arr2); // Value exists
$existsKey = array_key_exists('x',$combined); // Key exists

// ====================== Slicing / Splicing ======================
$nums = [1,2,3,4,5];
$slice = array_slice($nums,1,3); // Get portion
array_splice($nums,2,2,[8,9]); // Replace portion

// ====================== Randomization ======================
shuffle($nums); // Random order
$randKey = array_rand($nums); // Random key
$randVal = $nums[$randKey]; // Random value

// ====================== Utilities ======================
implode(',', $nums); // Array to string
explode(',', 'a,b,c'); // String to array
array_fill(0,5,'X'); // Fill array with values
range(1,5); // Generate sequence

// ====================== Multidimensional / Deep ======================
$multi = [['id'=>1,'name'=>'A'],['id'=>2,'name'=>'B']];
array_column($multi,'name'); // Extract single column
array_multisort(array_column($multi,'id'),SORT_ASC,$multi); // Sort multidimensional

// ====================== Difference / Intersection ======================
$a = [1,2,3]; $b=[2,3,4];
array_diff($a,$b); // [1]
array_intersect($a,$b); // [2,3]
array_udiff($multi,[['id'=>2]],fn($x,$y)=>$x['id']-$y['id']); // Custom diff

// ====================== Flatten recursively ======================
function flatten($arr){
    $res = [];
    foreach($arr as $v){
        $res = array_merge($res,is_array($v)?flatten($v):[$v]);
    }
    return $res;
}


// ====================== Example Run ======================
print_r($nums);
print_r($squared);
print_r($filtered);
print_r($combined);
print_r($multi);
echo "<br>";
print_r(flatten([]))
?>
<?php
echo "<br>";
echo "<br>";
echo "<br>";
$one=[3,5,6,3,78,9];
$two=[64,454];
$arr=[2,6,7,3];
$walker=array_walk($arr,fn(&$num)=>$num*2);
$sum=array_reduce($arr,fn($value,$n)=>$value+$n,0);
$merger=array_merge($one,$two);
echo "<br>";
print_r($walker);
echo "<br>";
print_r($merger);
echo "<br>";
echo $sum;
echo "<br>";
$nums = [1,2,3,4,5];
$slice = array_slice($nums,1,3); // Get portion
$splice=array_splice($nums,2,2,[8,9]); 
print_r($slice);
echo "<br>";
print_r($splice);
echo "<br>";echo "<br>";
echo "<pre>";
print_r($nums);
echo "<pre>";
?>
<?php
echo "<br>";
$products = [
  ['id' => 1, 'name' => 'Laptop', 'price' => 1200],
  ['id' => 2, 'name' => 'Phone', 'price' => 800],
  ['id' => 3, 'name' => 'Tablet', 'price' => 600]
];
function market(array $products):array{
    $result=[];
    foreach($products as $product){
$result[$product['name']]=$product['price'];
    }
    return $result;
}
echo "<pre>";
print_r(market($products))."<br>";
echo "</pre>";
?>
<?php
echo "<br>";
$employees = [
  ['name' => 'Kamil', 'age' => 30, 'salary' => 40000],
  ['name' => 'Aisha', 'age' => 25, 'salary' => 50000],
  ['name' => 'Bilal', 'age' => 35, 'salary' => 45000]
];
usort($employees,function($a,$b){
    if($a['salary']!==$b['salary']){
        return $b['salary']<=>$a['salary'];
    }
    
    return $a['age']<=>$b['age'];
    echo "<br>";
});
echo "<pre>";
print_r($employees);
echo "</pre>";
?>
<?php
echo "<br>";
$systemA = [
  ['name' => 'Kamil', 'email' => 'kamil@example.com'],
  ['name' => 'Aisha', 'email' => 'aisha@example.com'],
  ['name' => 'Bilal', 'email' => 'bilal@example.com']
];

$systemB = [
  ['name' => 'Aisha', 'email' => 'aisha@example.com'],
  ['name' => 'Sara', 'email' => 'sara@example.com']
];
function missinguser(array $a,array $b):array{
    return array_udiff($a,$b ,function ($userA,$userB){
        return strcmp($userA['email'],$userB['email']);
    });
}
echo "<pre>";
print_r(missinguser($systemA,$systemB));
echo "</pre>";
?>
<?php
echo "<br>";
$transactions = [
  ['user' => 'Ali', 'amount' => 200],
  ['user' => 'Sara', 'amount' => 350],
  ['user' => 'ahamad', 'amount' => 400],
  ['user' => 'Ali', 'amount' => 334530],
  ['user' => 'muhammad', 'amount' => 40460],
  ['user' => 'sajan', 'amount' => 6770]

];
function calc(array $transactions):array{
    $total=[];
    foreach($transactions as $t){
$user=$t['user'];
$amount=$t['amount'];
if(!isset($total[$user])){
     $total[$user]=0;
};
 $total[$user] +=$amount;
    }
    return $total;
}
echo "<pre>";
print_r(calc($transactions));
echo "</pre>";
?>