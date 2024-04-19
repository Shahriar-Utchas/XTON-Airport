<?php 
    require_once('database.php');

    function logCheck($user,$password){

        $sql="select * from user_info where user='$user' and pass='$password'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        $row=mysqli_num_rows($res);
        if($row==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function  registration($user,$mail,$pass,$Rpass){
        $sql="INSERT INTO `user_info`(`user`, `pass`, `E-mail`) VALUES ('$user','$pass','$mail');";
        $con=conn();
        try{
            mysqli_query($con, $sql);
            return true;
        }
        catch(mysqli_sql_exception){
            return false;
        }
    }
?>