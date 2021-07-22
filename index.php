<html>
<body>

<?php

function addition($var1, $var2){
    return $var1 + $var2;
}

echo addition(4, 5);

echo "<p>";

function convert($var1){
    return $var1 * 60;
}
echo convert(4);

echo "<p>";

function getFirstValue($num1, $num2, $num3){
    $var1 = array($num1, $num2, $num3);
    return $var1[0];
}

echo getFirstValue(1,2, 3);

echo "<p>";
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

echo "<p>";

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
<?php
//switch
$favcolor = "red";

switch ($favcolor) {
case "red":
echo "Your favorite color is red!";
break;
case "blue":
echo "Your favorite color is blue!";
break;
case "green":
echo "Your favorite color is green!";
break;
default:
echo "Your favorite color is neither red, blue, nor green!";
}

//if/else statements and functions
$learner_one = ["is_correct"=>FALSE, "box"=>["shape"=>"none", "color"=>"none"]];

$learner_two = ["is_correct"=>TRUE, "box"=>["shape"=>"none", "color"=>"none"]];

function markAnswer ($is_answer_correct, &$box){
if($is_answer_correct){
$box["shape"] = "checkmark";
$box["color"] = "green";
} else {
$box["shape"] = "x";
$box["color"] = "red";
}
}

markAnswer($learner_one["is_correct"], $learner_one["box"]);
markAnswer($learner_two["is_correct"], $learner_two["box"]);
print_r($learner_one["box"]);
print_r($learner_two["box"]);

//comparison operaters
function chooseCheckoutLane($items){
    if ($items <= 12){
        return "express lane\n";
    } else {
        return "regular lane\n";
    }
}

function canIVote($age){
    if ($age >= 18){
        return "yes\n";
    } else {
        return "no\n";
    }
}

print_r(chooseCheckoutLane(5));
print_r(chooseCheckoutLane(54));
print_r(canIVote(5));
print_r(canIVote(54));

//identical and not identical operators
function agreeOrDisagree($string1, $string2){
    if ($string1 === $string2){
        return "You agree!";
    } else {
        return "You disagree!";
    }
}

echo agreeOrDisagree("Hi", "Hi");
echo agreeOrDisagree("Hi", "What's up?");

function checkRenewalMonth($renewal_month){
    $current_month = date("F");
    if ($renewal_month !== $current_month){
        return "Welcome!";
    } else {
        return "Time to renew";
    }
}

echo checkRenewalMonth("January");
echo checkRenewalMonth("July");

//elseif
function whatRelation($dna_percent){
    if ($dna_percent === 100) {
        echo "identical twins";
    } elseif ($dna_percent > 34) {
        echo "parent and child or full siblings";
    } elseif ($dna_percent > 13) {
        echo "grandparent and grandchild, aunt/uncle and niece/nephew, or half siblings";
    } elseif ($dna_percent > 5) {
        echo "first cousins";
    } elseif ($dna_percent > 2) {
        echo "second cousins";
    } elseif ($dna_percent > 0) {
        echo "third cousins";
    } else {
        echo "not genetically related";
    }

}

print_r(whatRelation(100));
print_r(whatRelation(63));
print_r(whatRelation(27));
print_r(whatRelation(4));

//switch statements: fall through
function returnSeason($month){
    switch ($month) {
        case "December":
        case "January":
        case "February":
            return "winter";
            break;
        case "March":
        case "April":
        case "May":
            return "spring";
            break;
        case "June":
        case "July":
        case "August":
            return "summer";
            break;
        case "September":
        case "October":
        case "November":
            return "fall";
            break;
    }
}

//truthy and falsy
function truthyOrFalsy($var){
  if ($var){
    return "True";
  }
  else {
    return "False";
  }
}

echo truthyOrFalsy(0);
echo truthyOrFalsy(5);

//user input: readline()
echo "Hello, there. What's your first name?\n";
$name = readline(">> ");
$name_length = strlen($name);
if ($name_length > 8){
    echo "Hi, {$name}. That's a long name.";
} elseif ($name_length > 3){
    echo "Hi, {$name}.";
} else {
    echo "Hi, {$name}. That's a short name.";
}

//nested conditional statements
function both($first, $second)
{
    if ($first){
        if ($second){
            return "both";
        } else {
            return "not both";
        }
    } else {
        return "not both";
    }
}

echo both(1, 1);
echo both(2, 0);

//the || operator
function willWeEat($meal, $areHungry){
  if (($meal === "dessert") || $areHungry){
  return "Yum. Thanks!";
  }
  else {
  return "No thanks. We're not hungry.";
  }
}

echo willWeEat("dinner", 0);
echo willWeEat("dessert", "yes");

//the && operator
function clapYourHands($happy, $know_it){
  if ($happy && $know_it){
    return "CLAP!";
  }
  else {
    return ":(";
  }
}

echo clapYourHands(TRUE, TRUE);
echo clapYourHands(TRUE, FALSE);

//The Not Operator !
function duckDuckGoose($is_goose){
    if (!$is_goose){
        return "duck";
    }
    else {
        return "goose!";
    }
}

echo duckDuckGoose(FALSE);
echo duckDuckGoose(FALSE);
echo duckDuckGoose(TRUE);

//the xor operator
$banana_cream = ["whole milk", "sugar", "cornstarch", "salt", "egg yolks", "butter", "vanilla extract", "bananas", "heavy cream", "powdered sugar"];
$experimental_pie = ["whole milk", "sugar", "bananas", "chicken", "salmon", "garlic"];

// Write your code below:

function eatPie($ingredients){
    if (in_array("chicken", $ingredients) xor in_array("bananas", $ingredients)){
        return "Delicious pie!";
    }
    else {
        return "Disgusting!";
    }
}

echo eatPie($banana_cream);
echo eatPie($experimental_pie);

//alternate syntax
$is_admin = FALSE;
$is_user = TRUE;
if ($is_admin or $is_user){
    echo "You can change the password.\n";
}


$correct_pin = TRUE;
$sufficient_funds = TRUE;
if ($correct_pin and $sufficient_funds){
    echo "You can make the withdrawal.";
}
?>

<?php
$link = 'https://www.google.com';
$title = 'Google';
?>
<a href="<?php print $link?>"><?php print $title;?></a>

//loops in HTML examples

<h1>Shoe Shop</h1>
<?php
$footwear = [
    "sandals" => 4,
    "sneakers" => 7,
    "boots" => 3
];
?>
<p>Our footwear:</p>
<h3>foreach</h1>
    <?php
    foreach ($footwear as $type => $brands):
        ?>
        <p>We sell <?=$brands?> brands of <?=$type?></p>
    <?php
    endforeach;
    ?>
    <h3>for</h1>
        <?php
        $types = [
            "sandals",
            "sneakers",
            "boots"
        ];
        $quantities = [
            4,
            7,
            3
        ];
        for ($i=0; $i<count($types); $i++):
            ?>
            <p>We sell <?=$quantities[$i]?> brands of <?=$types[$i]?></p>
        <?php
        endfor;
        ?>
        <h3>while</h1>
            <?php
            $types = [
                "sandals",
                "sneakers",
                "boots"
            ];
            $quantities = [
                4,
                7,
                3
            ];
            $i = 0;
            while ($i<count($types)):
                ?>
                <p>We sell <?=$quantities[$i]?> brands of <?=$types[$i]?></p>
                <?php
                $i++;
            endwhile;
            ?>

</body>
</html>