<?php
// Problem:
// You are designing a content system with three interfaces:
// Readable → defines read()
// Writable → defines write($data)
// Deletable → defines delete()
// A FileHandler class should:
// Implement all three interfaces.
// Use a LoggerTrait that logs every operation (read, write, delete) automatically.
// Ensure logs are written with timestamps.
interface  Readable{
    public function read();

    }
interface Writeable{
    public function write($data);
}
interface Deletable{
    public function delete();
}
trait logerTrait{
public function logAction($action) {
        $time = date('Y-m-d H:i:s');
        echo "[$time] Action: {$action}\n";
    }
}
class ActionTaker implements Readable,Writeable,Deletable{
use logerTrait;
private $filename;
public function __construct($filename)
{
    $this->filename=$filename;
}
public function read()
{
 $this->logAction("Reading: {$this->filename}");
 return $this->filename
 ? file_get_contents($this->filename)
 : "file not found";
}
public function write($data)
{
 file_put_contents($this->filename,$data);
 $this->logAction("Writing :{$this->filename}");
}
public function delete()
{
 if(file_exists($this->filename)){
    unlink($this->filename);
    $this->logAction("Deleting file: {$this->filename}");
 }  
 else{
    $this->logAction("Deleting unexisting file {$this->filename}");
  } 
}
}
$file=new ActionTaker('data.txt');
$file->write("This is index.txt file for dummy text");
echo $file->read().PHP_EOL;
$file->delete();

?>
<?php
// Problem:
// Create two traits:
// EmailNotifier → has a notify($msg) method.
// SMSNotifier → also has a notify($msg) method.
// Then:
// Create an interface Notifiable with sendNotification($type, $message)
// Build a class UserNotifier that uses both traits.
// Resolve method name conflict using insteadof and as operators.
// UserNotifier must use the correct notify type dynamically.
trait EmailNotifier{
    public function notify($msg){
        echo "Email Notification : {$msg}".PHP_EOL;
    }
}
trait SMSNotifier{
    public function notify($msg){
        echo "SMS Notifications :{$msg}".PHP_EOL ;
    }
}
interface Notifiable{
    public function sendNotification($type,$message);
}
class UserNotifier implements Notifiable{
    use EmailNotifier,SMSNotifier{
        EmailNotifier::notify insteadOf SMSNotifier;
        SMSNotifier::notify as notification;
    }
    public function sendNotification($type, $message)
    {
      if($type=='email')  {
$this->notify($message);
      }
      else if($type=='msg'){
        $this->notification($message);
      }
      else{
        echo "other type of message";
      }
    }
}
$ojb1=new UserNotifier();
$ojb1->sendNotification('email','you are welcome to gmail');
$ojb1->sendNotification('msg',"your jazzcash code is 1234");
$ojb1->sendNotification('insta'," this is insta message");
?>
<?php
// Problem (System Design):
// Design a Payment System that demonstrates Enterprise-level Encapsulation and Dependency Inversion.
// Create an interface PaymentGatewayInterface with processPayment($amount) and refund($transactionId).
// Implement two concrete gateways:
// PayPalGateway
// StripeGateway
// Create a trait TransactionLogger to log every transaction uniformly.
// A PaymentService class must depend only on the interface, not on the concrete implementations.
// Show runtime injection of different gateways (Strategy pattern).
interface PaymentGatewayInterface{
    public function processPayment($amount);
    public function refund($transactionId);
}
trait TransactionLogger{
protected function log($msg){
    $time=date('Y-m-d H:i:s');
    echo "[LOG] : {$time} →  {$msg}";
}
}
class PayPalGateway implements PaymentGatewayInterface{
    use TransactionLogger;
    public function processPayment($amount)
    {
        $this->log("Paypal payment is in processing ₹{$amount}");
        return "PayPal_TXN".uniqid();
    }
    public function refund($transactionId)
    {
        $this->log("refunding id is : {$transactionId}");
        return true;
    }
}
class StripeGateway implements PaymentGatewayInterface{
use TransactionLogger;
public function processPayment($amount)
{
    $this->log("Stripe payment is under processing: ₹{$amount}");
    return "Stripe_TXN".uniqid();
}
public function refund($transactionId)
{
    $this->log("Refunding Id of Stripe is : {$transactionId}");
    return true;
}
}
class PaymentServices{
private PaymentGatewayInterface $gateway;
public function __construct(PaymentGatewayInterface $gateway){
    $this->gateway=$gateway; 
}
public function pay($amount){
    $transactionId=$this->gateway->processPayment($amount);
    echo "Payment completed . Transaction Id is : {$transactionId}";
    return $transactionId;
}
public function refund($transactionId){
if ($this->gateway->refund($transactionId)){
    echo "Refund Successful for {$transactionId}";
}
}
}
echo "--- Using PayPal Gateway ---\n";
$paypal = new PaymentServices(new PayPalGateway());
$txn = $paypal->pay(1500);
$paypal->refund($txn);

echo "\n--- Using Stripe Gateway ---\n";
$stripe = new PaymentServices(new StripeGateway());
$txn2 = $stripe->pay(3200);
$stripe->refund($txn2);
?>