<?php

$arguments = $_SERVER['argv'];

if(count($arguments) > 1){

	$account_holder_name = $arguments[1];
	$bank_balance        = $arguments[2];
	$withdraw_amount     = $arguments[3];

} else {
	
	$help = '
	php one_php.php $name $balance $withdraw_amount
	';
		
	exit($help);
	
}

$bank_charges = 0.50;
$currency_symbol = 'Rs.';

if($withdraw_amount % 5 === 0){
	
	$withdraw = $withdraw_amount + $bank_charges;
	
	if($withdraw <= $bank_balance){
		
		echo 'Welcome '.$account_holder_name.' !'.PHP_EOL;
		echo 'Transaction Was Successfull!'.PHP_EOL;		
		echo 'Account Balnce is: '.$currency_symbol. number_format($bank_balance - $withdraw, 2, ',', ' ') .PHP_EOL;
		
	} else {

		echo 'Welcome '.$account_holder_name.' !'.PHP_EOL;
		echo 'Your account doen\'t have sufficient balance!';
	}
	
} else {

	echo 'Welcome '.$account_holder_name.' !'.PHP_EOL;
	echo 'Please enter a valid amount!';
	
}

?>