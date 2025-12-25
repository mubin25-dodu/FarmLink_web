<?php
session_start();
session_destroy();
header("Location: ../views/buyers/home.php");

?>