<?php
require_once(__DIR__ . '/../Traits/ProtectedVarPrinter.php');

class Account{
    use ProtectedVarPrinter;
    protected $id;
    public $email;
    public $username;
    public $password;
    public $cardNumber;
    public $cardLimitDate;
    public function __construct($_email, $_username, $_password, $_cardNumber, $_cardLimitDate)
    {
        $this->email = $_email;
        $this->username = $_username;
        $this->password = $_password;
        $this->cardNumber = $_cardNumber;
        $this->cardLimitDate = $_cardLimitDate;

        $this->setID();
        $this->addCustomer();
    }
    public function setID(){
        include './db.php';
        $this->id = count($customers) + 1;
    }
    public function addCustomer(){
        include './db.php';
        $newCustomer = [
            'id' => $this->id,
            'email' => $this->email,
            'username' => $this->username,
            'password' => $this->password,
            'cardNumber' => $this->cardNumber,
            'cardLimitDate' => $this->cardLimitDate,
        ];
        $customers[] = $newCustomer;
    }
}