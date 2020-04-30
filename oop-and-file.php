<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './includes/Snacks.Class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOPS and FILE</title>
</head>

<body>
    <h1>OOPS and FILE</h1>
    <?php include './includes/navigation.php'; ?>

    <?php
    //new object instance of "Snacks" class.
    $snacks = new Snacks(dirname(__FILE__) . '/data/oop-and-file.json');
    //output all the snacks we found
    $snacks->output();
    ?>

    <h2>Find Snack by index number</h2>
    <h4>The third snack is</h4>
    <?php
    //output will be third snack (arraystrat at 0)
    $snacks->findSnackByIndex(2);
    ?>
</body>

</html>