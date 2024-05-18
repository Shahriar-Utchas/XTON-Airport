<?php 
require_once('../Models/alldb.php');
session_start();
$get_products=get_products();
$get_apple = get_apple();
$get_cartier = get_cartier();
$get_prada = get_prada();
$get_sony = get_sony();
$get_tag = get_tag();
$shop_cart = shop_cart($_SESSION['user']);
if (isset($_GET['cart'])) {
    $shop_card_id = $_GET['cart'];
    $get_shop_cart_info = get_shop_cart_info($shop_card_id);
    while ($row = mysqli_fetch_assoc($get_shop_cart_info)) {
        $cart_name = $row['name'];
        $cart_price = $row['price'];
        $cart_type = $row['type'];
    }
    $add_cart = add_shop_cart($_SESSION['user'],$cart_name, $cart_price, $shop_card_id, $cart_type);
    if ($add_cart) {
        $_SESSION['shop_cart_status'] ="Added to cart"; 
        header('location:../Views/shoppingPage.php');
    }
    else{
        $_SESSION['shop_cart_status2'] ="Failed to add to cart"; 
        header('location:../Views/shoppingPage.php');
    }
}
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    $remove = shop_remove_cart($remove_id);
    if ($remove) {
        $_SESSION['shop_remove_status'] ="Removed from cart"; 
        header('location:../Views/shoppingPage.php');
    }
    else{
        $_SESSION['shop_remove_status2'] ="Failed to remove from cart"; 
        header('location:../Views/shoppingPage.php');
    }
  }
  if(isset($_GET['buy'])){
    $buy_id = $_GET['buy'];
    $buy = get_shop_cart_info($buy_id);
    while ($row = mysqli_fetch_assoc($buy)) {
        $buy_name = $row['name'];
        $buy_price = $row['price'];
        $buy_type = $row['type'];

    }
    $add_buy = add_shop_buy($_SESSION['user'],$buy_name, $buy_price, $buy_id, $buy_type);
    if ($add_buy) {
        $_SESSION['shop_buy_status'] ="Added to buy"; 
        header('location:../Views/shoppingPage.php');
    }
    else{
        $_SESSION['shop_buy_status2'] ="Failed to add to buy"; 
        header('location:../Views/shoppingPage.php');
    }
  }
  if(isset($_GET['rmv_all'])){
    $remove_all = remove_all_cart_shopping($_SESSION['user']);
    if ($remove_all) {
        $_SESSION['remove_all_status_shopping'] ="Removed all from cart"; 
       header('location:../Views/shoppingPage.php');
    }
    else{
        $_SESSION['remove_all_status_shopping2'] ="Failed to remove all from cart"; 
       header('location:../Views/shoppingPage.php');
    }
  }
  
?>