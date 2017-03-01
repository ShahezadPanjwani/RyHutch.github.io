<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php
$players = 5;
$starting_dice = 5;
$dice = array(
    array(0,0,0,0,0),
    array(0,0,0,0,0),
    array(0,0,0,0,0),
    array(0,0,0,0,0),
    array(0,0,0,0,0)
);
$total_dice = array(0,0,0,0,0,0);

function rollDice($dice){
    foreach ($dice as &$cup){
        foreach ($cup as &$die){
            $die = rand(1,6);
        }
    }
    return $dice;
}

function countDice($dice){
    $total = array (0,0,0,0,0,0,0);
    foreach ($dice as &$cup){
        for($i = 0; $i < count($cup); $i++){
            $total[$cup[$i]] += 1;
        }
    }
    return $total;
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liar's Dice</title>
</head>
<body>

<?php
    $dice = rollDice($dice);

    foreach($dice as $cup) {
        echo implode(" ", $cup);
        echo "<br>";
    }

    $total_dice = countDice($dice);
    echo implode(" ", $total_dice);
?>

</body>
</html>