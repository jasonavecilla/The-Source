<?php
session_start();


session_destroy();


header("Location: /02-mp/pages");
exit();
?>