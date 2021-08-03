<?php

$contents = [
  'accounts' => [
    ['username' => 'ebar', 'password' => 'password', 'balance' => 100],
    ['username' => 'cpeppers', 'password' => 'password123', 'balance' => 100],
    ['username' => 'sstorm', 'password' => '123password', 'balance' => 100],
  ],
];

$_SESSION['account'] = $contents['accounts'][1];
$_SESSION['account']['balance'] = 150;
$_SESSION['account']['password'] = 'new password';

foreach ($contents['accounts'] as $key => &$c) {

  if ($c['username'] == $_SESSION['account']['username']) {
    $c = $_SESSION['account'];
  }
}

$my_var = 5;

function new_number(&$b) {
  $b = 6;
}

new_number($my_var);

var_dump($my_var);