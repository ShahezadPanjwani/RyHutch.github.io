<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php
session_start();
$turn = 1;

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

    if (isset($_POST['Bid']) && isset($_POST['Face'])) {
        $b = $_POST['Bid'];
        $f = $_POST['Face'];
        echo "<p>Current Bid: $b $f's</p>";
    } else {
        echo "<p>No Active Bid</p>";
    }
}

// A function to display a menu based on the turn
function turn(&$turn)
{
    // Display a user interface if it is the player's turn
    if ($turn == 1) {
        echo "<br>";
        echo "<form action='game.php' method='post'>";
        echo "<p>Call Bluff:</p>";
        echo "<input type='submit' value='Call' name='submit'>";
        echo "<p>Number of dice:</p>";
        echo "<input type='number' name='Bid'><br>";
        echo "<p>Value of Face:</p>";
        echo "<input type='radio' name='Face' value='1'>1<br>";
        echo "<input type='radio' name='Face' value='2'>2<br>";
        echo "<input type='radio' name='Face' value='3'>3<br>";
        echo "<input type='radio' name='Face' value='4'>4<br>";
        echo "<input type='radio' name='Face' value='5'>5<br>";
        echo "<input type='radio' name='Face' value='6'>6";
        echo "<p>Make the Bid:</p>";
        echo "<input type='submit' value='Bet' name='submit'>";
        echo "</form>";
    } else {
        echo "<form action='game.php' method='post'>";
        echo "<input type='submit' value='Next' name='submit'>";
        echo "</form>";
    }
}

// A function to handle whether the last action was a Call, Bet, or Next
function lastAction()
{
    if ($_POST['submit'] == "Call") {
        $_SESSION['dice'] = rollDice($_SESSION['dice']);
    } else if ($_POST['submit'] == "Bet") {

    } else if ($_POST['submit'] == "Next") {

    } else {
        // This should never happen
    }
}

// A function to check that the dice are in the $_POST array (they may not be for the start of the game)
function checkDice()
{

    if (isset($_SESSION['dice'])) {
        echo "<h1>DICE EXIST</h1>";
    } else {
        echo "<h1>DICE DONT EXIST</h1>";
        $_SESSION['dice'] = array(
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0),
        );
    }
}

// A function to send all relevant data with the next $_POST
function packData(){

}

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liar's Dice</title>
</head>
<body>

<?php

checkDice();
currentBid();
lastAction();
packData();

// Debug printing
foreach ($_SESSION['dice'] as $cup) {
    echo implode(" ", $cup);
    echo "<br>";
}
echo implode(" ", countDice($_SESSION['dice']));

turn($turn);
?>

</body>
</html>