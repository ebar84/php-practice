<?php

function session_begin() {
  // You can use $_SESSION['accounts'] anywhere in the program.
  // This will be used when settings values globally instead of passing
  // around values to functions. This works the same as variables.
  $_SESSION['accounts'] = [];
}

function main() {
  session_begin();

  echo "Whats your name?\n";
  $answer1 = readline(">>");

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

function logout() {
  // echos and then exits the program
}

function check_password($username, $password) {
  // Loop through the array and match user name and password
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