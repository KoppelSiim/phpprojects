<?php
//Ülesanne 1, Siim Koppel, 02.09.2023
$name = "Siim";
$birthYear = 1988;
$zodiacSign = "Libra";
echo "My name is <br>$name<br> and I was born in<br>$birthYear,<br>my zodiac sign is<br>$zodiacSign.<br>";
echo '“It’s My Life” – Dr. Alban<br>';
echo '(\(\<br>( -.-)<br>o_(")(")<br>';
//Ülesanne 2, Siim Koppel, 02.09.2023
$firstNumber = 6;
$secondNumber = 15;
printf("%d + %d = %d<br>", $firstNumber, $secondNumber, $firstNumber + $secondNumber);
printf("%d - %d = %d<br>", $firstNumber, $secondNumber, $firstNumber - $secondNumber);
printf("%d * %d = %d<br>", $firstNumber, $secondNumber, $firstNumber * $secondNumber);
printf("%d / %d = %.1f<br>", $firstNumber, $secondNumber, $firstNumber / $secondNumber);
printf("%d %% %d = %d<br>", $firstNumber, $secondNumber, $firstNumber % $secondNumber);
$valueInMilliMeters = 14;
$valueInCentiMeters = $valueInMilliMeters / 10;
$valueInMeters = $valueInMilliMeters / 1000;
printf("%d mm is %.2f cm and %.2f m.<br>", $valueInMilliMeters, $valueInCentiMeters, $valueInMeters);
$triangleHeight = 3;
$triangleBase = 4;
$triangleHypotenuse = 5;
$triangleCircumference = $triangleBase + $triangleHeight + $triangleHypotenuse;
$triangleVolume = ($triangleBase * $triangleHeight) / 2;
printf("The circumference of the triangle is %d and the volume is %d.", $triangleCircumference, $triangleVolume);
?>