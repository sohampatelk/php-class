<?php
$myMessage = 'My First PHP!';
$myString = 'Hello';
//Integer
$myInteger = 34;
//float
$myFloat = 3.14;
//boolean
$myBoolTrue = TRUE;
$myBoolFalse = false;
//null
$myNull = NULL;
//object
$myObject = new stdClass();
$myObject1 = new stdClass();
//Array

$myArray = ['firstItem', 2, 'Third Item'];
$myOtherArray = array(
    $myString, $myInteger, $myFloat, $myBoolTrue, $myBoolFalse, $myNull, $myObject, $myObject1, $myArray
);

/* 
  Strings....
  */
$string1 = 'Hello, my neame is ';
$string2 = 'Soham Patel ';
$concatedString = $string1 . $string2;
//$concatedString= "$string1  $string2";
//difference between single and double quotes
$singleQuoteConcatedString = 'Hello,my name is $string2';
$doubleQuoteConcatedString = "Hello, my name is $string2";
//$doubleQuoteConcatedString= "Hello, my name is {$string2}";
echo $doubleQuoteConcatedString;
?>
