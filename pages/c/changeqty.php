<?php

session_start();

$nSQ = $_POST['qty'];
$nId = $_POST['id'];


$_SESSION['mycart'][$nId]['qtybuying'] = $nSQ;

print_r($_SESSION['mycart']);