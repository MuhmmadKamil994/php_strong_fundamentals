<?php
class encapsulate{
    public $amount;
   public function __construct($amount){
    $this->amount=$amount;
   }
   public function process(){
echo "processing".$this->amount."transaction";
   }
}
$myobj=new encapsulate(34);
$myobj->process();
?>