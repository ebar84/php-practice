<?php

function session_begin() {
  $_SESSION['player'] = '';
  $_SESSION['hero'] = ['Stats' => ['str' => 10, 'dex' => 10, 'con' => 10, 'int' => 10, 'wis' => 10],
                      ['name' => $_SESSION['name'],
                        'class' => $_SESSION['class'],
                        'Inventory' => [],
                        'Equipped' => ['Weapon' => '', 'Body' => ''],
                        'Skills' => ['Magic' => '']]];


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
  $_SESSION['name'] = readline("Enter Your Name>>");
  echo "Your name is " . $_SESSION['name'] . ".\n";
  $class_chosen = FALSE;
  do {
       echo "Wizard\n
            Warrior\n
            Thief\n";
    $_SESSION['class'] = readline("Choose Your Class>>");
      if ($_SESSION['class'] === "Wizard") {
        echo "You are a " . $_SESSION['class'] . ".\n";
        $class_chosen = TRUE;
    }
      elseif ($_SESSION['class'] === "Warrior") {
        echo "You are a " . $_SESSION['class'] . ".\n";
        $class_chosen = TRUE;
    }
      elseif ($_SESSION['class'] === "Thief") {
        echo "You are a " . $_SESSION['class'] . ".\n";
        $class_chosen = TRUE;
    }
      else {
        echo "Invalid Selection\n";
        $class = readline("Choose Your Class>>");
    }

  }while (!$class_chosen);


  update_stats();

  write_file($_SESSION['hero']);
}

function display_stats() {
  echo "Strength: " . $_SESSION['hero']['Stats']['str'] . "\n";
  echo "Dexterity: " . $_SESSION['hero']['Stats']['dex'] . "\n";
  echo "Constitution: " . $_SESSION['hero']['Stats']['con'] . "\n";
  echo "Intelligence: " . $_SESSION['hero']['Stats']['int'] . "\n";
  echo "Wisdom: " . $_SESSION['hero']['Stats']['wis'] . "\n";
}

function update_stats() {
  $stat_points = 10;
  display_stats();
  do {
    $stat = readline("Choose which attribute to add a point to (" . $stat_points . " remaining): \n");
      if ($stat === 'str') {
        $_SESSION['hero']['Stats']['str']++;
        $stat_points--;
        display_stats();
      }
      elseif ($stat === 'dex') {
        $_SESSION['hero']['Stats']['dex']++;
        $stat_points--;
        display_stats();
      }
      elseif ($stat === 'con') {
        $_SESSION['hero']['Stats']['con']++;
        $stat_points--;
        display_stats();
      }
      elseif ($stat === 'int') {
        $_SESSION['hero']['Stats']['int']++;
        $stat_points--;
        display_stats();
      }
      elseif ($stat === 'wis') {
        $_SESSION['hero']['Stats']['wis']++;
        $stat_points--;
        display_stats();
      }
      else {
        echo "Invalid Selection\n";
      }
  }while ($stat_points > 0);

  game_begin();
}

function game_begin() {
  do {
    echo "1). Look for something to fight\n
            2.) Visit the General Store\n
            3.) View Stats and Inventory\n
            4.) Save and Quit\n" ;

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
  echo "Your name is " . $_SESSION['name'] . ".\n";
  echo "You are a " . $_SESSION['class'] . ".\n";
  echo "Strength: " . $_SESSION['hero']['Stats']['str'] . "\n";
  echo "Dexterity: " . $_SESSION['hero']['Stats']['dex'] . "\n";
  echo "Constitution: " . $_SESSION['hero']['Stats']['con'] . "\n";
  echo "Intelligence: " . $_SESSION['hero']['Stats']['int'] . "\n";
  echo "Wisdom: " . $_SESSION['hero']['Stats']['wis'] . "\n";
  echo "You currently have " . $_SESSION['hero']['Inventory'] . " in your Inventory.\n";
  echo "Your current weapon is " . $_SESSION['hero']['Equipped']['Weapon'] . ".\n";
  echo "You are currently wearing " . $_SESSION['hero']['Equipped']['Body'] . ".\n";
  echo "Your current Magic skill is " . $_SESSION['hero']['Skills']['Magic'] . ".\n";

}

function quit() {
  update_file();
}

function open_file() {
  $accounts = file_get_contents('players.json');
  $content = json_decode($accounts, TRUE);
  return $content;
}

function update_file() {
  $contents = open_file();
  $player = $_SESSION['player']['filename'];
  foreach ($contents['players'] as $key => $content) {
    if ($content['player'] == $player) {
      $contents['players'][$key] = $_SESSION['player'];
    }
  }

  $jsonData = json_encode($contents);
  file_put_contents('players.json', $jsonData);
}

function login() {
  $logged_in = FALSE;

  do {
    $username = readline("Username>>");
    $contents = open_file();

    foreach ($contents['players'] as $content) {
      if ($content['player'] == $username) {
        $logged_in = TRUE;
        $_SESSION['player'] = $content;
        echo "You have entered the Realm of the Blue Dragon";
        break;
      }
      else {
        echo "Unable to Login";
      }
    }

  } while (!$logged_in);
}