<html>
<body>

<?php

echo "Hello world<p>";

$carColor = "red";
echo "My car is " . $carColor . "<p>";

$txt = "W3Schools.com";
echo "I love $txt!";
echo "<p>";

$x = 5;
$y = 10;

function mySample() {
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

mySample();
echo $y;
echo "<p>";

$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

print "<h2>" . $txt1 . "</h2>";
print "Study PHP at " . $txt2 . "<p>";
print $x + $y;
echo "<p>";

$x = "Hello world!";
$y = 'Hello world!';

echo $x;
echo "<p>";
echo $y;
echo "<p>";

class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!<p>";
    }
}

$myCar = new Car("black", "Ford Escort");
echo $myCar -> message();
echo "<p>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();

echo str_replace("world", "Dolly", "Hello world!<p>");

echo(rand(10, 100));

define("cars", [
    "Alfa Romeo<p>",
    "BMW<p>",
    "Toyota<p>"
]);
echo cars[0];

define("GREETING", "Welcome to W3Schools.com!<p>");

function myTest() {
    echo GREETING;
}

myTest();

$t = date("H");

if ($t < "20") {
    echo "Have a good day!<p>";
}

$t = date("H");

if ($t < "20") {
    echo "Have a good day!<p>";
} else {
    echo "Have a good night!<p>";
}

$t = date("H");

if ($t < "10") {
    echo "Have a good morning!<p>";
} elseif ($t < "20") {
    echo "Have a good day!<p>";
} else {
    echo "Have a good night!<p>";
}

?>

</body>
</html>