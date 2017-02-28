<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<?php
$font = $_POST['Font'];
$modifier = $_POST['Modifier'];
$color = $_POST['Color'];
$text = $_POST['Text'];
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Handle Form 1</title>
</head>
<style type="text/css">
    p {
        <?php
            echo "font-family: \"$font\";";
            echo "color: $color;";
            if ($modifier == "Bold"){
                echo "font-weight: bold;";
            }
            if ($modifier == "Italic"){
                echo "font-style: italic;";
            }
        ?>
    }
</style>
<body>
<h2>Your Modified Text:</h2>
<?php
echo "<p>$text</p>";
?>
</body>
</html>