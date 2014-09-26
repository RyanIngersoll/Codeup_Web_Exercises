<?php

// for ($i = 1; $i <= 100; $i++){
//  echo $i%15? $i%5? $i%3? $i: 'fizz': 'buzz': 'fizzbuzz' . PHP_EOL;
// }


for ($num = 1; $num<= 100; $num++){

	if (($num % 3 == 0) && ($num % 5 == 0)) {
		echo $num . " FizzBuzz" . PHP_EOL;
	}

	elseif($num % 5 == 0){

		echo $num . " Buzz" . PHP_EOL;
	}
	elseif($num % 3 == 0){
		echo $num . " Fizz" . PHP_EOL;
	}	
	else {
	 	echo $num . PHP_EOL;
	}
}


$num = 1;

while($num <= 100){
	if (($num % 3 == 0) && ($num % 5 == 0)) {
		echo $num . " FizzBuzz" . PHP_EOL;
		$num++;
	}

	elseif($num % 5 == 0){
		echo $num . " Buzz" . PHP_EOL;
		$num++;
	}

	elseif($num % 3 == 0){
		echo $num . " Fizz" . PHP_EOL;
		$num++;
	}	
	else {
	 	echo $num . PHP_EOL;
	 	$num++;
	}
}



?>