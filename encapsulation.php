<?php
// Create a class UserProfile that stores sensitive user information (like email, password, and role) using strict encapsulation.
// All properties must be private.
// Only the email can be changed publicly — but must be validated with a regex.
// The password can only be updated internally via a protected method after hashing it.
// The role can only be read (not changed) through a getter.
// Prevent any direct access from outside.
// Then create a subclass AdminProfile that allows the admin to reset another user’s password using that protected method safely.
class UserProfile{
   public $email;
    private $passwordHash;
    private $role;
    public function __construct($email,$password,$role)
    {
     $this->setemail($email)  ;
     $this->setpassword($password) ;
     $this->role=$role;
    }
    public function getemail(){
        return $this->email;
    }
    public function getrole(){
        return $this->role;
    }
    public function setemail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return $this->email=$email;
        }
        throw new Exception("Invalid email please enter valid one", 1);
        
    }
    public function setpassword($password){
if(strlen($password<8)){
    throw new Exception("please Enter password of 8 characters long");
}
$this->passwordHash=password_hash($password,PASSWORD_BCRYPT);
    }
    public function verifyPassword($password){
        return password_verify($password,$this->passwordHash);
    }
    public function __toString() {
        return "User: {$this->email} | Role: {$this->role} \n".PHP_EOL;
    }
}
class AdminProfile extends UserProfile{
public function newPassword(UserProfile $user,$newpassword){
    $user->setpassword($newpassword);
    echo "password reset successfully for {$user->getemail()} \n";
}
}
try {
    $user=new UserProfile("kamil@gmail.com","strongPass1","user");
    $admin=new AdminProfile("kaka@gmail.com",'adminSecure',"admin");
     $admin->newPassword($user, "newSecurePass!");
    echo $user;
} catch (Exception $e) {
    echo "Error".$e->getMessage();
}
echo "Bank Encapsulation \n\n";
?>
<?php
// Build a mini banking system with two encapsulated classes:
// BankAccount –
// Private properties: balance, accountNumber, and owner.
// Has protected methods deposit() and withdraw(), ensuring the balance never goes negative.
// No direct public access to balance — only readable through a secure method.
// BankFacade –
// Encapsulates internal complexity of deposits/withdrawals.
// Provides simple public methods: addMoney(), takeMoney(), and getAccountSummary().
// Internally uses the protected methods of BankAccount.
// This structure mimics how real banking APIs hide internal complexity from the user using encapsulation and design patterns.
class BankAccount{
    private $balance;
    private $accountNumber;
    private $owner;
    public function __construct($accountNumber,$owner,$initialbalance=0)
    {
        $this->balance=$initialbalance;
        $this->accountNumber=$accountNumber;
        $this->owner=$owner;
    }
    protected function deposit($amount){
if($amount<=0){
    throw new Exception("Balance should not be negative");
}
 $this->balance+=$amount;
    }
    protected function withdraw($amount){
        if($amount<0){
echo "balance should not be negative";
        }
        if($amount>$this->balance){
            echo "insuffitient Balance";
        }
        $this->balance-=$amount;
    }
    public function getBalance(){
        return $this->balance;
    }
    public function getaccountNumber(){
        return $this->accountNumber;
    }
    public function getOwner(){
       return $this->owner;
    }
}
class BankFacade{
    private $account;
    public function __construct(BankAccount $account)
    {
        $this->account=$account;
    }
    public function addMoney($amount){
$method=new ReflectionMethod($this->account,'deposit');
$method->setAccessible(true);
$method->invoke($this->account,$amount);
echo "Deposited ₹{$amount} successfully.\n";
    }
    public function takemoney($amount){
$method=new ReflectionMethod($this->account,'withdraw');
$method->setAccessible(true);
$method->invoke($this->account,$amount);
echo "Withdraw ₹{$amount} successfully .\n";
    }
    public function getAccountSummary(){
        echo "Account Summary \n";
        echo "Account: {$this->account->getaccountNumber()} \n";
echo "Owner: {$this->account->getOwner()} \n";
echo "Amount :₹{$this->account->getBalance()} \n";
    }
}
try {
$acc=new BankAccount("Binr325","Malik Kamil",90000);
$bank=new BankFacade($acc);
$bank->addMoney(4000);
$bank->takemoney(3000);
$bank->getAccountSummary();
} catch (Exception $e) {
    throw new Exception("Error Processing Request", $e->getMessage());
    
}
?>