<?php

function session_begin() {
  $_SESSION['player'] = '';
}

function generate_new_character($name, $class) {
  $_SESSION['player'] =
    [
      'Stats' => [
        'str' => 10,
        'dex' => 10,
        'con' => 10,
        'int' => 10,
        'wis' => 10,
      ],
      'name' => $name,
      'class' => $class,
      'Inventory' => [''],
      'Equipped' => ['Weapon' => '', 'Body' => ''],
      'Skills' => ['Magic' => ''],
      'filename' => str_replace(' ', '_', $name),
    ];
}

function main() {
  session_begin();

  echo "Welcome to Legend of the Blue Dragon!\n
                \||/ \n
                |  @___oo\n
      /\  /\   / (__,,,,|\n
     ) /^\) ^\/ _)\n
     )   /^\/   _)\n
     )   _ /  / _)\n
 /\  )/\/ ||  | )_)\n
<  >      |(,,) )__)\n
 ||      /    \)___)\\n
 | \____(      )___) )___\n
  \______(_______;;; __;;;\n";

  menu();
}

function write_file($content) {
  $encode = json_encode($content);
  file_put_contents('players.json', $encode);
}

function menu() {
  do {
    echo "1). Create New Adventure\n
            2.) Continue Adventure\n
            3.) Quit\n";

    $option = readline("Choose an option>>");
    if ($option === "1") {
      create_hero();
    }
    elseif ($option === "2") {
      login();
    }
    elseif ($option === "3") {
      quit();
    }
    else {
      echo "Invalid Selection\n";
      $option = readline("Choose an option>>");
    }

  } while ($option != 3);
}

function create_hero() {
  $name = readline("Enter Your Name>>");
  echo "Your name is " . $name . ".\n";
  $class_chosen = FALSE;

  do {
    echo "Wizard\n
            Warrior\n
            Thief\n";
    $class_name = readline("Choose Your Class>>");

    if ($class_name === "Wizard") {
      echo "You are a " . $class_name . ".\n";
      $class_chosen = TRUE;
    }
    elseif ($class_name === "Warrior") {
      echo "You are a " . $class_name . ".\n";
      $class_chosen = TRUE;
    }
    elseif ($class_name === "Thief") {
      echo "You are a " . $class_name . ".\n";
      $class_chosen = TRUE;
    }
    else {
      echo "Invalid Selection\n";
    }

  } while (!$class_chosen);

  generate_new_character($name, $class_name);
  update_stats();

  write_file($_SESSION['player']);
}

function display_stats() {
  echo "Strength: " . $_SESSION['player']['Stats']['str'] . "\n";
  echo "Dexterity: " . $_SESSION['player']['Stats']['dex'] . "\n";
  echo "Constitution: " . $_SESSION['player']['Stats']['con'] . "\n";
  echo "Intelligence: " . $_SESSION['player']['Stats']['int'] . "\n";
  echo "Wisdom: " . $_SESSION['player']['Stats']['wis'] . "\n";
}

function update_stats() {
  $stat_points = 10;
  display_stats();
  do {
    $stat = readline("Choose which attribute to add a point to (" . $stat_points . " remaining): \n");
    if ($stat === 'str') {
      $_SESSION['player']['Stats']['str']++;
      $stat_points--;
      display_stats();
    }
    elseif ($stat === 'dex') {
      $_SESSION['player']['Stats']['dex']++;
      $stat_points--;
      display_stats();
    }
    elseif ($stat === 'con') {
      $_SESSION['player']['Stats']['con']++;
      $stat_points--;
      display_stats();
    }
    elseif ($stat === 'int') {
      $_SESSION['player']['Stats']['int']++;
      $stat_points--;
      display_stats();
    }
    elseif ($stat === 'wis') {
      $_SESSION['player']['Stats']['wis']++;
      $stat_points--;
      display_stats();
    }
    else {
      echo "Invalid Selection\n";
    }
  } while ($stat_points > 0);

  game_begin();
}

function game_begin() {
  do {
    echo "1). Look for something to fight\n
            2.) Visit the General Store\n
            3.) View Stats and Inventory\n
            4.) Save and Quit\n";

    $option = readline("Choose an option>>");
    if ($option === "1") {
      echo "There are currently no monsters to fight";
    }
    elseif ($option === "2") {
      echo "The General Store is full of items!";
    }
    elseif ($option === "3") {
      view_stats();
    }
    elseif ($option === "4") {
      quit();
    }
    else {
      echo "Invalid Selection\n";
      $option = readline("Choose an option>>");
    }

  } while ($option != 4);
}

function view_stats() {
  echo "Your name is " . $_SESSION['player']['name'] . ".\n";
  echo "You are a " . $_SESSION['player']['class'] . ".\n";
  echo "Strength: " . $_SESSION['player']['Stats']['str'] . "\n";
  echo "Dexterity: " . $_SESSION['player']['Stats']['dex'] . "\n";
  echo "Constitution: " . $_SESSION['player']['Stats']['con'] . "\n";
  echo "Intelligence: " . $_SESSION['player']['Stats']['int'] . "\n";
  echo "Wisdom: " . $_SESSION['player']['Stats']['wis'] . "\n";
  echo "You currently have " . $_SESSION['player']['Inventory'] . " in your Inventory.\n";
  echo "Your current weapon is " . $_SESSION['player']['Equipped']['Weapon'] . ".\n";
  echo "You are currently wearing " . $_SESSION['player']['Equipped']['Body'] . ".\n";
  echo "Your current Magic skill is " . $_SESSION['player']['Skills']['Magic'] . ".\n";

}

function quit() {
  update_file();
}

function open_file() {
  $players = file_get_contents('players.json');
  $content = json_decode($players, TRUE);
  return $content;
}

function update_file() {
  $contents = open_file();

  $fileName = $_SESSION['player']['filename'];

  $jsonData = json_encode($_SESSION['player']);
  file_put_contents($fileName, $jsonData);

  $playerData = json_encode($fileName);
  file_put_contents('players.json', $playerData);
}

function login() {
  $logged_in = FALSE;
  $fileName = $_SESSION['player']['filename'];

  do {
    $username = readline("Username>>");
    $contents = open_file();

    foreach ($contents['players'] as $content) {
      if ($content['player'] == $username) {
        $logged_in = TRUE;
        $_SESSION['player']['filename'] = $content;
        echo "You have entered the Realm of the Blue Dragon";
        break;
      }
      else {
        echo "Unable to Login";
      }
    }

  } while (!$logged_in);
}