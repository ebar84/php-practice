<?php
// Using array() to construct an array:
$prime_numbers = array(2, 3, 5, 7, 11, 13, 17);

// Using short array syntax:
$animals = ["dog", "cat", "turtle", "cow"];

// Printing with print_r():
print_r($prime_numbers);

echo "\n\n";

// Printing with echo and implode()
echo implode(", ", $animals);

$message = ["Oh hey", " You're doing great", " Keep up the good work!\n"];

$favorite_nums = [7, 201, 33, 88, 91];
// Write your code below:
echo implode("!", $message);
print_r($favorite_nums);

// Adding an element with square brackets:
$prime_numbers[] = 19;

// Accessing an array element:
$favorite_animal = $animals[0];
echo "\nMy favorite animal: " . $favorite_animal;

$round_one = ["X", "X", "first winner"];

$round_two = ["second winner", "X", "X", "X"];

$round_three = ["X", "X", "X", "X", "third winner"];

// Write your code below:
$winners = array($round_one[2], $round_two[0], $round_three[4]);

print_r($winners);

// Reassigning an element:
$animals[1] = "tiger";
$change_me = [3, 6, 9];
// Write your code below:

$change_me[] = "element";
$change_me[] = 69;
$change_me[1] = "tadpole";
print_r($change_me);

// Using array_pop():
echo "\nBefore pop: " . implode(", ", $animals);
array_pop($animals);
echo "\nAfter pop: " . implode(", ", $animals);

// Using array_push():
echo "\nBefore push: " . implode(", ", $prime_numbers);
array_push($prime_numbers, 23, 29, 31, 37, 41);
echo "\nAfter push: " . implode(", ", $prime_numbers);

//Using array_shift():
echo "\nBefore shift: " . implode(", ", $animals);
array_shift($animals);
echo "\nAfter shift: " . implode(", ", $animals);

//Using array_unshift():
echo "\nBefore unshift: " . implode(", ", $animals);
array_unshift($animals, "horse", "zebra", "lizard");
echo "\nAfter unshift: " . implode(", ", $animals);

$record_holders = [];
// Write your code below:

array_unshift($record_holders, "Tim Montgomery", "Maurice Greene", "Donovan Bailey", "Leroy Burrell", "Carl Lewis");

array_shift($record_holders);

array_unshift($record_holders, "Justin Gatlin", "Asafa Powell");

array_shift($record_holders);

array_unshift($record_holders, "Usain Bolt");

//Using chained operations with nested arrays:
$treasure_hunt = ["garbage", "cat", 99, ["soda can", 8, ":)", "sludge", ["stuff", "lint", ["GOLD!"], "cave", "bat", "scorpion"], "rock"], "glitter", "moonlight", 2.11];

echo "\nWe found " . $treasure_hunt[3][4][2][0];

$treasure_hunt = ["garbage", "cat", 99, ["soda can", 8, ":)", "sludge", ["stuff", "lint", ["GOLD!"], "cave", "bat", "scorpion"], "rock"], "glitter", "moonlight", 2.11];

// Write your code below:

echo $treasure_hunt[3][4][2][0];

$doge_meme = ["top_text" => "Such Python", "bottom_text" => "Very language. Wow.", "img" => "very-cute-dog.jpg", "description" => "An adorable doge looks confused."];

$doge_meme["new value"] = "Woah I'm new";

echo "\n" . $doge_meme["new value"];

array_push($doge_meme, "just an example");

echo "\n" . $doge_meme[0] . "\n";

unset($doge_meme[0]);
unset($doge_meme["new value"]);

$doge_meme["description"] = "A wonderful dog picture with a brand new description.";

function createMeme ($meme)
{
    $meme["top_text"] = "Much PHP";
    $meme["bottom_text"] = "Very programming. Wow.";
    return $meme;
}

$php_doge = createMeme($doge_meme);

print_r($doge_meme);

print_r($php_doge);

function fixMeme (&$meme)
{
    $meme["top_text"] = "I can haz";
    $meme["bottom_text"] = "PHP, plz?";
}

$lame_meme = ["top_text" => "i don't know", "bottom_text" => "i can't think of anything", "img" => "very-fat-cat.jpg", "description" => "An very fat cat looks happy."];

print_r($lame_meme);

fixMeme ($lame_meme);

print_r($lame_meme);