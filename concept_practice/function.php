<?php
// =========================
// PHP FUNCTIONS — COMPLETE GUIDE (Basic → Advanced)
// =========================
declare(strict_types=1);
// 1️⃣ Basic function declaration
function sayHello() { // Function definition without parameters
    echo "Hello, World!";
}

// 2️⃣ Calling a function
sayHello(); // Outputs: Hello, World!

// 3️⃣ Function with parameters
function greet($name) { // Parameterized function
    echo "Hello, $name!";
}
greet("Kamil"); // Pass argument to function

// 4️⃣ Function with return value
function add($a, $b) { // Returns sum of two numbers
    return $a + $b;
}
echo add(5, 3); // Output: 8

// 5️⃣ Function with default parameters
function welcome($name = "Guest") { // Default parameter value
    return "Welcome, $name!";
}
echo welcome(); // Output: Welcome, Guest!



// 7️⃣ Passing arguments by reference
function increment(&$num) { // & means pass by reference
    $num++;
}
$x = 10;
increment($x); // Changes original variable
echo $x; // Output: 11

// 9️⃣ Anonymous function (function without name)
$greet = function($name) { // Assigned to variable
    return "Hi, $name!";
};
echo $greet("Kamil");

// 🔟 Arrow function (short syntax for anonymous function)
$square = fn($n) => $n * $n; // One-line closure (PHP 7.4+)
echo $square(5); // Output: 25

// 1️⃣1️⃣ Function returning a function (closure)
function makeMultiplier($factor) { 
    return function($n) use ($factor) { // use() imports outer variable
        return $n * $factor;
    };
}
$double = makeMultiplier(2);
echo $double(10); // Output: 20


// 1️⃣3️⃣ Static variables inside function
function counter() {
    static $count = 0; // Static retains value across calls
    return ++$count;
}
echo counter(); // 1
echo counter(); // 2

// 1️⃣4️⃣ Function as callback (higher-order)
function processArray($arr, $callback) { // Takes function as parameter
    return array_map($callback, $arr);
}
print_r(processArray([1, 2, 3], fn($x) => $x * 2)); // Doubles all numbers

// 1️⃣5️⃣ Anonymous recursive function (self-referencing)
$recursiveSum = function($arr) use (&$recursiveSum) { 
    if (empty($arr)) return 0;
    return array_shift($arr) + $recursiveSum($arr); // Calls itself
};
echo $recursiveSum([1,2,3,4]); // Output: 10

// 1️⃣6️⃣ Named arguments (PHP 8+)
function createUser(string $name, int $age, string $role = "User") {
    return "$name ($role, $age)";
}
echo createUser(role: "Admin", age: 30, name: "Kamil"); // Order-independent

// 1️⃣7️⃣ Functions with union types (PHP 8+)
function formatData(int|string $data): string { // Accepts int OR string
    return "Data: " . $data;
}
echo formatData(123);

// 1️⃣8️⃣ Nullable return types
function maybeDivide(float $a, float $b): ?float { // ? means may return null
    return $b == 0 ? null : $a / $b;
}
echo maybeDivide(10, 2); // 5

// 1️⃣9️⃣ Function inside a class (method)
class Calculator {
    public function add($a, $b) { return $a + $b; }
}
$calc = new Calculator();
echo $calc->add(10, 20);

// 2️⃣0️⃣ Variable functions (dynamic function calls)
function sayBye() { return "Goodbye!"; }
$funcName = "sayBye";
echo $funcName(); // Dynamically calls sayBye()

// 2️⃣1️⃣ Arrow functions with array_filter()
$numbers = [1, 2, 3, 4, 5];
$even = array_filter($numbers, fn($n) => $n % 2 === 0); // Short callback
print_r($even);

// 2️⃣2️⃣ Function with Generator (yield)
function generateNumbers($limit) {
    for ($i = 1; $i <= $limit; $i++) {
        yield $i; // Returns iterator values lazily
    }
}
foreach (generateNumbers(5) as $num) echo $num . " "; // Output: 1 2 3 4 5

// 2️⃣3️⃣ Anonymous functions in arrays
$operations = [
    'add' => fn($a, $b) => $a + $b,
    'sub' => fn($a, $b) => $a - $b
];
echo $operations['add'](5, 3); // Output: 8

// 2️⃣4️⃣ Using closures with array_walk()
$names = ['kamil', 'ali', 'zain'];
array_walk($names, function(&$n) { $n = ucfirst($n); }); // Modify in place
print_r($names);

// 2️⃣5️⃣ Function scope and global variable
$globalVar = 100;
function showGlobal() {
    global $globalVar; // Access global variable inside function
    echo $globalVar;
}
showGlobal(); // Output: 100

// =========================
// END OF FUNCTION CONCEPTS
// =========================
?>

<?php

function factorial($n): int{
    if($n<0){
        throw new InvalidArgumentException("number must be non-negative");  
    }
    if($n===0||$n===1){
        return 1;
    }
    return $n*factorial($n-1);
}
try {
    echo factorial(6);
} catch (InvalidArgumentException $e) {
    echo "Error" .$e->getMessage();
}
?>
<?php
echo "<br>";
function palindrome(string $str):bool{
    $cleaned=strtolower(preg_replace("/[^A-Za-z0-9]/","",$str));
    return ($cleaned===strrev($cleaned));
}
var_dump(palindrome("A man, a plan, a canal, Panama!"));
echo "<br>";
var_dump(palindrome("hello mister"));
?>
<?php
echo "<br>";

function sumAll(...$number):float{
    $sum=0.0;
    foreach($number as $num){
if(is_numeric($num)){
$sum+=(float)$num;
}

}
return $sum;
}
echo sumAll(5,4,7,"malik kamil",'eree',454,234);
?>
<?php
echo "<br>";

function applyOperatin(array $number,callable $operation):array{
    $result=[];
foreach ($number as  $num) {
$result[]=$operation($num);

}
return $result;
}

$sqr=applyOperatin([1,3,6,5,7,6,8,6],fn ($n)=>$n*$n);
print_r($sqr);

?>
<?php
echo "<br>";
function multiplier($number){
  return  function($num) use ($number){
        return $number*$num;
    };
}
$mutiply=multiplier(5);
echo $mutiply(6);
?>
<?php
echo "<br>";
function fibonacci(int $n):array{
    if($n<=0) return [];
    if($n==1) return [0];
    if($n==2) return [0,1];
    $prev=fibonacci($n-1);
    $next = $prev[$n-2]+$prev[$n-3];
    $prev[]=$next;
    return $prev;
}
print_r(fibonacci(20))
?>
<?php
echo "<br>";
function incrementvalue(array &$number, int $num=1):void{
    foreach($number as &$value){
        $value+=$num;
    }
    unset($value);
}
$array=[3,5,4,7,8,2,7];
incrementvalue($array,4);
print_r($array);
?>