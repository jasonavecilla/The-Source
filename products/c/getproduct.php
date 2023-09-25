<?php

include ("../../includes/db-connect.php");

$nId = $_POST['nid'];

$qGet = "SELECT * FROM `u955154186_db_llanes`.`tbl_products` WHERE `id` = '".$nId."'";
$eGet = mysqli_query($dbConn, $qGet);

$rows = mysqli_fetch_assoc($eGet);

echo json_encode($rows);