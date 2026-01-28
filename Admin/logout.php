<?php
session_start();
session_unset();
session_destroy();

header('location:../Pelajar/login3.php');

?>