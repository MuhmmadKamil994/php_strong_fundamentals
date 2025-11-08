<?php
trait sayhello {
   public function printed() {
        echo "hello everyONe<br>";
    }
}
trait bye {
  public function printer() {
        echo "Ok goodbye everyone<br>";
    }
} 
trait second {
   public function printed() {
        echo "second function for trait with same name<br>";
    }
}

class person {
    use sayhello, bye, second {
        second::printed insteadOf sayhello;
        sayhello::printed as firstprinter;
    }
}

$myobj = new person();
$myobj->firstprinter(); 
$myobj->printed();       
$myobj->printer();       
?>
