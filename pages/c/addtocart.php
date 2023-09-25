<?php

session_start();

$sPN = $_POST['productname'];
$nAQ = $_POST['quantity'];
$nSQ = 1;
$nPP = $_POST['price'];
$img = $_POST['photo'];
$nId = $_POST['id'];
$sPC = $_POST['code'];

$aProduct = array(
    'product' => $sPN,
    'qtyavailable' => $nAQ,
    'qtybuying' => $nSQ,
    'price' => $nPP,
    'image' => $img,
    'id' => $nId,
    'code' => $sPC
  );
  
array_push($_SESSION['mycart'], $aProduct);

// print_r($_SESSION['mycart']);