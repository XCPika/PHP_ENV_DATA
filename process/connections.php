<?php
$sName = '127.0.0.1';
$sUser = 'root';
$sPass = '';

function connect(string $dbName) {
    global $sName, $sUser, $sPass;
    $conn = mysqli_connect($sName, $sUser, $sPass, $dbName);
    if (!$conn) {
        die("[Error Connection failed]: " . mysqli_connect_error());
    } else {

        return $conn;

    }
}

?>