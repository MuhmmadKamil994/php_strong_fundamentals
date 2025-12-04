<?php
/*
===========================================
   PHP ADVANCED WHILE & DO-WHILE QUESTIONS
===========================================

💡 Each problem focuses on real-world logic, loop mastery, and mathematical thinking.
   Try solving each before checking any online hints!

-------------------------------------------
1️⃣ HARD — Reverse Digits of a Number
-------------------------------------------
Write a PHP script using a while loop to reverse the digits of an integer number.
Example:
    Input: 12345
    Output: 54321

Focus:
- Use modulo (%) and integer division.
- Handle negative numbers as well.

-------------------------------------------
2️⃣ HARD to ADVANCED — Sum of Factorials
-------------------------------------------
Using a while loop, calculate the sum of factorials from 1! to 10!.
That means: 1! + 2! + 3! + … + 10! = ?

Focus:
- Use nested loops or incremental multiplication.
- Avoid using built-in functions.
- Be careful with large numbers.

-------------------------------------------
3️⃣ ADVANCED — Number Guessing Game
-------------------------------------------
Create a number guessing game using a do-while loop:
- Randomly generate a number between 1 and 100.
- Ask the user for input repeatedly until they guess the correct number.
- Display:
      “Too high” if guess > number
      “Too low” if guess < number
      “Correct!” when matched.

Focus:
- Using do-while for guaranteed first iteration.
- Handling user input with readline().

-------------------------------------------
4️⃣ VERY ADVANCED — Detect Repeated Digits
-------------------------------------------
Write a while loop that checks if an integer contains any repeated digits.
Example:
    12345 → No repeats
    11234 → Repeats found

Focus:
- Extract digits using modulo.
- Compare previously seen digits.
- Avoid arrays if possible (use math or string logic).

-------------------------------------------
5️⃣ VERY ADVANCED — Prime Factorization
-------------------------------------------
Use a do-while loop to find and print all prime factors of a given integer.
Example:
    Input: 60
    Output: 2, 2, 3, 5

Example:
    Input: 97
    Output: 97

Focus:
- Nested loops for dividing by prime numbers.
- Stop when quotient becomes 1.
- Optimize for large numbers.

-------------------------------------------
🔥 BONUS CHALLENGE (Optional)
-------------------------------------------
Write a PHP program using a do-while loop that prints all numbers between 1–200
that are both even and divisible by 3, but skip any number ending with digit 6.

-------------------------------------------
💻 Tip:
You can test each question in the same file by commenting/uncommenting code sections.
===========================================
*/
?>

<?php
$i=5;
while($i>=0){
    echo $i." ";
    $i--;
}
?>
<?php
echo "<br>";
$sum=0;
$factorial=1;
$i=1;
while($i<=10){
   $factorial*=$i;
   echo $factorial." ";
   $sum+=$factorial;

    $i++;
}
echo "<br>";
echo "The total sum of  all factorial number is :$sum";
?>

<?php
// Generate a random number between 1 and 10
// Store it in a session so it doesn't change on every page reload
session_start();
if (!isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = rand(1, 10);
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userGuess = (int)$_POST['guess'];

    if ($userGuess === $_SESSION['randomNumber']) {
        $message = "🎉 Congratulations! You guessed it right. The number was {$_SESSION['randomNumber']}.";
        
        unset($_SESSION['randomNumber']);
    }
    else {
        $message = "❌ Sorry, you guessed {$userGuess}. Try again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Number Guessing Game</title>
</head>
<body>
    <h1>Guess a number between 1 and 10</h1>
    <form method="post">
        <input type="number" name="guess" min="1" max="10" required>
        <button type="submit">Guess</button>
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
<?php
$num=4589;
$orignal=$num;
$divisor=2;
echo "factor of $orignal are : ";
do {
    if($num%$divisor===0){
        echo $divisor. " ";
        $num/=$divisor;
    }
    else{
        $divisor++;
    }
} while ($num>1);
?>