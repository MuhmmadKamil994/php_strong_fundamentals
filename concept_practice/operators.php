<?php

// ====================================================
// PHP Advanced Operators Practice Questions
// ====================================================

// ------------------------
// 1. Arithmetic Operators
// ------------------------

// Q1: a^b + b^a modulo (a+b)
// Q2: Sum of squares of n and n+1 divided by their product
// Q3: Last digit of 12345^6789 using arithmetic operators only


// ------------------------
// 2. Comparison Operators
// ------------------------

// Q1: $x = "10"; $y = 10; Write conditions using ==, ===, !=
// Q2: Sort array using spaceship operator in descending order
// $arr = [3, "2", 5, "10", 1];
// Q3: Compare mixed-type variables and return type-strict comparison message


// ------------------------
// 3. Logical Operators
// ------------------------

// Q1: $a = true; $b = false; $c = false; Evaluate: ($a xor $b && !$c) ? "YES" : "NO"
// Q2: Conditional to print "Valid" if $n > 0 and divisible by 3 or 5 but not both
// Q3: Check if $var is set, not empty, and numeric in one line without multiple isset()


// ------------------------
// 4. Assignment Operators
// ------------------------

// Q1: Starting $x = 5, multiply by 2, add 10, subtract 3, divide by 4 using compound assignment operators
// Q2: Swap $a and $b without a third variable using assignment operators
// Q3: Chain assignments on $score = 100 (add 50, multiply 2, modulo 7, subtract 3)


// ------------------------
// 5. String Operators
// ------------------------

// Q1: Concatenate first 5 letters of $s = "Programming" with last 3 letters in reverse using . or .=
// Q2: Append numbers 1 to 5 as a single string using .= in a loop
// Q3: Combine "PHP" and "7.5" to create "PHP-7.5" using only . or .=


// ------------------------
// 6. Array Operators
// ------------------------

// Q1: Merge $a1 = ["a" => 1, "b" => 2]; $a2 = ["b" => 3, "c" => 4]; using + and explain missing elements
// Q2: Check if two arrays with same elements but different order are ===
// Q3: Find elements in one array but not in another using only array operators


// ------------------------
// 7. Conditional (Ternary Operators)
// ------------------------

// Q1: Rewrite nested if-else as single ternary for grading system
// Q2: Nested ternary to check if string is empty or equals "PHP"
// Q3: Evaluate tricky expression: $result = false ?: true ?: false; echo $result;


// Arithmatic questions 
$a=7;
$b=5;
$x=(pow($a,$b)+pow($b,$a))%($a+$b);
echo $x;
$n=5;
$y=(($n**2)+($n+1)**2)/(($n)*($n+1));
echo $y;
$base=12345;
$exponent=6789;
$lastdigit=$base%10;
echo $lastdigit;
// Comparison operators 
$a="10";
$y=10;
if($a==$y){
    echo "a is equal  to y comparison";
}
else if($a===$y){
    echo "a is equal to y";
}
else if($a!=$y){
    echo "a is not equal to y";
}

?>