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

interface Readable {
    public function read();
}

interface Writeable {
    public function write($data);
}

interface Deletable {
    public function delete();
}

trait LoggerTrait {
    public function logAction($action) {
        $time = date('Y-m-d H:i:s');
        echo "[$time] Action: {$action}<br>";
    }
}

class ActionTaker implements Readable, Writeable, Deletable {
    use LoggerTrait;
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function read() {
        $this->logAction("Reading: {$this->filename}");
        if (file_exists($this->filename)) {
            return nl2br(file_get_contents($this->filename)) . "<br>";
        } else {
            return "File not found<br>";
        }
    }

    public function write($data) {
        file_put_contents($this->filename, $data);
        $this->logAction("Writing: {$this->filename}");
    }

    public function delete() {
        if (file_exists($this->filename)) {
            unlink($this->filename);
            $this->logAction("Deleting file: {$this->filename}");
        } else {
            $this->logAction("Deleting non-existing file: {$this->filename}");
        }
    }
}

$file = new ActionTaker('data.txt');
$file->write("This is index.txt file for dummy text");
echo $file->read();
$file->delete();
?>

<br><hr><br>

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

trait EmailNotifier {
    public function notify($msg) {
        echo "Email Notification: {$msg}<br>";
    }
}

trait SMSNotifier {
    public function notify($msg) {
        echo "SMS Notification: {$msg}<br>";
    }
}

interface Notifiable {
    public function sendNotification($type, $message);
}

class UserNotifier implements Notifiable {
    use EmailNotifier, SMSNotifier {
        EmailNotifier::notify insteadOf SMSNotifier;
        SMSNotifier::notify as smsNotify;
    }

    public function sendNotification($type, $message) {
        if ($type == 'email') {
            $this->notify($message);
        } elseif ($type == 'msg') {
            $this->smsNotify($message);
        } else {
            echo "Other type of message<br>";
        }
    }
}

$obj1 = new UserNotifier();
$obj1->sendNotification('email', 'You are welcome to Gmail');
$obj1->sendNotification('msg', 'Your JazzCash code is 1234');
$obj1->sendNotification('insta', 'This is an Insta message');
?>

<br><hr><br>

<?php
// Problem (System Design):
// Design a Payment System that demonstrates Enterprise-level Encapsulation and Dependency Inversion.
// Create an interface PaymentGatewayInterface with processPayment($amount) and refund($transactionId).
// Implement two concrete gateways: PayPalGateway and StripeGateway
// Create a trait TransactionLogger to log every transaction uniformly.
// A PaymentService class must depend only on the interface, not on the concrete implementations.
// Show runtime injection of different gateways (Strategy pattern).

interface PaymentGatewayInterface {
    public function processPayment($amount);
    public function refund($transactionId);
}

trait TransactionLogger {
    protected function log($msg) {
        $time = date('Y-m-d H:i:s');
        echo "[LOG]: {$time} → {$msg}<br>";
    }
}

class PayPalGateway implements PaymentGatewayInterface {
    use TransactionLogger;

    public function processPayment($amount) {
        $this->log("PayPal payment is in processing ₹{$amount}");
        return "PayPal_TXN" . uniqid();
    }

    public function refund($transactionId) {
        $this->log("Refunding ID is: {$transactionId}");
        return true;
    }
}

class StripeGateway implements PaymentGatewayInterface {
    use TransactionLogger;

    public function processPayment($amount) {
        $this->log("Stripe payment is under processing: ₹{$amount}");
        return "Stripe_TXN" . uniqid();
    }

    public function refund($transactionId) {
        $this->log("Refunding ID of Stripe is: {$transactionId}");
        return true;
    }
}

class PaymentServices {
    private PaymentGatewayInterface $gateway;

    public function __construct(PaymentGatewayInterface $gateway) {
        $this->gateway = $gateway;
    }

    public function pay($amount) {
        $transactionId = $this->gateway->processPayment($amount);
        echo "Payment completed. Transaction ID: {$transactionId}<br>";
        return $transactionId;
    }

    public function refund($transactionId) {
        if ($this->gateway->refund($transactionId)) {
            echo "Refund Successful for {$transactionId}<br>";
        }
    }
}

echo "<b>--- Using PayPal Gateway ---</b><br>";
$paypal = new PaymentServices(new PayPalGateway());
$txn = $paypal->pay(1500);
$paypal->refund($txn);

echo "<br><b>--- Using Stripe Gateway ---</b><br>";
$stripe = new PaymentServices(new StripeGateway());
$txn2 = $stripe->pay(3200);
$stripe->refund($txn2);
?>
<?php
// Problem (Scenario):
// You’re designing a modular Event Handling Framework.
// Requirements:
// Define an interface EventHandlerInterface with methods:
// handle($event)
// supports($eventType)
// Create a trait LoggingTrait that logs event handling activities.
// Must include a configurable $logPrefix.
// The log method must be reusable in any event handler.
// Create an abstract base class BaseEventHandler that:
// Implements EventHandlerInterface.
// Uses LoggingTrait.
// Implements supports() as abstract (to force subclasses to define event types).
// Implements a final method dispatch() that logs and delegates event handling safely.
// Then create two subclasses:
// UserRegisteredHandler
// PaymentCompletedHandler
// Each should handle their respective events differently.
interface EventHandlerInterface{
    public function handle($event);
    public function supports($eventType);
}
trait LoggingTrait{
    protected string $logPrefix="[LOG]";
  public function log($message) {
        echo "{$this->logPrefix} " . date('H:i:s') . " → {$message}<br>";
    }
}
abstract class BaseEventHandler implements EventHandlerInterface{
    use LoggingTrait;
    final public function dispatch($eventType,$eventData){
       if($this->supports($eventType)) {
$this->log("Dispatching type '{$eventType}'");
        $this->handle($eventData);
       }
      else{
$this->log("Event Type '{$eventType}'not supported by  ".static::class);
      }  
    }
    abstract public function supports($eventType);
}
class UserRegisteredHandler extends BaseEventHandler{
public function supports($eventType)
{
   return $eventType==='user_registered';
}
public function handle($event)
{
    $this->log("handling new registration for {$event['email']}");
    $this->log("Welcome email sent to {$event['email']}");
}
}
class PaymentCompleteHandler extends BaseEventHandler{
    public function supports($eventType)
    {
     return $eventType==="payment_completed";
    }
    public function handle($event)
    {
    $this->log("Processing payment of ₹{$event['amount']} with order id #{$event['order_id']}");
    $this->log("Order # {$event['order_id']} marked as paid");
    }
}
$handlers=[
    new UserRegisteredHandler(),
    new  PaymentCompleteHandler()
];
$events=[
    ['type' => 'user_registered', 'data' => ['email' => 'kamil@example.com']],
    ['type' => 'payment_completed', 'data' => ['order_id' => 'ORD101', 'amount' => 1500]],
];
foreach($events as $event){
    foreach($handlers as $handler){
        $handler->dispatch($event['type'],$event['data']);
    }
}
?>