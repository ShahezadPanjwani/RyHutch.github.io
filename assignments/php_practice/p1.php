<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Handle Form 1</title>
</head>
<body>
<?php
$text = $_POST['text'];
echo "<p>You typed $text</p>";
echo '<p>You typed $text</p>';
echo '<p>You typed '.$text.'</p>';
?>
</body>
</html>