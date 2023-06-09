

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registr.css">
    <link rel="icon" href="/img/logo/logo_black.png">
    <link rel="stylesheet" href="./css/adaptive.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <title>Регистрация | Revook</title>
</head>
<body>
<section class="header">

<div class="container">

    <div class="container_header">

        <div class="list">

            <div class="col_1"> <a href="/index.html"> <img src="./img/logo/logo_gray.png" alt="logo" class="col_img"> </a> </div>
            <div class="logo_text_0"><div>Ra Lis</div></div>
            <div class="col_2"><div class="logo_text">REVOOK</div></div>
            <div class="col_2"><div class="logo_text_1">REVIEW<br>BOOK</div></div>
            
        </div>

        <hr>

    </div>

</div>

</section>

<section class="body">
            <div class="log">
            <?php 
                require "db.php"; // подключаеися к бд через файл, в которой мы прописали это самое подключение
                $data = $_POST;
                if( isset($data['reg'])) //если была нажата кнопка зарегистрироваться
                {
                    $errors = array(); //собирает все ошибки в кучу

                    if( trim($data['name']) == '') //если логин не был введён
                    {
                        $errors[] = 'Введите имя';// выводит ошибку
                    }
                    if( trim($data['email']) == '')
                    {
                        $errors[] = 'Введите email';
                    }
                    if( $data['id_book'] == '')
                    {
                        $errors[] = 'Введите номер книги';
                    }
                    if(empty($errors) ) // если ошибок нет - регистрируем
                    {
                        $user = R::dispense('registr'); //создаёт таблицу 
                        $user->name = $data['name']; //создаём поля
                        $user->email = $data['email'];
                        $user->id_book = $data['id_book']; 
                        R::store($user);// добавляем в таблицу данные, введённые пользователем
                        echo '<div style="color: white; font-size: 35px; text-align: 
                        center; margin: 3rem;">Заявка успешно зарегистрирована!</div>';
                    }else{
                        echo'<div style="color: red;">'.array_shift($errors).'</div>'; // выводим сообщение об одной из ошибок со строк : 11, 15, 19. И подсвечивает красным.
                    }  
                }
            ?>
                <form action="" method="post">
                    <h1 class="login">Регистрация</h1>
                    
                        <center><input type="text" name="name" placeholder="Имя" value="<?php echo @$data['name']; ?>"></center>
                        <center><input type="text" name="name" placeholder="Имя" value="<?php echo @$data['name']; ?>"></center>
                        <center><input type="text" name="name" placeholder="Имя" value="<?php echo @$data['name']; ?>"></center>
                        <center><input type="text" name="name" placeholder="Имя" value="<?php echo @$data['name']; ?>"></center>
                        <center><input type="text" name="name" placeholder="Имя" value="<?php echo @$data['name']; ?>"></center>
                        <center><input type="email" name="email" placeholder="email" value="<?php echo @$data['email']; ?>"></center>

                        <center><a href="/index.html" class="a">На главную / </a><a href="/login.php" class="a">Вход</a></center>
                    <div class="registr_btn">
                        <center><button id="button" type="submit" name="reg">Зарегистрироваться</button></center>
                    </div>
                </form>

            </div>

    </section>

</body>
</html>