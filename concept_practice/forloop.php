
<!-- 1. Fibonacci Sequence Generator (Optimized Iteration)
   Question:
   Write a PHP program using a `for` loop to generate and print the first 15 Fibonacci numbers (starting from 0 and 1). Output should be in one line, separated by commas.
2. Multiplication Table Matrix (Nested Loops)
Question:
Use nested `for` loops to print a 10x10 multiplication table in a grid format. Each row and column should be aligned neatly using `printf()` or string padding.

3. Prime Numbers Between 1–500 (Efficient Check)
Question:
Use a `for` loop to find and print all prime numbers between 1 and 500. Make sure your algorithm skips unnecessary checks for efficiency (e.g., loop up to `sqrt($n)` only).
4. Loop Control Mastery — Skip & Break Conditions
Question:
Write a `for` loop that counts from 1 to 100.

* Skip all numbers divisible by 5 using `continue`.
* Stop the loop entirely when the counter reaches a number that’s both divisible by 7 and 9.
* Print all numbers processed.

5. Pattern Printing with Algorithmic Twist (Dynamic Pyramid)
Question:
Use a `for` loop to print a pyramid pattern of stars (*), but dynamically based on a given number of rows (e.g., $rows = 5). Each row should be centered properly (like a triangle).
Example for $rows = 5:

Question:
Write a single `for` loop (no arrays) that prints the first 10 even numbers in reverse order, but without using division or modulo operators (% or /).
Focus: Mathematical manipulation, logical increment/decrement, and creative thinking. -->


<?php
$n=15;
$a=0;
$b=1;
for($i=0; $i<$n; $i++){
echo $a;
if($i<($n-1)){
    echo ",";
}
$next=$a+$b;
$a=$b;
$b=$next;
} 
?>
<?php
echo "
<style>
    table {
        border-collapse: collapse;
        margin: 30px auto;
        font-family: Arial, sans-serif;
        font-size: 16px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px 15px;
        text-align: center;
        min-width: 50px;
    }
    th {
        background: #007BFF;
        color: #fff;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background: #f8f9fa;
    }
    tr:hover {
        background: #e9f5ff;
        transition: background 0.3s ease;
    }
    caption {
        caption-side: top;
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }
</style>
";

echo "<table>";
echo "<caption>10 × 10 Multiplication Table</caption>";

echo "<tr><th>*</th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";


for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>";
    for ($j = 1; $j <= 10; $j++) { 
        echo "<td>" . ($i * $j) . "</td>"; 
    }
    echo "</tr>";
}

echo "</table>";
?>
<?php
$count=0;

for($n=2;$n<=500;$n++){
$isprime=true;
for($i=2;$i<=sqrt($n);$i++){
    if($n%$i==0){
        $isprime=false;
        break;
    }
}
if($isprime){
    echo $n." ,";
    $count++;
}

}

echo "<br><br>Total prime numbers between 1 and 500: " . $count;
?>
<?php
echo "<br>";
for($number=1;$number<=100;$number++){
    if($number%7===0&&$number%9===0){
        break;
    }
    if($number%5===0){
        continue;
    }
    echo $number." ";
}
?>
<?php
echo "<br>";
$row=9;
for ($i=1; $i <=$row ; $i++) { 
    for ($j=1; $j <=$row-$i; $j++) { 
        echo " ";
    }
     for ($k=1; $k <=(2*$i-1) ; $k++) { 
            echo "*";
        }
    echo "<br>";
    
}
?>
<?php
for ($number=20; $number >=2 ; $number-=2) { 
    echo $number." ";
}
?>