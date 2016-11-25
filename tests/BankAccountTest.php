<?php

class BankAccountTest extends \PHPUnit_Framework_TestCase
{
	public function testAddsAndWithrawals()
	{
		$ba = new MyBankAccount();
		$this->assertEquals(0, $ba->getBalance());

		$ba->depositFunds(10);
		$this->assertEquals(10, $ba->getBalance());

		$ba->withdrawFunds(5);
		$this->assertEquals(5, $ba->getBalance());
		
		$ba->depositFunds(10);
		$this->assertEquals(15, $ba->getBalance());
	}
	
	public function testWithdrawFromNothing()
	{
		$ba = new MyBankAccount();
		$this->assertEquals(0, $ba->getBalance());
		
		//try to withdraw
		$this->setExpectedException(Exception::class);
		$ba->withdrawFunds(10);
	}
	
	public function testOverdraft()
	{
		$ba = new MyBankAccount();
		$ba->depositFunds(10);
		$this->assertEquals(10, $ba->getBalance());
		$ba->setOverdraft(5);
		$this->assertEquals(10, $ba->getBalance());
		$ba->withdrawFunds(12.50);
		$this->assertEquals(-2.50, $ba->getBalance());

		//try to exceed overdraft
		$this->setExpectedException(Exception::class);
		$ba->withdrawFunds(5);
	}
	
	public function testClosedAccount()
	{
		$ba = new MyBankAccount(10);
		$this->assertEquals(10, $ba->getBalance());

		//try to withdraw when account closed
		$ba->closeAccount();
		$this->setExpectedException(Exception::class);
		$ba->withdrawFunds(5);

		//now open the account
		$ba->openAccount();
		$ba->withdrawFunds(5);
		$this->assertEquals(5, $ba->getBalance());
	}
}
