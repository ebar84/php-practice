<?php

function session_begin() {
  $_SESSION['account'] = 'test';
}

function main() {
  session_begin();

  echo "Welcome to the Super Bank Program. Please log in to continue.\n";
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
      // if username matches and password matches
        if ($content['username'] == $username && $content['password'] == $password){
            $logged_in = TRUE;
            $_SESSION['account'] = $content;
            echo "You have successfully logged in.";
        } else {
            echo "Unable to Login";
        }
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
  $accounts = file_get_contents('bank_accounts.json');
  // json_decode($contents, TRUE); Make sure to use TRUE in second
  // parameters so that you get an array instead of an object
  $content = json_decode($accounts, TRUE);
  return $content;
}

function write_file($content) {
  $encode = json_encode($content);
  file_put_contents('bank_accounts.json', $encode);
}