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

    function registration($user, $mail, $pass, $imgContent) {
        $sql1 = "INSERT INTO `user_info`(`user`, `pass`, `E-mail`, `img`) VALUES ('{$user}','{$pass}','{$mail}','{$imgContent}')";
        $sql2 = "INSERT INTO `user_info`(`user`, `pass`, `E-mail`) VALUES ('{$user}','{$pass}','{$mail}')";
        $con = conn();
        try{
            if(!empty($imgContent)){
                mysqli_query($con, $sql1);
            }
            else{
                mysqli_query($con, $sql2);
            }
            return true;
        }
        catch(mysqli_sql_exception){
            return false;
        }
        
    }
        

    function get_fast_foods(){
        $sql="select * from rest_foods where type='fastfood'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_lunch(){
        $sql="select * from rest_foods where type='lunch'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_coffee(){
        $sql="select * from rest_foods where type='coffee'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_interCousine(){
        $sql="select * from rest_foods where type='interCousi'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_user_info($user){
        $sql="select * from user_info where user='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
?>
