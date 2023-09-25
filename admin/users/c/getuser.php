<?php

include ("../../../includes/db-connect.php");

$nId = $_POST['nid'];

$qSearch = "SELECT * FROM `u955154186_db_llanes`.`tbl_users` WHERE `id` = '".$nId."'";
$eSearch = mysqli_query($dbConn, $qSearch);

$rows = mysqli_fetch_assoc($eSearch);

echo json_encode($rows);