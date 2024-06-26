<?php 

$x = 50;
$y = 60;
echo "Current: <br>";
echo "x: ". $x."<br>"."y: ".$y;
$x = $x + $y;
$y = $x - $y;
$x = $x - $y;

echo "<br> After change: <br>";
echo "x: ".$x."<br>"."y: ".$y;;