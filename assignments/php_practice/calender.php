<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="calender.css">
    <title>Calender</title>
</head>
<body>

<?php
date_default_timezone_set('America/New_York');
$info = getdate();
$hour = $info['hours'];
if (empty($_POST['Hours'])){
    $number_of_hours = 5;
} else {
    $number_of_hours = $_POST['Hours'];
}
if (empty($_POST['People'])){
    $number_of_people = 4;
} else {
    $number_of_people = $_POST['People'];
}

// Start the Table
echo "<table class='event_table'>";

// Header Rows
echo "<tr>";
echo "<th class='table_header time'>TIME</th>";
for ($i = 1; $i <= $number_of_people; $i++) {
    echo "<th class='table_header'>Person $i</th>";
}
echo "</tr>";

// Table Rows
for ($i = $hour; $i < $number_of_hours + $hour; $i++) {
    $hourText = $i % 24;
    if ($i % 2 == 0){
        echo "<tr class='even_row'>";
        for($cols = 0; $cols < $number_of_people + 1; $cols++){
            if($cols == 0){
                echo "<td>$hourText:00</td>";
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr class='odd_row'>";
        for($cols = 0; $cols < $number_of_people + 1; $cols++){
            if($cols == 0){
                echo "<td>$hourText:00</td>";
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
    }
}
echo "</table>";
?>
<form action="calender.php" method="post">
    <p>Hours: </p><input type="text" name="Hours">
    <p>People: </p><input type="text" name="People">
    <p><input type="submit" value="Click" name="submit"/></p>
</form>
</body>
</html>