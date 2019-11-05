<?php
    
    session_start();
	if(isset($_SESSION['logged_login']) && isset($_SESSION['logged_password']))
	{
        $id=$_POST['id'];
        include ("db.php");
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

        if($name && $surname && $phone && $glass)
        {
            mysqli_query($db,"UPDATE Clients SET first_name='".$name."' , last_name='".$surname."', phone='".$phone."', glass='".$glass."'  WHERE client_id='".$id."'");
            header('Location: searchclient.php');
        }
        else
        {
            echo "error";
        }

        
        


    }
    
    else
    {
        header('Location: ../index.html');
    }
?>