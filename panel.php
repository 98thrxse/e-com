<?php
include "utils.php";
include "database.php";
$title = "Панель";
ob_start();
include "components/panel/products.php";
include "components/panel/action.php";
$page = ob_get_clean();
include "base/page.php";
?>
