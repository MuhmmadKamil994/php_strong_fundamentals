<?php
// Problem:
// Create an abstract class Report that defines a blueprint for generating reports.
// Must include an abstract method generate() and a concrete method save($filename).
// Create two child classes:
// PDFReport
// CSVReport
// Each should override generate() with different content generation logic.
abstract class Report{
    protected $content;
    abstract function generate(array $data):void;
public function save(string $filename):void{
file_put_contents($filename,$this->content);
echo "file have successfully saved {$filename} \n"."<br>";
}
}
class PDFReport extends Report{
    public function generate(array $data): void
    {
        $this->content="PDF Report \n".implode("\n",$data);
        echo "PDF Report generated";
    }
}
class CSVReport extends Report{
    public function generate(array $data): void
    {
        $this->content="CSV Report \n".implode(",",$data);
    }
}
$obj=new PDFReport();
$obj->generate(['user1','user2','user3','user4']);
$obj->save('report.pdf');
$obj2=new CSVReport();
$obj2->generate(['Name','age','section','depart']);
$obj2->save('report.csv');
?>
<?php
// Problem:
// Design a Payment Processor system using:
// Abstract class AbstractPaymentProcessor with:
// Template method process($amount) (final)
// Abstract methods authorize(), capture(), and receipt()
// An interface GatewayConfigurable with configure($settings)
// Subclasses StripeProcessor and PayPalProcessor implementing the abstract flow differently.

interface GatewayConfigurable{
   public  function configure(array $setting);
}
abstract class AbstractPaymentProcessor implements GatewayConfigurable{
    protected $setting;
    final function process($amount){
        $this->authorize($amount);
        $this->capture($amount);
        $this->receipt($amount);
    }
    abstract protected function authorize($amount);
    abstract protected function capture($amount);
    abstract protected function receipt($amount);
    public function configure(array $setting)
    {
        $this->setting=$setting;
        echo static::class."configured"."<br>";
    }
}
class StripeProcessor extends AbstractPaymentProcessor{
    protected function authorize($amount){
        echo "Stripe : authorized ₹{$amount}"."<br>";
    }
    protected function capture($amount){
        echo "Stripe :catured ₹{$amount}"."<br>";
    }
    protected function receipt($amount){
        echo "Stripe receipt sent."."<br>";
    }

}
class PayPalProcessor extends AbstractPaymentProcessor{
    protected function authorize($amount){
        echo "PayPal: authorized ₹{$amount}"."<br>";
    }
    protected function capture($amount){
        echo "PayPal : Captured ₹{$amount}"."<br>";
    }
    protected function receipt($amount){
        echo "PayPal confirmation with Email sending."."<br>";
    }
}
$bank=new StripeProcessor();
$bank->configure(['api_key'=>'xyz']);
$bank->process(60000);
$bank1=new PayPalProcessor();
$bank1->configure(['client_id'=>'ABC']);
$bank1->process(70000);
?>
<?php
// Problem:
// Design a Data Repository System that separates logic from data access (used in frameworks like Laravel).
// Create an abstract class BaseRepository implementing interface RepositoryInterface.
// Define methods:
// find($id)
// save($entity)
// Make concrete repositories UserRepository and ProductRepository with in-memory arrays.
interface RepositryInterface{
    public function find(int $id);
    public function save(array $entity):void;
}
abstract class BaseRepository implements RepositryInterface{
protected array $data=[];
public function find($id){
    $this->data[$id]??null;
}
abstract public function save(array $entity):void;
}
class UserRepository extends BaseRepository{
  public function save(array $entity): void
  {
    $this->data[$entity['id']]=$entity;
    echo "User saved : {$entity['name']}"."<br>";
  }
}
class ProductRepository extends BaseRepository{
    public function save(array $entity): void
    {
        $this->data[$entity['title']]=$entity;
        echo "Product Saved :{$entity['title']}"."<br>";
    }
}
$userRepo = new UserRepository();
$userRepo->save(['id' => 1, 'name' => 'Kamil Bhai']);
print_r($userRepo->find(1));

$productRepo = new ProductRepository();
$productRepo->save(['id' => 100, 'title' => 'PHP Hoodie']);
print_r($productRepo->find(100))
?>
<?php
// Build a Notification Service Framework that can handle Email and SMS channels.
// Requirements:
// Interface NotifierInterface with send($to, $message).
// Abstract class BaseNotifier that:
// Implements the interface.
// Uses a LoggableTrait for audit logging.
// Provides a final dispatch() method that calls send() and logs results.
// Concrete classes:
// EmailNotifier
// SMSNotifier
// A NotificationManager class that accepts any NotifierInterface dynamically and executes multiple sends.
interface NotifierInterface{
    public function send($to,$message);
}
trait LoggableTrait{
public function log($msg){
    echo "['LOG']".date('Y-m-d H:i:s')." →{$msg}"."<br>";
}
}
abstract class BaseNotifier implements NotifierInterface{
use LoggableTrait;
 final public function dispatch($to, $message) {
        $this->log("Dispatching to {$to} using " . static::class);
        $this->send($to, $message);
        $this->log("Notification successfully sent to {$to}");
    }

    abstract public function send($to, $message);
}
class EmailNotifier extends BaseNotifier{
public function send($to,$message){
    echo "email successfuly send to {$to}: {$message}"."<br>";
}
}
class SMSNotifier extends BaseNotifier{
    public function send($to,$message){
        echo "Sms successesfully send to {$to} : {$message}".'<br>';
    }
}
class NotificationManager {
    private NotifierInterface $notifier;
    public function __construct(NotifierInterface $notifier)
    {
      $this->notifier=$notifier;

    }
    public function notifyAll(array $recipients, $message) {
        foreach ($recipients as $to) {
            $this->notifier->dispatch($to, $message);
        }
    }
}
$manager = new NotificationManager(new EmailNotifier());
$manager->notifyAll(['user1@example.com', 'user2@example.com'], 'Welcome to the system!');

echo "\nSwitching to SMS...\n";
$manager = new NotificationManager(new SMSNotifier());
$manager->notifyAll(['9998887777', '8887776666'], 'Your OTP is 4567.');
?>