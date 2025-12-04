<?php
// Problem:
// Create a PHP class DatabaseConnection that uses a constructor to initialize a connection to a MySQL database using PDO.
//  The class should accept host, database name, username, and password as constructor parameters. Also, implement a method getConnection() that returns the PDO object.
//  Requirements:
// Handle exceptions in the constructor.
// Make sure the PDO connection is set to throw exceptions on error
class dataBaseConnection{
 private   $host;
 private $dbname;
 private $username;
 private $pass;
 private $conn;
 public function __construct($host,$dbname,$username,$pass) {
    $this->host=$host;
    $this->dbname=$dbname;
    $this->username=$username;
    $this->pass=$pass;

try {
  $this->conn=new PDO(
    "mysql:host={$this->host};dbname={$this->dbname}",
    $this->username,
    $this->pass
  );
$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "Data base connection successful";
} catch (Exception $e) {
   die ("Connection got error".$e->getMessage());
}
}
public function getConnection(){
   return $this->conn;
}
}
$object=new dataBaseConnection("localhost:3307","firstdb","root",'');
$object->getConnection();
?>
<?php
// Problem:
// Create a PHP class FileLogger that opens a file for logging messages. Implement:
// A method log($message) to write messages to the file.
// A destructor that automatically closes the file and outputs a message “Log file closed.”
class Logger{
   private $filehandler;
   public function __construct($fileName){
$this->filehandler=fopen($fileName,'a');
if(!$this->filehandler){
die ("file not handle");
}
echo "File open successfully";
   }
   public function log($message){
    $date=  date('y:m:d H-i-s');
    fwrite($this->filehandler,"$date,$message");
   }
   public function __destruct()
   {
      if($this->filehandler){
         fclose($this->filehandler);
         echo "filer log closed ";
      }
   }

}
$loged=new Logger('index.txt');
$loged->log("This is file starting");
$loged->log("An important event occur");
?>