<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File input and output</title>
</head>
<body>
    <?php
    $filename=__DIR__."/myfile.txt";
    $file=fopen($filename,"r");
    if($file==false){
        echo "An error is facing during file opening";
        exit();
    }
    $filesize=filesize($filename);
    $filetxt=fread($file,$filesize);
    fclose($file);
    echo "size of file $filesize byte"."<br>";
    echo "the text of file is $filetxt";
    ?>
</body>
</html>