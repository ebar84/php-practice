<?php

function session_begin() {
  $_SESSION['account'] = 'test';
}

function main() {
  session_begin();

  echo "Whats your name?\n";
  login();
}

function menu() {
  // do-while
}

function get_balance() {
  // Should open the file and retrieve the users balance
}

function set_balance() {
  // Should save to a file with the users balance
}

function check_balance() {
  // Open up the file and display the balanace
}

function withdraw() {
  // Asks for the amount of money
  // Then subtracts that number and does a set_balance
}

function deposit() {
  // Asks for the amount of money, does a set_balance
}

function login() {
  $logged_in = FALSE;

  do {
    $username = readline("Username>>");
    $password = readline("Password>>");
    $contents = open_file();

    // loop through the array
    foreach($contents['accounts'] as $content) {
      var_dump($content);
      // if username matches and password matches
      // change logged_in to true
    }

    // comp
  } while(!$logged_in);
}

function logout() {
  // echos and then exits the program
}

function open_file() {
  // file get contents
  // json_decode($contents, TRUE); Make sure to use TRUE in second
  // parameters so that you get an array instead of an object
  // set the sessions variable to the accounts $_SESSION['accounts'] =
}

function write_file($content) {
  $encode = json_encode($content);
  file_put_contents('bank_accounts.json', $encode);
}