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
        <link href="../css/menu_style.css" rel="stylesheet">
        </head>

        <body bgcolor="#C0C0C0">
        <div class="button1">
            <button onclick='location.href="../php/addclient.php"'>Добавить Клиента</button>
        </div>
        <div class="button2">
            <button onclick='location.href="../php/searchclient.php"'>Найти Клиента</button>
        </div>
        <div class="button5">
        <button onclick='location.href="../php/logout.php"'>Выход</button>
        </div>
        </body>
        </html>
HTML;
    }
    else
    {
        header('Location: ../index.html');
    }


?>