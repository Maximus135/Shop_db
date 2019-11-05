<?php

 
    session_start();
    if (isset($_POST['login']))
    {
        $login=$_POST['login'];
        $login = trim($login);
        if ($login == '') 
        { 
            unset($login);
        }
        
    }

    if (isset($_POST['password']))
    {
        $password=$_POST['password'];
        $password = trim($password);
        if ($password == '') 
        { 
            unset($password);
        }
        
    }

    
    if(empty($login) or empty($password))
    {
        exit(header('Location: ../html/index2.html'));
    }

    //чтобы ересть не пихали в поля
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	
	$password = stripslashes($password);
    $password = htmlspecialchars($password);

    

    //подключение бд
    include ("db.php");
    
    // хэшируем пароль введеный пользователем
    $hash=password_hash($password , PASSWORD_DEFAULT);

    // берем хэш из бд который нашли по логину
    $result1=mysqli_query($db,"SELECT password FROM Admins WHERE login='".$login."'");
    $result2=mysqli_fetch_array($result1);

    // существует ли логин?
    if($result2!=null)
    {
        if(password_verify($password , $result2['password'])) // проверка совпадение хэша сохраненного и полученного
        {
            $_SESSION['logged_login']=$login;
            $_SESSION['logged_password']=$password;
		    header('Location: menu.php');
        }
        else
        {
            exit (header('Location: ../html/index2.html'));
        }
    }
    else
    {
        exit (header('Location: ../html/index2.html'));
    }


?>