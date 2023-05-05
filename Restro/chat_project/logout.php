<?php
session_start();
if(isset($_SESSION['admin_id']))
{
    
    session_unset();
    session_destroy();
    header('Location: .../');
}
elseif (isset($_SESSION['customer_id']))
{
    
    session_unset();
    session_destroy();
    header('Location: ../../');
}
?>