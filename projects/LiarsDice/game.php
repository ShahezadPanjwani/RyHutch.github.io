<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php
session_start();

// A function to randomize the Dice array
function rollDice($dice)
{
    foreach ($dice as &$cup) {
        foreach ($cup as &$die) {
            $die = rand(1, 6);
        }
    }
    return $dice;
}

// A function to count the dice rolls
function countDice($dice)
{
    $total = array(0, 0, 0, 0, 0, 0, 0);
    foreach ($dice as &$cup) {
        for ($i = 0; $i < count($cup); $i++) {
            $total[$cup[$i]] += 1;
        }
    }
    return $total;
}

// A function to display current bid information
function currentBid()
{
    if (isset($_SESSION['number']) && isset($_SESSION['face'])) {
        $n = $_SESSION['number'];
        $f = $_SESSION['face'];
        echo "<p>Current Bid: $n $f's</p>";
    } else {
        echo "<p>No Active Bid</p>";
    }
}

// A function to display a menu based on the turn
function turn($turn)
{
    // Display a user interface if it is the player's turn
    if ($turn < 10) {
        echo "<br>";
        echo "<form action='game.php' method='post'>";
        echo "<p>Call Bluff:</p>";
        echo "<input type='submit' value='Call' name='submit'>";
        echo "<p>Number of dice:</p>";
        echo "<input type='number' name='number'><br>";
        echo "<p>Value of Face:</p>";
        echo "<input type='radio' name='face' value='1'>1<br>";
        echo "<input type='radio' name='face' value='2'>2<br>";
        echo "<input type='radio' name='face' value='3'>3<br>";
        echo "<input type='radio' name='face' value='4'>4<br>";
        echo "<input type='radio' name='face' value='5'>5<br>";
        echo "<input type='radio' name='face' value='6'>6";
        echo "<p>Make the Bid:</p>";
        echo "<input type='submit' value='Bet' name='submit'>";
        echo "<p>Reset:</p>";
        echo "<input type='submit' value='Reset' name='submit'>";
        echo "</form>";
    } else {
        echo "<form action='game.php' method='post'>";
        echo "<input type='submit' value='Next' name='submit'>";
        echo "</form>";
    }

    // Increment the turn counter
    if($_SESSION['turn'] < 2){
        $_SESSION['turn']++;
    } else {
        $_SESSION['turn'] = 0;
    }

}

// A function to handle whether the last action was a Call, Bet, or Next
function lastAction()
{
    if ($_POST['submit'] == "Call") {
        callBluff();
        $_SESSION['dice'] = rollDice($_SESSION['dice']);
    } else if ($_POST['submit'] == "Bet") {

    } else if ($_POST['submit'] == "Next") {

    } else if ($_POST['submit'] == "Reset") {
        $_SESSION['dice'] = array(
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
        );
        $_SESSION['dice'] = rollDice($_SESSION['dice']);
    } else {
        // This only happen for the first turn of the game
    }
}

// A function to load all data from the $_SESSION array into the current turn
function loadSession()
{
    // Check if the dice exist in the session
    if (isset($_SESSION['dice'])) {
        echo "<h1>DICE EXIST</h1>";
    } else {
        echo "<h1>DICE DON'T EXIST</h1>";
        $_SESSION['dice'] = array(
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
        );
    }

    // Check for the last turn
    if (isset($_SESSION['turn'])) {
        $t = $_SESSION['turn'];
        echo "<h1>Turn: $t</h1>";
    } else {
        echo "<h1>No Turn</h1>";
        $_SESSION['turn'] = 1;
    }

    // Insert the last $_POST data into the $_SESSION
    if (isset($_POST['number']) && isset($_POST['face'])) {
        $_SESSION['number'] = $_POST['number'];
        $_SESSION['face'] = $_POST['face'];
    }
}

// A function to check if the Bid was over estimated
function callBluff(){
    $total = countDice($_SESSION['dice']);
    $t = -1;

    if ($total[$_SESSION['face']] < $_SESSION['number']){
        if ($_SESSION['turn'] == 0) {
            $t = 1;
        } else if ($_SESSION['turn'] == 1){
            $t = 2;
        } else if ($_SESSION['turn'] == 2){
            $t = 0;
        }
        array_pop($_SESSION['dice'][$t]);
    } else {
        if ($_SESSION['turn'] == 0) {
            $t = 2;
        } else if ($_SESSION['turn'] == 1){
            $t = 0;
        } else if ($_SESSION['turn'] == 2){
            $t = 1;
        }
        array_pop($_SESSION['dice'][$t]);
    }

    unset($_SESSION['number']);
    unset($_SESSION['face']);
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liar's Dice</title>
</head>
<body>

<?php
loadSession();
lastAction();
currentBid();

// Debug printing
/////////////////////////////////////////////////////////
for ($i = 0; $i < sizeof($_SESSION['dice']); $i++){
    echo "$i: ";
    echo implode(" ", $_SESSION['dice'][$i]);
    echo "<br>";
}

echo implode(" ", countDice($_SESSION['dice']));
/////////////////////////////////////////////////////////

turn($_SESSION['turn']);
?>

</body>
</html>