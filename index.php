<?php
include "database.php";
$title = "Магазин";
ob_start();
include "components/index/products.php";
include "components/index/details.php";
include "components/index/buy.php";
$page = ob_get_clean();
include "base/page.php";
?>
