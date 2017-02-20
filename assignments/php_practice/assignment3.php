<!DOCTYPE html>
<html>

<head>
    <title>Assignment 3</title>
</head>
<style type="text/css">
    table {
        width = 300px;
    }

    .blackTile {
        width: 35px;
        height: 35px;
        background-color: black;
        border: 1px;
        padding: 1px;
        margin: 1px;
    }

    .redTile {
        width: 35px;
        height: 35px;
        background-color: red;
        border: 1px;
        padding: 1px;
        margin: 1px;
    }
</style>
<body>
<?php
isBitten();
generateCheckerBoard();
months();

function isBitten()
{
    $randomNum = rand(0, 1);
    if ($randomNum == 0) {
        echo "<h2>Charlie ate my lunch!";
    } else {
        echo "<h2>Charlie did not eat my lunch!";
    }
}

function generateCheckerBoard()
{
    echo "<table>";
    for ($i = 0; $i < 8; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 4; $j++) {
            if ($i % 2 == 0) {
                echo "<td class='blackTile'></td>";
                echo "<td class='redTile'></td>";
            } else {
                echo "<td class='redTile'></td>";
                echo "<td class='blackTile'></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function months()
{
    $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    for($i = 0; $i < count($month); $i++){
        echo "$month[$i] ";
    }
    echo "<br>";
    sort($month);
    for($i = 0; $i < count($month); $i++){
        echo "$month[$i] ";
    }
    echo "<br>";
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    foreach($months as $m){
        echo "$m ";
    }
    echo "<br>";
    sort($months);
    foreach($months as $m){
        echo "$m ";
    }
}

?>
</body>
</html>