<?php
/* we can see erroes from this code
Remove before pushing to prod!!*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// A basic object
$myObject = new stdClass(); // new keyword must when you define newe class

//To add an propety of object we user arrow -> arrow syntex.
$myObject->name = 'Soham';
$myObject->age = 30;
$myObject->interest = array('php', 'css', 'javascript');


// Include our class or blue print file which we can use it here.
include './includes/Snack.Class.php';

//lets make the snack
$cheetos = new Snack('chetos', 3.99, 'Chip');
$gushers = new Snack('Fruit Ghushers', 2.50, 'Fruit');
$jollyRanchers = new Snack('JollyRanchers', 1.25, 'Fruit');
$shawarma = new Snack('Shawarma', 7.50, 'Wrap');

//lets throw them in an array for easy output
$snacks = array($cheetos, $gushers, $jollyRanchers, $shawarma);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>PHP OOPS</h1>
    <?php include './includes/navigation.php'; ?>
    <h2>$myObject dump:</h2>
    <pre><?php var_dump($myObject); ?></pre>

    <h2>snacks</h2>

    
    <?php if ( count( $snacks ) > 0 ) { //in here in if condition $snacks represents array of object ?>
    <ul>
      <?php foreach ( $snacks as $e ) { //$snacks is an array of object and $e is gothrough each element?>
        <li>
          <?php $e->output( TRUE ); // Run our method! It echoes the snack for us :) //that is why we put $e->output(TRUE) which represent e is object.methodname() . and we dont write directly $output(TRUE)?>
        </li>
      <?php } ?>
    </ul>
    <?php } ?>
</body>

</html>