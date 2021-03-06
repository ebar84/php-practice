<?php

function session_begin() {
  $_SESSION['account'] = '';
}

function main() {
  session_begin();

  echo "Welcome to the Super Bank Program. Please log in to continue.\n";
  login();
  menu();
}

function menu() {
  do {
    echo "1.) Withdraw\n
            2.) Deposit\n
            3.) Check Balance\n
            4.) Change Password\n
            5.) Log out\n";
    $option = readline("Choose an option>>");
    if ($option === "1") {
      withdraw();
    }
    elseif ($option === "2") {
      deposit();
    }
    elseif ($option === "3") {
      check_balance();
    }
    elseif ($option === "4") {
      change_password();
    }
    elseif ($option === "5") {
      update_file();
    }
    else {
      echo "Invalid Selection\n";
      $option = readline("Choose an option>>");
    }

  } while ($option != 5);
}

function change_password() {
  $password_changed = FALSE;
  do {
    $new_password = readline("Enter New Password>>");

    if (trim($new_password)) {
      echo "Your new password is " . $new_password . ".\n";
      $_SESSION['account']['password'] = $new_password;
      $password_changed = TRUE;
      update_file();
    }
    else {
      echo "This is not a valid password";
    }

  } while (!$password_changed);
}

function check_balance() {
  // Open up the file and display the balanace
  $balance = $_SESSION['account']['balance'];
  echo "You're balance is currently " . $balance . ".\n";
}

function withdraw() {
  $balance = $_SESSION['account']['balance'];

  if ($balance <= 0) {
    echo "You ain't got no money to withdraw you broke ass.";
  }
  else {
    $withdraw_complete = FALSE;

    do {
      $balance = $_SESSION['account']['balance'];
      $withdraw_amount = readline("Amount to Withdraw>>");

      if (is_numeric($withdraw_amount) && $withdraw_amount >= 1 && $balance >= $withdraw_amount) {
        $_SESSION['account']['balance'] -= $withdraw_amount;
        echo "You're money is being dispensed. You're current balance is " . $_SESSION['account']['balance'] . "!\n";
        $withdraw_complete = TRUE;
        update_file();
      }
      else {
        echo "You cannot withdraw " . $withdraw_amount . ".\n Your current balance is " . $balance . ".\n";
      }
    } while (!$withdraw_complete);
  }
}

function deposit() {
  // Asks for the amount of money, does a set_balance
  $balance = $_SESSION['account']['balance'];

  if ($balance < 0) {
    echo "There is a problem with your account. Speak with representative.";
  }
  else {
    $deposit_complete = FALSE;

    do {
      $balance = $_SESSION['account']['balance'];
      $deposit_amount = readline("Amount to Deposit>>");

      if (is_numeric($deposit_amount) && $deposit_amount >= 1) {
        $_SESSION['account']['balance'] += $deposit_amount;
        echo "Thank you for your deposit! You're current balance is now " . $_SESSION['account']['balance'] . "!\n";
        $deposit_complete = TRUE;
        update_file();
      }
      else {
        echo "Unable to deposit " . $deposit_amount . ".\n You're current balance is " . $balance . ".\n";
      }
    } while (!$deposit_complete);
  }
}

function login() {
  $logged_in = FALSE;

  do {
    $username = readline("Username>>");
    $password = readline("Password>>");
    $contents = open_file();

    // loop through the array
    foreach ($contents['accounts'] as $content) {
      // if username matches and password matches
      if ($content['username'] == $username && $content['password'] == $password) {
        $logged_in = TRUE;
        $_SESSION['account'] = $content;
        echo "You have successfully logged in.";
        break;
      }
      else {
        echo "Unable to Login";
      }
    }

  } while (!$logged_in);
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

function update_file() {
  $contents = open_file();
  $username = $_SESSION['account']['username'];
  // loop through the array
  foreach ($contents['accounts'] as $key => $content) {
    if ($content['username'] == $username) {
      $contents['accounts'][$key] = $_SESSION['account'];
    }
  }

  $jsonData = json_encode($contents);
  file_put_contents('bank_accounts.json', $jsonData);
}

