<?php
//while loop
$x = 1;

while($x <= 5) {
    echo "The number is: $x <br>";
    $x++;
}

$count = 1;
while ($count < 101)
{
    if($count % 33 === 0){
        echo "$count is divisible by 33\n";
    }
    $count += 1;
}

$count = 5;
echo "Countdown!\n";
while ($count > -1) {
    echo $count . "\n";
    $count--;
}
echo "Blastoff!\n\n";
?>

<?php
//do...while loop
$x = 1;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);

$plant_height = 22;

do {
    echo "The plant is " . $plant_height . " tall.\n";
    $plant_height += 1;
    if ($plant_height >= 31){
        echo "And can produce fruit.";
    }
} while ($plant_height < 51);

$lights = "off";
do {
    echo "The lights are " . $lights . "\n";
    if ($lights === "off") {
        $lights = "on";
    } else {
        $lights = "off";
    }
} while ($lights === "on");
echo "\n";
?>

<?php
//for loop
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}

for ($i = 10; $i >= 0; $i--){
    if($i === 2){
        echo "Ready!\n";
    } elseif ($i === 1){
        echo "Set!\n";
    } elseif ($i === 0){
        echo "Go!\n";
    } else {
        echo "$i\n";
    }}

$names = ["Ann", "Bob", "Cassidy", "Dave", "Ed"];
for ($index = 0; $index < count($names); $index+=2){
    echo $names[$index] . "\n";
}
echo "\n";
?>

<?php
//foreach loop
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
    echo "$value <br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $val) {
    echo "$x = $val<br>";
}

$scores = [
    "Alice" => 99,
    "Bob" => 95,
    "Charlie" => 98,
    "Destiny" => 91,
    "Edward" => 88
];

foreach ($scores as $score) {
    echo "Someone received a score of $score.\n";
}

foreach ($scores as $name => $score) {
    echo "$name received a score of $score.\n";
}

$properties = [
    "temperature" => "cold",
    "weather" => "rainy",
    "sky" => "gray"
];
foreach ($properties as $key=>$value) {
    echo "The $key is $value.\n";
}
echo "\n";
?>

<?php
//break statement
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
        break;
    }
    echo "The number is: $x <br>";
}

$x = 0;

while($x < 10) {
    if ($x == 4) {
        break;
    }
    echo "The number is: $x <br>";
    $x++;
}
?>

<?php
//continue statement
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
        continue;
    }
    echo "The number is: $x <br>";
}

$x = 0;

while($x < 10) {
    if ($x == 4) {
        $x++;
        continue;
    }
    echo "The number is: $x <br>";
    $x++;
}

//break and continue
for ($i = 10; $i >= 0; $i--) {
    if ($i === 2) {
        echo "Ready!\n";
    } elseif ($i === 1) {
        echo "Set!\n";
        break;
    } elseif ($i === 0) {
        echo "Go!\n";
    } else {
        echo $i . "\n";
    }
    if ($i === 7){
        $i--;
        continue;
    }
}
# this skips printing Ann and will
# stop execution after printing
# Dave
$names = ["Ann", "Bob", "Cassidy", "Dave", "Ed"];
for ($index = 0; $index < count($names); $index+=1){
    if ($names[$index] == "Ann") {
        continue;
    }
    echo $names[$index] . "\n";
    if ($names[$index] == "Dave") {
        break;
    }
}
?>
