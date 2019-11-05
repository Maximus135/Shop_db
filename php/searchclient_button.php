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

        include ("db.php");
        $namearray=Array();
        $surnamearray=Array();
        $phonearray=Array();
        $glassarray=Array();
        $count_of_rows_array=Array();
        $count_of_length_rows_array=Array();
        $max_count_of_length_rows_array=Array();
        $counter=0;
        // поиск клиента(ов)
        if($name && $surname && $phone)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT glass FROM Clients WHERE first_name='".$name."' AND last_name='".$surname."' AND phone='".$phone."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $glassarray[]=$row['glass']; // массив рецептов человека с этим именем и фамилией и телефоном
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag1=1;
        }
        if($name && $surname && $phone==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT glass,phone FROM Clients WHERE first_name='".$name."' AND last_name='".$surname."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $glassarray[]=$row['glass']; // массив рецептов человека с этим именем и фамилией
                $phonearray[]=$row['phone']; // массив телефонов человека с этим именем и фамилией
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag2=1;
        }
        if($name && $phone && $surname==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT last_name,glass FROM Clients WHERE first_name='".$name."' AND phone='".$phone."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $glassarray[]=$row['glass']; // массив рецептов человека с этим именем и телефоном
                $surnamearray[]=$row['last_name']; // массив фамилий человека с этим именем и телефоном
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag3=1;
        }
        if($surname && $phone && $name==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT first_name,glass FROM Clients WHERE last_name='".$surname."' AND phone='".$phone."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $namearray[]=$row['first_name']; // массив рецептов человека с этой фамилией и телефоном
                $glassarray[]=$row['glass']; // массив фамилий человека с этой фамилией и телефоном
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag4=1;
        }
        if($name && $surname==null && $phone==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT phone,glass,last_name FROM Clients WHERE first_name='".$name."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $surnamearray[]=$row['last_name']; // массив фамилий человека с этим именем 
                $glassarray[]=$row['glass']; // массив рецептом человека с этим именем
                $phonearray[]=$row['phone']; // массив телефонов человека с этим именем
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag5=1;

        }
        if($surname && $name==null && $phone==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT phone,glass,first_name FROM Clients WHERE last_name='".$surname."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $namearray[]=$row['first_name']; // массив фамилий человека с этим именем 
                $glassarray[]=$row['glass']; // массив рецептом человека с этим именем
                $phonearray[]=$row['phone']; // массив телефонов человека с этим именем
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag6=1;
        }
        if($phone && $name==null && $surname==null)
        {
            $i=0;
            $result=mysqli_query($db,"SELECT last_name,glass,first_name FROM Clients WHERE phone='".$phone."'");
            while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
            {
                $count_of_rows_array[$i]=substr_count($row['glass'], "\n")+1;
                for($j=0;$j<$count_of_rows_array[$i];$j++)
                {
                $row_str_array[$i]=explode(PHP_EOL , $row['glass']);
                $count_of_length_rows_array[$j]=iconv_strlen($row_str_array[$i][$j]);
                if($j==0)
                {
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($max_count_of_length_rows_array[$i]<$count_of_length_rows_array[$j])
                {
                   
                    $max_count_of_length_rows_array[$i]=$count_of_length_rows_array[$j];
                }
                if($j!=$count_of_rows_array[$i]-1)
                {
                $count_of_length_rows_array[$j]=$count_of_length_rows_array[$j]-1;
                }
                }
                $surnamearray[]=$row['last_name']; // массив фамилий человека с этим именем 
                $glassarray[]=$row['glass']; // массив рецептом человека с этим именем
                $namearray[]=$row['first_name']; // массив телефонов человека с этим именем
                $counter=$counter+1;
                $i=$i+1;
            }
            $flag7=1;
        }
        if($counter==0)
        {
            header('Location: searchclient2.php');
        }
        
        if($flag1==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['size_of_recipt']=$size_of_recipt;
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$name;
            $_SESSION['surname']=$surname;
            $_SESSION['phone']=$phone;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=1;
        }

        if($flag2==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$name;
            $_SESSION['surname']=$surname;
            $_SESSION['phone']=$phonearray;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=2;
        }
        if($flag3==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$name;
            $_SESSION['surname']=$surnamearray;
            $_SESSION['phone']=$phone;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=3;
        }
        if($flag4==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$namearray;
            $_SESSION['surname']=$surname;
            $_SESSION['phone']=$phone;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=4;
        }
        if($flag5==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$name;
            $_SESSION['surname']=$surnamearray;
            $_SESSION['phone']=$phonearray;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=5;
        }
        if($flag6==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$namearray;
            $_SESSION['surname']=$surname;
            $_SESSION['phone']=$phonearray;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=6;
        }
        if($flag7==1)
        {
        for($i=0;$i<$counter;$i++)
        {
            $_SESSION['counter']=$counter;
            $_SESSION['name']=$namearray;
            $_SESSION['surname']=$surnamearray;
            $_SESSION['phone']=$phone;
            $_SESSION['glass']=$glassarray;
            $_SESSION['count_of_rows_array']=$count_of_rows_array;
            $_SESSION['count_of_length_rows_array']=$max_count_of_length_rows_array;
            header('Location: clientslist.php');
        }
        $_SESSION['flag']=7;
        }
               
    }
    else
    {
        header('Location: ../index.html');
    }
?>