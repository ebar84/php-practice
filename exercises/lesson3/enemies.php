<?php

$enemies = array();

$enemies[1][] = ['name' => 'Slime', 'hp' => 5, 'atk' => 1, 'def' => 2, 'exp' => 2, 'gold' => 2];
$enemies[1][] = ['name' => 'Red Slime', 'hp' => 7, 'atk' => 2, 'def' => 1, 'exp' => 3, 'gold' => 3];
$enemies[1][] = ['name' => 'Ant', 'hp' => 8, 'atk' => 2, 'def' => 2, 'exp' => 3, 'gold' => 3];
$enemies[1][] = ['name' => 'Bat', 'hp' => 8, 'atk' => 3, 'def' => 2, 'exp' => 4, 'gold' => 4];
$enemies[1][] = ['name' => 'Rat', 'hp' => 10, 'atk' => 3, 'def' => 3, 'exp' => 5, 'gold' => 4];

$enemies[2][] = ['name' => 'Skeleton', 'hp' => 10, 'atk' => 3, 'def' => 3, 'exp' => 5, 'gold' => 5];
$enemies[2][] = ['name' => 'Giant Rat', 'hp' => 10, 'atk' => 4, 'def' => 2, 'exp' => 4, 'gold' => 5];
$enemies[2][] = ['name' => 'Ghoul', 'hp' => 12, 'atk' => 4, 'def' => 3, 'exp' => 5, 'gold' => 6];
$enemies[2][] = ['name' => 'Mean Dog', 'hp' => 11, 'atk' => 3, 'def' => 3, 'exp' => 5, 'gold' => 5];
$enemies[2][] = ['name' => 'Bomb', 'hp' => 10, 'atk' => 5, 'def' => 4, 'exp' => 7, 'gold' => 7];

$enemies[3][] = ['name' => 'Undead', 'hp' => 12, 'atk' => 5, 'def' => 4, 'exp' => 7, 'gold' => 7];
$enemies[3][] = ['name' => 'Wolf', 'hp' => 13, 'atk' => 4, 'def' => 5, 'exp' => 7, 'gold' => 7];
$enemies[3][] = ['name' => 'Ghost', 'hp' => 14, 'atk' => 6, 'def' => 5, 'exp' => 8, 'gold' => 8];
$enemies[3][] = ['name' => 'Zombie', 'hp' => 16, 'atk' => 7, 'def' => 6, 'exp' => 9, 'gold' => 8];
$enemies[3][] = ['name' => 'Orc', 'hp' => 15, 'atk' => 7, 'def' => 5, 'exp' => 9, 'gold' => 9];

$enemies[4][] = ['name' => 'Cyclops', 'hp' => 17, 'atk' => 8, 'def' => 6, 'exp' => 10, 'gold' => 10];
$enemies[4][] = ['name' => 'Witch', 'hp' => 18, 'atk' => 9, 'def' => 7, 'exp' => 10, 'gold' => 11];
$enemies[4][] = ['name' => 'Warlock', 'hp' => 20, 'atk' => 10, 'def' => 8, 'exp' => 11, 'gold' => 12];
$enemies[4][] = ['name' => 'Demon', 'hp' => 22, 'atk' => 11, 'def' => 8, 'exp' => 12, 'gold' => 14];
$enemies[4][] = ['name' => 'Ogre', 'hp' => 22, 'atk' => 12, 'def' => 7, 'exp' => 12, 'gold' => 15];

$enemies[5][] = ['name' => 'Werewolf', 'hp' => 23, 'atk' => 13, 'def' => 8, 'exp' => 13, 'gold' => 17];
$enemies[5][] = ['name' => 'Bandit', 'hp' => 24, 'atk' => 15, 'def' => 8, 'exp' => 14, 'gold' => 18];
$enemies[5][] = ['name' => 'Elf', 'hp' => 25, 'atk' => 14, 'def' => 9, 'exp' => 15, 'gold' => 20];
$enemies[5][] = ['name' => 'Ninja', 'hp' => 27, 'atk' => 16, 'def' => 10, 'exp' => 17, 'gold' => 22];
$enemies[5][] = ['name' => 'Gremlin', 'hp' => 29, 'atk' => 19, 'def' => 12, 'exp' => 20, 'gold' => 25];

function save_enemy_data() {
  $json_encode = json_encode($_SESSION['player']);
  save_file(__DIR__ . '/enemies/' . $_SESSION['player']['filename'] , $json_encode);
}