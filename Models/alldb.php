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
    
    function getArrivals(){
        $sql="select * from arrivals";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_cart_info($cart_id){
        $sql="select * from rest_foods where id='$cart_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_buy_info($buy_id){
        $sql="select * from rest_foods where id='$buy_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function add_cart($user,$cart_name, $cart_price){
        $sql="INSERT INTO `cart_items`(`user_name`, `item`, `price`) VALUES ('$user','$cart_name','$cart_price')";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_cart($user){
        $sql="SELECT * FROM `cart_items` WHERE user_name='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function add_buy($user,$buy_name, $buy_price){
        $sql="INSERT INTO `buy_items`(`name`, `item`, `price`) VALUES ('$user','$buy_name','$buy_price')";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_buy($user){
        $sql="SELECT * FROM `buy_items` WHERE name='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updateUser($user, $old_user){
        $sql="UPDATE `user_info` SET `user`='$user' WHERE `user` ='$old_user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updateCart($user, $old_user){
        $sql="UPDATE `cart_items` SET `user_name`='$user' WHERE `user_name` ='$old_user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updateBuy($user, $old_user){
        $sql="UPDATE `buy_items` SET `name`='$user' WHERE `name` ='$old_user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updatePass($password, $user){
        $sql="UPDATE `user_info` SET `pass`='$password' WHERE `user` ='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updateEmail($email, $user){
        $sql="UPDATE `user_info` SET `E-mail`='$email' WHERE `user` ='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function updateImg($imgContent, $user){
        $sql="UPDATE `user_info` SET `img`='{$imgContent}' WHERE `user` ='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
?>