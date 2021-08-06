<?php

function session_begin() {
  $_SESSION['player'] = '';
}

function generate_new_character($name, $class) {

  /**
   * @TODO
   *
   * Need to lowercase the namer here for filename. You can run functions
   * inside functions like
   * strtolower(str_replace...);
   */
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
      'filename' => str_replace(' ', '_', strtolower($name)),
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
}

function update_stats() {
  $stat_points = 10;

  do {
    $stat = readline("Choose which attribute to add a point to (" . $stat_points . " remaining): \n");
    display_stats();

    if ($stat === 'str') {
      $_SESSION['player']['Stats']['str']++;
      $stat_points--;
    }
    elseif ($stat === 'dex') {
      $_SESSION['player']['Stats']['dex']++;
      $stat_points--;
    }
    elseif ($stat === 'con') {
      $_SESSION['player']['Stats']['con']++;
      $stat_points--;
    }
    elseif ($stat === 'int') {
      $_SESSION['player']['Stats']['int']++;
      $stat_points--;
    }
    elseif ($stat === 'wis') {
      $_SESSION['player']['Stats']['wis']++;
      $stat_points--;
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
  display_stats();
  echo "You currently have " . $_SESSION['player']['Inventory'] . " in your Inventory.\n";
  echo "Your current weapon is " . $_SESSION['player']['Equipped']['Weapon'] . ".\n";
  echo "You are currently wearing " . $_SESSION['player']['Equipped']['Body'] . ".\n";
  echo "Your current Magic skill is " . $_SESSION['player']['Skills']['Magic'] . ".\n";
}

function display_stats() {
  echo "Strength: " . $_SESSION['player']['Stats']['str'] . "\n";
  echo "Dexterity: " . $_SESSION['player']['Stats']['dex'] . "\n";
  echo "Constitution: " . $_SESSION['player']['Stats']['con'] . "\n";
  echo "Intelligence: " . $_SESSION['player']['Stats']['int'] . "\n";
  echo "Wisdom: " . $_SESSION['player']['Stats']['wis'] . "\n";
}

function quit() {
  save_player_data();
}

function login() {
  $logged_in = FALSE;

  do {
    $username = readline("Username>>");
    $contents = open_file('players.json');

    foreach ($contents['players'] as $content) {
      if ($content['player'] == $username) {
        $logged_in = TRUE;
        /**
         * @TODO
         * Filename cant be equal to content because this row
         * is going to have the username and the file name
         */
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

function save_player_data() {
  /**
   * @TODO
   * The filename should be saving to the players directory.
   * See if you can figure out whats wrong here
   */
  $contents = open_file('players.json');
  $jsonData = json_encode($_SESSION['player']['filename']);
  save_file('players.json', $jsonData);

  /**
   * @TODO
   * Open players.json and json_encode it
   * Add the player information to the array
   * $contents = open_file('players.json');
   * $contents[] = ???
   * How do you add another row to an array here.
   * Save the file in players.json
   * save_file($filename, $contents)
   */

    $contents = open_file('players.json');
    $newJson = json_encode($contents);
    //$contents[] = $newJson;
    save_file('players.json', $newJson);
}

function open_file($filename) {
  $players = file_get_contents($filename);
  return json_decode($players, TRUE);
}

function save_file($filename, $contents) {
  file_put_contents($filename, $contents);
}