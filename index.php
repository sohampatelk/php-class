<?php
//this file's code will execute right here in the file
include './includes/datatypes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $myMessage; ?></title>
</head>

<body>
    <h1><?php echo $myMessage; ?></h1>
    <?php include './includes/navigation.php'; ?>
    <pre>
        <?php var_dump($myOtherArray); ?>
    </pre>

    <h2>Concated String</h2>
    <?php
    echo $concatedString;
    ?>
    <h4>single quote concated string</h4>
    <?php
    echo $singleQuoteConcatedString;
    ?>
    <h4>Double quote concated string</h4>
    <?php
    echo $doubleQuoteConcatedString;
    ?>


</body>

</html>