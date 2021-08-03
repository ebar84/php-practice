<?php

function main() {

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
      continue_adventure();
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
      $class = readline("Choose Your Class");
      echo "Wizard\n
          Warrior\n
          Thief\n";
      if ($class === "Wizard") {
        echo "You are a " . $class . ".\n";
        $class_chosen = TRUE;
    }
      elseif ($class === "Warrior") {
        echo "You are a " . $class . ".\n";
        $class_chosen = TRUE;
    }
      elseif ($option === "Thief") {
        echo "You are a " . $class . ".\n";
        $class_chosen = TRUE;
    }
      else {
        echo "Invalid Selection\n";
        $class = readline("Choose Your Class>>");
    }

  }while (!$class_chosen);

  $hero = ['Stats' => ['str' => 10, 'dex' => 10, 'con' => 10, 'int' => 10, 'wis' => 10], ['name' => $name, 'class' => $class]];
  write_file($hero);
}

function continue_adventure() {

}

function quit() {

}