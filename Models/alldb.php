<?php 
    require_once('database.php');

    function logCheck($user,$password){

        $sql="select * from user_info where user='$user' and pass='$password'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        $row=mysqli_num_rows($res);
        if($row==1)
        {
            $_SESSION['user']=$user;
            return true;
        }
        else
        {
            $sql2="select * from `administration` where `Admin_Name`='$user' and `Admin_Password`='$password'";
            $con2=conn();
            $res2= mysqli_query($con2,$sql2);
            $row2=mysqli_num_rows($res2);
            if($row2==1)
            {
                $_SESSION['admin']="admin";
                return true;
            }
            else{
                return false;
            }
        }
    }

    function registration($user, $mail, $pass, $imgContent) {
        $sql1 = "INSERT INTO `user_info`(`user`, `pass`, `Email`, `img`) VALUES ('{$user}','{$pass}','{$mail}','{$imgContent}')";
        $sql2 = "INSERT INTO `user_info`(`user`, `pass`, `Email`) VALUES ('{$user}','{$pass}','{$mail}')";
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
    function add_cart($user,$cart_name, $cart_price, $cart_id){
        $sql="INSERT INTO `cart_items`(`user_name`, `item`, `price`,`id`) VALUES ('$user','$cart_name','$cart_price','$cart_id')";
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
    function add_buy($user,$buy_name, $buy_price, $buy_id){
        $sql="INSERT INTO `buy_items`(`name`, `item`, `price`,`id`) VALUES ('$user','$buy_name','$buy_price','$buy_id')";
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
        $sql="UPDATE `user_info` SET `Email`='$email' WHERE `user` ='$user'";
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
    function remove_cart($remove_id){
        $sql="DELETE FROM `cart_items` WHERE id='$remove_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function remove_buy($remove_id){
        $sql="DELETE FROM `buy_items` WHERE id='$remove_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_products(){
        $sql="select * from  `shop_items` where `type` = 'bose'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_apple(){
        $sql="select * from  `shop_items` where `type` = 'apple'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function shop_cart($user){
        $sql="select * from  `shopping_cart` where `user` = '$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_shop_cart_info($shop_card_id){
        $sql="select * from  `shop_items` where `id` = '$shop_card_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function add_shop_cart($user,$cart_name, $cart_price, $shop_card_id, $cart_type){
        $sql="INSERT INTO `shopping_cart`(`user`, `name`, `id`, `type`, `price`) VALUES ('$user','$cart_name','$shop_card_id','$cart_type','$cart_price')";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function shop_remove_cart($remove_id){
        $sql="DELETE FROM `shopping_cart` WHERE id='$remove_id'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function add_shop_buy($user,$buy_name, $buy_price, $buy_id, $buy_type){
        $sql="INSERT INTO `shop_buy`(`user`, `name`, `price`, `type`, `id`) VALUES ('$user','$buy_name','$buy_price','$buy_type','$buy_id')";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_shop_buy_info($user){
        $sql="select * from  `shop_buy` where `user` = '$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function DeleteAcc($user){
        $sql="DELETE FROM `user_info` WHERE user='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_cartier(){
        $sql="select * from  `shop_items` where `type` = 'cartier'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_prada(){
        $sql="select * from  `shop_items` where `type` = 'prada'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_sony(){
        $sql="select * from  `shop_items` where `type` = 'sony'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function get_tag(){
        $sql="select * from  `shop_items` where `type` = 'tag'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function remove_all_cart($user){
        $sql="DELETE FROM `cart_items` WHERE user_name='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    function remove_all_cart_shopping($user){
        $sql="DELETE FROM `shopping_cart` WHERE user='$user'";
        $con=conn();
        $res= mysqli_query($con,$sql);
        return $res;
    }
    
    
?>
