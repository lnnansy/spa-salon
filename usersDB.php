<?php
if(!isset($_SESSION))
{
    session_start();
}
$arrayUsers = array (
['login' => 'user1', 'password' => '967fbd502857379ba38be0d93d2f23f02a08920a'],
['login' => 'user2', 'password' => '7ed0a1bbea1b9d712d0cb2de82adbe9cae928f34'],
['login' => 'qwer', 'password' => '40bd001563085fc35165329ea1ff5c5ecbdbbeef'],
);
//array_unshift($arrayUsers, $_COOKIE);
// пароль для qwer  = 123
return $arrayUsers;