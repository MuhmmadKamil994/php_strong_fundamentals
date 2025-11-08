<?php
for($i=1;$i<=3;$i++){
    for($j=1;$j<=3;$j++){
        for($k=1;$k<=3;$k++){
            if($k>1){
                continue 2;
            }
           print "i: $i  j:$j  k:$k \n";  
        }
    }}
