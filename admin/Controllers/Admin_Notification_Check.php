<?php
require_once('../Models/Admin_Db_Functions.php');
$status=Notification_Check();
if($status)
{
    $_SESSION['Nf_Check1']="Yes";
    return $_SESSION['Nf_Check1'];
}
else
{
    $_SESSION['Nf_Check2']="Yes";
    return $_SESSION['Nf_Check2'];
}

?>



