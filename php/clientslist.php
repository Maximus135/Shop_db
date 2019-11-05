<?php
session_start();
	if(isset($_SESSION['logged_login']) && isset($_SESSION['logged_password']))
	{
        $counter=$_SESSION['counter'];
        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $phone=$_SESSION['phone'];
        $glass=$_SESSION['glass'];
        $flag=$_SESSION['flag'];
        $count_of_rows_array=$_SESSION['count_of_rows_array'];
        $max_count_of_length_rows_array=$_SESSION['count_of_length_rows_array'];
    
    function generate($counter , $name , $surname , $phone ,$glass , $flag , $count_of_rows_array , $max_count_of_length_rows_array) // функция при всех введенных полях
    {
    include ("db.php");
    if($flag==1)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name."' AND last_name='".$surname."' AND phone='".$phone."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j"  maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    if($flag==2)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name."' AND last_name='".$surname."' AND phone='".$phone[$i]."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone[$i]" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j"  maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    if($flag==3)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name."' AND last_name='".$surname[$i]."' AND phone='".$phone."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j"  maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    
    if($flag==4)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name[$i]."' AND last_name='".$surname."' AND phone='".$phone."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j" maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    if($flag==5)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name."' AND last_name='".$surname[$i]."' AND phone='".$phone[$i]."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone[$i]" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j" maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    if($flag==6)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name[$i]."' AND last_name='".$surname."' AND phone='".$phone[$i]."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i" type="text" value="$phone[$i]" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j" maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
    if($flag==7)
    {
    for($i=$counter-1;$i>=0;$i--)
    {
        $k=md5(uniqid(rand(),1));
        $result1=mysqli_query($db,"SELECT client_id FROM Clients WHERE first_name='".$name[$i]."' AND last_name='".$surname[$i]."' AND phone='".$phone."'");
        $result2=mysqli_fetch_array($result1);
        $j=md5(uniqid(rand(),1));
        $str=$str . <<<HTML
        <form action="reload_client.php" id="$k" method="post">
        <li>
        <input type="hidden" name="id" value="$result2[0]">
        <span>ИМЯ</<span>
        <input name="name" type="text" value="$name[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ФАМИЛИЯ</span>
        <input name="surname" type="text" value="$surname[$i]" maxlength="20" size="20" required pattern="^[A-Za-zА-Яа-яЁё]+.{0,19}">
        <span>ТЕЛЕФОН</span>
        <input name="phone" id="$i"  type="text" value="$phone" maxlength="20" size="20" placeholder="+7-___-___-__-__" required>
        <script>
            $(document).ready(function() {
                $("#$i").mask("+7-999-999-99-99");
            });
        </script>
        <span>РЕЦЕПТ</span>
        <textarea name="glass" type="text" cols=$max_count_of_length_rows_array[$i] rows=$count_of_rows_array[$i] id="$j"  maxlength="500" size="500" required>$glass[$i]</textarea>
        <button type="submit">Сохранить</button>
        <script>
        $(document).ready(function(){
            $("#$k").submit(function(){
                if(!$.trim($("#$j").val()))
                {
                alert("Пожалуйста введите рецепт");
                return false;
                }
            });
        });
        </script>
        </li>
        <br>
        <br>
        </form>
HTML;
    }
    }
 
    return $str;
    }

    $clients=generate($counter , $name , $surname , $phone ,$glass , $flag , $count_of_rows_array , $max_count_of_length_rows_array);


    echo<<<HTML
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>DATABASE</title>
            <link href="../css/clientslist_style.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="../js/jquery.maskedinput.min.js"></script>
        </head>
        <body bgcolor="#C0C0C0">
        <div class="table">
        $clients
        </div>
        <div class="menu">
        <button onclick='location.href="../php/menu.php"'>Меню</button>
        </div>
        </body>
        </html>

HTML;

    unset($_SESSION['counter']);
    unset($_SESSION['name']);
    unset($_SESSION['surname']);
    unset($_SESSION['phone']);
    unset($_SESSION['glass']);
    unset($_SESSION['flag']);
    unset($_SESSION['count_of_rows_array']);
    unset($_SESSION['count_of_length_rows_array']);   
    
    }
    
    else
    {
        header('Location: ../index.html');
    }
?>