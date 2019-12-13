<?php
    session_start();
        require('connect.php');

        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username']; 
            $password = $_POST['password'];
        
            $query = "SELECT * FROM users WHERE username='$username' and password=SHA('$password')";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            $count = mysqli_num_rows($result);

            if($count == 1){
                $_SESSION['username'] = $username;
            } else{
                $fsmsg = "К сожилению данного пользователя не существует";
            }
        }
        
?>  
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
<header>
        <div class="conteiner">
        <div class="header__top">
            <div class="image">
                <img src="img/galka.png" alt="galka">
            </div>
            <h1>Будьте здоровы</h1>
            <div class="title">Ваша районная аптека</div>
        </div>
        <div class="header__content">
                <nav>
                    <ul class="menu">
                        <li>
                            <a href="../domains/Site1/index.html">Главная</a>
                        </li>
                         <li>
                             <a href="#">Продукция и услуги</a>
                        </li>
                        <li>
                             <a href="#">О нас</a>
                        </li>
                        <li>
                            <a href="#" class="glovna">Войти</a>
                            <a>/</a>
                            <a href="index.php" >Регистрация</a>
                        </li>
                    </ul>
                </nav>
        </div>
    </div>
    </header>
    <div class="container">
        <form class="form-signin" method="POST">
             <h2>Login</h2>
             <?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div><?php }?>
             <input type="text" name="username" class="form-control" placeholder="Username" required>
             <input type="password" name="password" class="form-control" placeholder="Password" required>
             <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
             <a href="index.php"class="btn btn-lg btn-primary btn-block">Registration</a>
             <?php if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            echo "Hello " . $username . "";
            echo " Вы вошли";
            echo "<a href='logout.php' class='btn btn-lg btn-primary' > Logout </a>";
        }
        ?>
        </form>
    </div>
    <footer>
        <div class="site__bottom">
            <div class="text">Наш email: Аптека@gmail.com | Наш телефон: +380505556570</div>    
        </div>
    </footer>
  
</body>
</html>