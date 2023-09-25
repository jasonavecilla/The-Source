<?php

session_start();

$nKey = $_POST['key'];

unset($_SESSION['mycart'][$nKey]);