<!DOCTYPE html>
<html>

<head>
    <title>Assignment 3</title>
</head>
<style type="text/css">
    .checkersTable {
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

    .restaurantsTableHeader {
        border: 1px black solid;
    }

    .restaurantsTableData {
        border: 1px black solid;
    }
</style>
<body>
<?php
isBitten();
generateCheckerBoard();
months();
restaurants();

function isBitten()
{
    $randomNum = rand(0, 1);
    echo "<h2>Problem #1</h2>";
    if ($randomNum == 0) {
        echo "<p>Charlie ate my lunch!</p>";
    } else {
        echo "<p>Charlie did not eat my lunch!</p>";
    }
}

function generateCheckerBoard()
{
    echo "<h2>Problem #2</h2>";
    echo "<table class='checkersTable'>";
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
    echo "<h2>Problem #3</h2>";
    $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    // For Loop Unsorted
    echo"<p><b>For Loop Unsorted: </b>";
    for ($i = 0; $i < count($month)-1; $i++) {
        echo "$month[$i], ";
    }
    $lastIndex = count($month) - 1;
    echo "$month[$lastIndex]</p>";

    // For Loop Sorted
    sort($month);
    echo"<p><b>For Loop Sorted: </b>";
    for ($i = 0; $i < count($month)-1; $i++) {
        echo "$month[$i], ";
    }
    $lastIndex = count($month) - 1;
    echo "$month[$lastIndex]</p>";

    // Foreach Loop Unsorted:
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    echo"<p><b>Foreach Loop Unsorted: </b>";
    foreach ($months as $m) {
        echo "$m, ";
    }
    echo "</p>";

    // Foreach Loop Sorted
    sort($months);
    echo"<p><b>Foreach Loop Sorted: </b>";
    foreach ($months as $m) {
        echo "$m, ";
    }
    echo "</p>";
}

function restaurants()
{
    $restaurants = array("Chama Gaucha" => "40.50", "Aviva by Kameel" => "15.00", "Bone's Restaurant" => "65.00",
        "Umi Sushi Buckhead" => "40.50", "Fundangles" => "30.00", "Captain Grille" => "60.50", "Canoe" => "35.50",
        "One Flew South" => "21.00", "Fox Bros. BBQ" => "15.00", "South City Kitchen Midtown" => "29.00");
    echo "<h2>Problem #4</h2>";
    echo "<table>";
    echo "<tr><th class='restaurantsTableHeader'>By Rating</th><th class='restaurantsTableHeader'>By Price</th><th class='restaurantsTableHeader'>By Name</th></tr>";
    echo "<tr>";
    echo "<td class='restaurantsTableData'>";
    foreach ($restaurants as $name => $price) {
        echo $name." $".$price."<br>";
    }
    echo "</td>";
    asort($restaurants);
    echo "<td class='restaurantsTableData'>";
    foreach ($restaurants as $name => $price) {
        echo $name." $".$price."<br>";
    }
    echo "</td>";
    ksort($restaurants);
    echo "<td class='restaurantsTableData'>";
    foreach ($restaurants as $name => $price) {
        echo $name." $".$price."<br>";
    }
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}

?>
</body>
</html>