<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!empty($_POST))
{
    require __DIR__ . '/auth.php';
    $login=$_POST['login'] ?? '';
    $password=$_POST['password'] ?? '';
    if(checkPassword($login,$password))
    {
        setcookie('login', $login, time() + (60 * 60 * 24 * 30));
        setcookie('password', $password, time() + (60 * 60 * 24 * 30));
        setcookie('timer', date('H:i:s'), time() + (60 * 60 * 24));
        $_SESSION['login'] = $login;
        $_SESSION['auth'] = false;
        $_SESSION['timer'] = date('H:i:s');
        $_SESSION['bitrhDay'] = '18.02.1993';
        header('Location:/index.php');
    } else 
    {
        
        $error = 'Ошибка авторизации';
    };
};
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPA-salon | Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div>
    <div class="col1">
    <h1>Вход/регистрация</h1>
    <form action="login.php" method="post">
        <label for="text">Логин</label>
        <input name="login" type="text" id="login" placeholder="Логин">
        <label for="password">Пароль</label>
        <input name="password" type="password" id="password" placeholder="Пароль">

        <input name="submit" type="submit" id="submit" value="Войти">
        
    </form>
    </div>
    <?php
    if(isset($error))
    {
        echo $error;
    };
       ?>
    <div class="col1">
    <h2>Услуги сети SPA Salon:</h2>
    <h3>Программы и церемонии для двоих &#128105;&#8205;&#10084;&#65039;&#8205;&#128104;</h3>
    <p>Для тех, кто хочет разделить минуты отдыха с любимым человеком</p>
    <h3>Традиционный тайский массаж &#128080;</h3>
    <p>Эталон оздоровительных практик, дарит гибкость и легкость во всем теле</p>
    <h3>Oil массажи и СПА программы &#9752;</h3>
    <p>Снятие напряжения, обновление, оздоровление и роскошный уход для всего тела</p>
    <h3>Локальный массаж &#128158;</h3>
    <p>Вы можете выбрать любую зону для экспресс массажа: лицо, стоп, голову, плечи и шею</p>
    </div>
    </div>
    <div>
    <div class="col2">
    <img src="/img/1647021261_23-kartinkin-net-p-spa-salon-kartinki-26.jpg" alt="spa-salon" class="foto">
    </div>
    <div class="col2">        
    <h2>Акции сети SPA Salon:</h2>
    <p>1. В будние дни  при ПЕРВОМ ПОСЕЩЕНИИ сети SPA Salon 30% на программы продолжительностью от 60 мин. по промокоду ВПЕРВЫЕВSPASALON</p>
    <p>2. СКИДКА 20% на второй визит на программы продолжительностью от 60 мин.  при бронировании визита в течение двух недель после первого посещения предоставляется </p>
    <p>3. Абонемент на 4 посещения "Знакомство с SPA Salon". СКИДКА 25% от базовой стоимости  программы от 60 мин. Срок действия абонемента - 2 месяца</p>
    </div>
    </div>
</body>
</html>