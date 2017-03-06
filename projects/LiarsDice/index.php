<!DOCTYPE html>
<html>

<head>
    <title>Project 2</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<div id="logo">
    <img src="images/logo.png">
</div>
<div id="menu">
    <form action="game.php" method="post">

        <h1>Number of Players</h1>
        <select name="players">
            <option value="2">Two</option>
            <option value="3">Three</option>
            <option value="4">Four</option>
            <option value="5">Five</option>
            <option value="6">Six</option>
        </select>

        <h1>Number of Dice</h1>
        <select name="dice">
            <option value="3">Three</option>
            <option value="4">Four</option>
            <option value="5">Five</option>
            <option value="6">Six</option>
            <option value="7">Seven</option>
            <option value="8">Eight</option>
        </select>

        <br></br>
        <!--<input type="submit" value="Play!" name="submit" />-->
        <button type="submit" style="border: 0; background: transparent">
            <img src="images/play.png" width="90" height="50" alt="submit"/>
        </button>
    </form>
</div>

<?php
session_start();
?>
<footer id="left">
    Dice graphic by <a href="http://www.flaticon.com/authors/roundicons">Roundicons</a> from <a
            href="http://www.flaticon.com/">Flaticon</a> is licensed under <a
            href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>.
    Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a>
</footer>
<!--<footer id="right">
    <a href="https://github.com/ColCross/PHP-game">Find us on Github!</a>
</footer>-->

</body>

</html>