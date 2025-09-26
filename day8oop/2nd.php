<?php
class bank 
{
    private $balance=0;
    public function deposit($amount)
    {
        if($amount>0){
            $this->balance += $amount;
        }
    }
    public function getbalance(){
        return $this->balance;
    }
}
$account1= new bank;
$account1->deposit(100);
echo $account1->getbalance(50);