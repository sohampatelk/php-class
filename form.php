<?php
session_start();  //before any output, you must declare if you would like to use session.
//lets check our session entry exists
if (!isset($_SESSION['interests'])) { // If it DOESN'T exist, let's make a default value (this way we can array_push to it later!)
    $_SESSION['interests'] = array();
}
$_SESSION['interests'] = array_values( $_SESSION['interests'] );
$message = 'Welcome to the website, please log in.';

//If form is submitted to this page, we can collect the submission
//information using one of two SUPERGLOBAL.
//$_GET [array] (if form was sibmitted with get method)
//$_POST [array] (if form was sibmitted with post method)

if (isset($_POST) && !empty($_POST)) //making sure something is submitted
{
    //retriving values from an array.(use square brackets and either: the index)
    //number or key name[a string ]//$_POST is an associative array.(use keys instead of index numbers)
    $submittedUsername = $_POST['username'];
    $submittedPassword = $_POST['password'];

    //expected username and password
    $username = 'soham';
    $password = 'mypass';

    //sucessful login?
    if (($username === $submittedUsername) && ($password === $submittedPassword)) {
        $message = 'Hello, ' . $username . ', Thankyou for logged In';

        //we are adding an element to an array using the array_push function.
        //the first argument is an array, the second is an element/value we are adding.
        array_push($_SESSION['interests'], $_POST['interest']);
    } else {
        $message = 'uhhh! please try again..username and password incorrect!!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form handling</title>
</head>

<body>
    <h1>PHP form handling</h1>
    <?php include './includes/navigation.php' ?>

    <h2>sign in Form </h2>
    <p>
        <?php echo $message; //outout our signin related message...
        ?>
    </p>
    <form action="./form.php" method="POST"><?php //forms can use get and post method.
                                            ?>
        <label for="username">
            Username:
            <input type="text" name="username" id="username">
        </label>
        <label for="password">
            Password:
            <input type="password" name="password" id="paasword">
        </label>
        <label for="interest">
            Add an interest:
            <input type="text" name="interest" id="interest">
        </label>

        <input type="submit" value="Sign In">
    </form>

    
    <?php
    //two styles for and foreach method by php 
    //one is here and second one is below
    if (!empty($_SESSION['interests'])) {
        echo '<h2>My Interests</h2><ul>';
        foreach ($_SESSION['interests'] as $interest) {
            echo "<li>$interest</li>";
        }
        echo '</ul>';
    }
    ?>


    <?php if (!empty($_SESSION['interests'])) : // Check if there ARE interests. 
    //this is second type which use collan and end if 
    ?>
        <h2>My Interests:</h2>
        <ul>
            <?php foreach ($_SESSION['interests'] as $interest) : // Output EACH interest in the array. 
            ?>
                <li>
                    <?php echo $interest; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <pre>
        <strong>$_POST contents:</strong>
        <?php var_dump($_POST); ?>
    </pre>
    <pre>
        <strong>$_SESSION contects:</strong>
        <?php var_dump($_SESSION); ?>
    </pre>
</body>

</html>