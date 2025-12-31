<?php
$data = (isset($_POST['data'])) ? $_POST['data'] : '';
session_start();
$_SESSION['test_data'] = $data;
?>
