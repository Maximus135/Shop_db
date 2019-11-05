<?php
    
    session_start();
	if(isset($_SESSION['logged_login']) && isset($_SESSION['logged_password']))
	{
        echo<<<HTML
        <!DOCTYPE html>
        <html lang="ru">


        <head>
        <meta charset="UTF-8">
        <title>DATABASE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/addclient_style1.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
        </head>

        <body bgcolor="#C0C0C0">
            <div class="content">
                <form action="addclient_button.php" method="post">
                <h2>ИМЯ</h2>
                <input name="name" type="text" maxlength="20" size="20" required>
                <h2>ФАМИЛИЯ</h2>
                <input name="surname" type="text" maxlength="20" size="20" required>
                <h2>ТЕЛЕФОН</h2>
                <input name="phone" type="text" id="phone" maxlength="20" size="20"  placeholder="+7-___-___-__-__" required>
                <h2>РЕЦЕПТ</h2>
                <textarea name="glass" type="text" maxlength="500" size="500" required></textarea>
                <br>
                <br>
                <span>Клиент с таким номером телефона уже существует</span>
                <button type="submit">ДОБАВИТЬ</button>
                </form>
            </div>
            <div class="menu">
            <button onclick='location.href="../php/menu.php"'>Меню</button>
            </div>            
            <script>
            $(document).ready(function() {
                $("#phone").mask("+7-999-999-99-99");
            });
            </script>
        </body>
HTML;
    }
    else
    {
        header('Location: ../index.html');
    }

?>