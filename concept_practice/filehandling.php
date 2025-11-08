<?php 
$file=fopen("myfile.txt","a");
if($file){
    echo "file is open successfully";
    fwrite($file,"new line is added to file");
    fclose($file);
    echo "file data is added";
}else{
    echo "file is not opening";
}

?>