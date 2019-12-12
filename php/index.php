<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../php/styleforphp.css">
    <title>Document</title>  
</head>
<body>
<?php
require('connect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$password')";
    $result = mysqli_query($connection, $query);

    if($result){
        $smsg = "Регистрация прошла успешно";
    } else{
        $fsmsg = "Что-то пошло не так...";
    }
}
?>
<header>
        <div class="conteiner">
        <div class="header__top">
            <div class="image">
                <img src="img/galka.png" alt="galka" >
            </div>
            <h1>Будьте здоровы</h1>
            <div class="title">Ваша районная аптека</div>
        </div>
        <div class="header__content">
                <nav>
                    <ul class="menu">
                        <li>
                            <a href="index.html">Главная</a>
                        </li>
                         <li>
                             <a href="#">Продукция и услуги</a>
                        </li>
                        <li>
                             <a href="#">О нас</a>
                        </li>
                        <li>
                            <a href="#">Войти</a>
                            <a>/</a>
                            <a href="php/index.php" class="glovna">Регистрация</a>
                        </li>
                    </ul>
                </nav>
        </div>
    </div>
    </header>
    <div class="container">
        <form class="form-signin" method="POST">
             <h2>Registration</h2>
             <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php }?>
            <?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div><?php }?>
             <input type="text" name="username" class="form-control" placeholder="Username" required>
             <input type="email" name="email" class="form-control" placeholder="Email" required>
             <input type="password" name="password" class="form-control" placeholder="Password" required>
             <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
    <footer>
        <div class="site__bottom">
            <div class="text">Наш email: Аптека@gmail.com | Наш телефон: +380505556570</div>    
        </div>
    </footer>
</body>
</html>