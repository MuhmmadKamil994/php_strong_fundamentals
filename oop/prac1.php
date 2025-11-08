<?php
class calculation{
    public $a,$b,$c;
    function sum(){
        $this->c=$this->a+$this->b;
        return $this->c;
    }
     function sub(){
        $this->c=$this->a-$this->b;
        return $this->c;
    }
    }
    $c1=new calculation();
    $c1->a=45;
    $c1->b=45;
   $c2=new calculation();
 $c2->a=78;
 $c2->b=45;
echo "sum of two number :".$c1->sum()."\n";
echo "subtraction of two number :".$c2->sub()."\n";
echo "subtraction of two number :".$c1->sub();

?>