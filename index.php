<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require __DIR__ . '/auth.php';
    
    $login = getCurrentUser();
    /*setcookie('222', 'admin', 0, '/');
    print_r($_COOKIE);*/
    ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SPA-salon | Главная</title>
</head>
<body>
    
    <?php
    if($login ===null)
    {
        echo '<a href="login.php">Авторизируйтесь</a>';
    } else
    {
        require __DIR__ . '/usersDB.php';
        echo 'Добро пожаловать, '. $login. '. Вы находитесь в личном кабинете.'.'<br>';
        
        echo "<a href='logout.php'>Выйти</a><br>";
   
    date_default_timezone_set('UTC');
   /*
       $origin = date_create($_SESSION ['timer']);
       $target = date_create(date("H:i:s", time()+60*24*60));
       $interval = date_diff($target, $origin);
       echo $interval->format('%H:%m:%s времени');*/
       $now = strtotime('Now');
       $point = strtotime($_COOKIE['timer']) + 60*24*60;
       $_SESSION['auth'] = true;
       $diff = $point - $now;
       echo '<br>';
       echo '<br>';
       $hoursRemaining=floor($diff / (60 * 60));
       $minutesRemaining=floor($diff / 60);
       $secondsRemaining = $diff;
       $hours = floor($hoursRemaining % 24);
       $minutes = floor($minutesRemaining % 60);
       $seconds = floor($secondsRemaining % 60);
       // echo ''.$hours.' часов '.$minutes .' минут ' .$seconds. ' секунд осталось';
       //print_r(getUsersList());

        
    }
    ?>
    
            <div>
            <?php if($_COOKIE['timer'] && $login) { ?>
                <p>Для вас действует индивидуальная акция "15% на всю линию косметики SPA Salon" по промокоду 24ЧАСА. </p>
                <p>До ее истечении осталось
                    <?php echo '<br>'.$hours.' часов '.$minutes .' минут ' .$seconds. ' секунд !'; ?>
                </p>
                <?php } ?>
            </div> 

    
</body>
</html>