<?php

/**
 * Abstract bank account
 */
abstract class BankAccount
{
	/**
	 * Some funds
	 * @var float 
	 */
	protected $funds = 0;

	/**
	 * Creates a bank account
	 * @param float $initialAmount
	 */
	public function __construct($initialAmount = 0)
	{
		$this->funds = $initialAmount;
	}
	
	/**
	 * Gets balance
	 * @return float
	 */
	public function getBalance()
	{
		return $this->funds;
	}
	
	/**
	 * Add funds to the account
	 * @param float $amount
	 */
	public function depositFunds($amount)
	{
		$this->funds += $amount;
	}
	
	/**
	 * Withdraw funds
	 * @param float $amount
	 * @throws Exception
	 */
	public function withdrawFunds($amount)
	{
		$newFunds = $this->funds - $amount;
		if($newFunds < 0){
			throw new Exception('insuficient funds');
		}
		$this->funds -= $amount;
	}
}
