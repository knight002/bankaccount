<?php

/**
 * A bank account which is overdraftable and closeable
 */
class MyBankAccount extends BankAccount implements Overdraftable, Closeable
{
	/**
	 * Overdraft amount
	 * @var float 
	 */
	private $overdraft = 0;

	/**
	 * Account state
	 * @var bool 
	 */
	private $closed = false;

	/**
	 * Closeable implementation
	 * @param bool $state
	 */
	public function setClosed($state)
	{
		$this->closed = $state;
	}
	
	/**
	 * Close account. Proxy for setClosed()
	 */
	public function closeAccount()
	{
		$this->setClosed(true);
	}
	
	/**
	 * Open account
	 */
	public function openAccount()
	{
		$this->setClosed(false);
	}

	/**
	 * Set overdraft limit
	 * @param float $amount
	 */
	public function setOverdraft($amount)
	{
		$this->overdraft = $amount;
	}
	
	/**
	 * Deposit funds
	 * @param float $amount
	 * @throws Exception
	 */
	public function depositFunds($amount)
	{
		if($this->closed){
			throw new Exception('account closed');
		}
		parent::depositFunds($amount);
	}
	
	/**
	 * Withdraw funds
	 * @param float $amount
	 * @throws Exception
	 */
	public function withdrawFunds($amount)
	{
		if($this->closed){
			throw new Exception('account closed');
		}
		$newFunds = $this->funds - $amount;
		if($newFunds < (0 - $this->overdraft)){
			throw new Exception('insuficient funds');
		}
		$this->funds -= $amount;
	}
}
