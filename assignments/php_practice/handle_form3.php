<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=UTF-8">
    <title>Handle Form 1</title>
</head>
<body>
<?php
$title = $_POST['title'];
$forename = $_POST['forename'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$birthyear = $_POST['birthyear'];
$thisyear = date("Y");
$age = $thisyear - $birthyear;
print '<p>Hello, ' . "$title $forename $surname" . ' of ' . "$address.</p>";
print '</p>You will be ' . "$age" . ' this year.</p>';
?>
</body>
</html>