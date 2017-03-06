<!DOCTYPE html>
<html>
<head>
    <title>Project 2</title>
    <link rel="stylesheet" type="text/css" href="game.css">
</head>
<body>
<div id="diceDisplay">
    <?php
    //So we have one main array, the player array which shows how many players are active with dice. Each index of this array has a corresponding cup array, and each cup has dice.
    //Player array is [1,1,1] -3 players
    //player[0] points to cup1 = [1,4,6]
    //player[1] points to cup2 = [2,2,3]
    // and player[2] points to cup3 = [4,3,2] 	I thought it'd be easier to keep up with 1 increment rather than shift the cups, may seem confusing but you guys wont need to worry about it!

    //The next page will remove dice, and if the cup becomes empty, it will remove a player and change the index value to 0. Game ends when player array has one 1, that player is the winner.

    //Player 1 started first last page, so player 2 goes on this page. Then it loops to each active player. Thats why the player array was neccessary.
    //This page repeats betting, until someone clicks bluff, only then is somebody going to lose a dice, so then we go to the next page.

    //The way betting works is that you must either call someone on their bluff, or raise the betting number by one with any face of your choice.
    //It was difficult to program the other set of rules, so I went with this, if you guys want to try and implemement the "face" rule, feel free to try and let me know how you did it.

    session_start();

    //get values from previous page's inputs

    $players = $_SESSION['players'];
    $totalDie = $_SESSION['totalDie'];
    $player = $_SESSION['player'];            //get values
    $_SESSION['players'] = $players;        //save values for next page
    $_SESSION['totalDie'] = $totalDie;
    $_SESSION['player'] = $player;

    //Debug Text

    //echo "Number of players $players";
    //echo "<br><br>";
    //echo "Total number of die $totalDie";
    //echo "<br><br>";
    //print_r($player);
    //echo "<br><br>";
    //echo "current player is $currP";
    //echo "<br><br>";
    //echo "previous player is $prevP";
    //echo "<br><br>";

    $currP = $_POST['currP'];
    $prevP = $currP;
    $currP++;
    $indexP = $currP - 1;
    if ($player[$indexP] == 1) {

    } else {
        while ($player[$indexP] == 0) {
            if ($currP > $players) {
                $currP = 1;
                $indexP = 0;
            } else {
                $currP++;
                $indexP++;
            }
        }
    }

    $_SESSION['prevP'] = $prevP;
    $_SESSION['currP'] = $currP;

    //bring the array from previous page and print
    $count = 1;
    while ($count <= $players) {
        ${'cup' . $count} = $_SESSION['cup' . $count];    //a note, we do not need to save this into the next page. We update the arrays only on the next page.
        echo "Player $count: ";
        echo '<div class="dice">';
        printDie(${'cup' . $count}, $currP, $count);                        //we do however need to save a lot of variables into the next page.
        echo "</div>";
        $count++;
    }

    if (isset($_POST['currBetNum']) && isset($_POST['currBetVal'])) {
        $currBetNum = $_POST['currBetNum'];
        $currBetVal = $_POST['currBetVal'];
    } else {
        $currBetNum = 0;
        $currBetVal = 0;
    }

    $_SESSION['currBetNum'] = $currBetNum;
    $_SESSION['currBetVal'] = $currBetVal;

    function displayBet($currBetNum, $currBetVal)
    {
        if ($currBetNum == 0 && $currBetVal == 0) {
            echo "No active bet.";
        } else {
            echo "Current bet is:  ";
            echo " $currBetNum -- $currBetVal's";
        }
    }

    displayBet($currBetNum, $currBetVal);

    function printDie($array, $currP, $x)
    {
        $size = count($array);

        for ($k = 0; $k < $size; $k++) {
            if ($currP == $x) {
                switch ($array[$k]) {
                    case 1:
                        echo '<img src="images/die1.png" alt="icon" />';
                        break;
                    case 2:
                        echo '<img src="images/die2.png" alt="icon" />';
                        break;
                    case 3:
                        echo '<img src="images/die3.png" alt="icon" />';
                        break;
                    case 4:
                        echo '<img src="images/die4.png" alt="icon" />';
                        break;
                    case 5:
                        echo '<img src="images/die5.png" alt="icon" />';
                        break;
                    case 6:
                        echo '<img src="images/die6.png" alt="icon" />';
                        break;
                }
            } else {
                echo '<img src="images/die0.png" alt="icon" />';
            }
        }
    }

    ?>
</div>

<div id="menu">
    <form action="game2.php" method="post">

        <h2>Current Turn: Player <?php echo $currP ?></h2>
        <input type="hidden" name="currP" value= <?php echo '"' . $currP . '">'; ?>

        <h2>Number of Dice</h2>
        <input type="number" name='currBetNum'
        <?php echo 'min="';

        $currBetNum++;
        echo "$currBetNum";
        echo '" max="' . $totalDie . '">';
        ?>

        <h3>Value of Dice</h3>
        <select name="currBetVal">
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            <option value="4">Four</option>
            <option value="5">Five</option>
            <option value="6">Six</option>
        </select>

        <br></br>
        <input type="submit" value="Make Your Bet" name="submit"/>

    </form>

    <form action="game3.php" method="post">
        <input type="hidden" name="currP" value= <?php echo '"' . $currP . '">'; ?>
        <input type="submit" value="Call their Bluff" name="submit1"/>
    </form>
</div>
</body>
</html>