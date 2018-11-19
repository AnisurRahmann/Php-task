<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        $this->balance = ($this->balance()->value()) + ($amount->value());
        return $this;
    }
    public function withdraw(Money $amount){
      $this->balance = ($this->balance()->value()) - ($amount-> value());
      return $this;
    }

    public function transfer(Money $amount, BankAccount $account)
    {
        $this->balance = $this->balance - $amount->value();
        $account->balance = $account->balance + $amount->value();
    }
}