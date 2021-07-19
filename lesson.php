<?php

include "functions.php";

$blah = "Hello";

echo myFunction($blah, "hello2");

$sum = addTwoNumbers(1, 2);

var_dump([$sum]);
echo $sum;

$my_array = [1,2,3,4];

echo $my_array[1];

$my_assoc_array = [
  'Weapon' => 'Broad Sword',
  'Armor' => 'Diamond Armor'
];

$my_assoc_array['Helmet'] = 'Gold Helmet';

$my_multi_array = [
  'Stats' => [
    'HP' => 10,
    'STR' => 10
  ],
  'Inventory' => [
      'Helmet' => 'Gold Helmet',
      'Sword' => 'Broadsword',
      'Boots' => 'Leather Boots',
      'Quest Item' => 'Gold Wand',
      'Not Equipped' => [],
  ],
];

var_dump($my_multi_array);

var_dump($my_multi_array['Inventory']);

foreach ($my_multi_array['Inventory'] as $key => $value) {
   if ($key == 'Helmet') {
       echo "I found the helmet it is " . $value . "\n";
   }
   else if ($key == 'Sword') {
       echo "I found the sword it is " . $value . "\n";
   }
}

echo echoNewline($my_multi_array['Inventory']['Helmet']);

if (array_key_exists('Helmet', $my_multi_array['Inventory'])) {
    echo 'Helmet: ' . echoNewline($my_multi_array['Inventory']['Helmet']);
}

if (array_key_exists('Sword', $my_multi_array['Inventory'])) {
    echo 'Sword: ' . echoNewline($my_multi_array['Inventory']['Sword']);
}

if (array_key_exists('Boots', $my_multi_array['Inventory'])) {
    echo 'Boots: ' . echoNewline($my_multi_array['Inventory']['Boots']);
}

echo echoNewline('-------------------------------------');

foreach ($my_multi_array['Inventory'] as $key => $value) {
    if (!is_array($value)) {
        echo $key . ': ' . echoNewline($value);
    }
}

if (in_array('Golden Wand', $my_multi_array['Inventory'])) {
    echo echoNewline('Congratulations you found the golden wand. Here is the ultimate sword for your victory');
    $my_multi_array['Inventory']['Not Equipped'] = 'Ultimate Sword';

    var_dump($my_multi_array['Inventory']);
}
else {
    echo echoNewline("Why are you coming to talk to me when you havent gotten the wolden wand.");
}
