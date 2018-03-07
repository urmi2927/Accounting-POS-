<?php
/**
 * Created by PhpStorm.
 * User: Urmi Shammi
 * Date: 12/15/2017
 * Time: 6:49 AM
 */

session_start();
session_destroy();
header('Location:loginfrom.php');
?>