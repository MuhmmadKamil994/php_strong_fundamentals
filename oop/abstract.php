<?php
abstract class animals{
   abstract protected function makesound();
   abstract protected function walkstyle();
   public function sleep(){
        echo "Every Animal can sleep!";
    }
}
    class dog extends animals{
public function makesound(){
    echo "dog sound is bark! bark!";
}
public function walkstyle(){
    echo "Dog can run fastly!";
}
    }
    class cat extends animals{
        public function makesound(){
    echo "cat sound is meow meow!";
}
public function walkstyle(){
    echo "Cat walk is quitely!";
}
    }
    $test =new dog();
    $test->walkstyle();
    echo "<br>";
    $test->makesound();
     echo "<br>";
    $test->sleep();
    echo "<br>";
    echo "<br>";
    $test2 =new cat();
    $test2->walkstyle();
    echo "<br>";
    $test2->makesound();
     echo "<br>";
    $test2->sleep();
?>
