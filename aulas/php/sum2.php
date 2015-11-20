<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

$sum = ($num1+$num2);
?>

<html>
    <head>
        <title> Sum2 </title>
    </head>
        <body>
            <h1> Sum of 2 numbers </h1>
            <?php echo $num1 . " + " . $num2 . " = " . $sum?>
            <p/>
            <a href="form2.html" >Back </a>
        </body>
</html>
