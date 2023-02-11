<?php
if(!isset($_SESSION))
{
    session_start();
}
function getUsersList()
{
    $users = require __DIR__ . '/usersDB.php';
    //$newUsers = md5(serialize($users));
   /*$newUsers = array();
    foreach ($users as $key) {
        
            $key['password'] = md5($key['password']);
            $newUsers[] = array_push($newUsers, $key);
        
        

        
            if (!isset($key['password'])) {
            unset($newUsers[$key]);
        }
    } */       
        for ($n = 0; $n < count($users); $n++) {
            $users[$n]['password'] = sha1($users[$n]['password']);
        }
    
    
    return $users;
    
}

function existUser(string $login): bool 
{
    //$users = require __DIR__ . '/usersDB.php';
    foreach (getUsersList() as $user) {
        if($user['login'] === $login)
        {
            return true;
        };


    };
    return false;
};
function checkPassword(string $login, string $password): bool 
{
    $users = require __DIR__ . '/usersDB.php';
    //$arrUsers = getUsersList();
    foreach ($users as $user) {
        if(existUser($login) && (($user['password'])===sha1($password)))
        {
            return true;

        };


    };
    return false;
};
function getCurrentUser(): ?string
{
    $loginFromCookie = $_COOKIE['login'] ?? '';
    $passwordFromCookie = $_COOKIE['password'] ?? '';
    if(checkPassword($loginFromCookie, $passwordFromCookie)) {
        
        return $loginFromCookie;
    };
    return null;

};
