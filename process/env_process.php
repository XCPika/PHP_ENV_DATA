<?php
require_once 'stat_functions.php';

if(isset($_POST['screenW']) && isset($_POST['screenH']) &&isset($_POST['envi'])) {
    $res = $_POST['screenW'].'x'.$_POST['screenH'];
    $envi = $_POST['envi'];
    captureEnv($res, $envi);
    echo json_encode(array('success' => 1));
}

?>