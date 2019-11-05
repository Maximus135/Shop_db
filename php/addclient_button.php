<?php
    

    session_start();
    if(isset($_SESSION['logged_login']) && isset($_SESSION['logged_password']))
    {
        if (isset($_POST['name']))
        {
            $name=$_POST['name'];
            $name = trim($name);
            if ($name == '') 
            { 
                unset($name);
            }
            
        }
    
        if (isset($_POST['surname']))
        {
            $surname=$_POST['surname'];
            $surname = trim($surname);
            if ($surname == '') 
            { 
                unset($surname);
            }
            
        }
    
        if (isset($_POST['phone']))
        {
            $phone=$_POST['phone'];
            $phone = trim($phone);
            if ($phone == '') 
            { 
                unset($phone);
            }
            
        }
    
        if (isset($_POST['glass']))
        {
            $glass=$_POST['glass'];
            $glass = trim($glass);
            if ($glass == '') 
            { 
                unset($glass);
            }
            
        }

        if(empty($name) or empty($surname) or empty($phone) or empty($glass))
        {
            echo "no info";
        }
        else
        {
            include ("db.php");
            $result1=mysqli_query($db, "SELECT phone FROM Clients WHERE phone='".$phone."'");
            $result2=mysqli_fetch_array($result1);
            if($result2)
            {
                header('Location: addclient1.php');
            }
            else
            {
                mysqli_query($db,"INSERT INTO Clients (first_name,last_name,phone,glass) VALUES ('".$name."','".$surname."','".$phone."','".$glass."')");
                header('Location: menu.php');
            }
        }
    
    }
    else
    {
        header('Location: ../index.html');
    }
?>