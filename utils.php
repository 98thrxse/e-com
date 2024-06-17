<?php
function truncateEndOfString($string, $maxLength, $fullLength) {
    return substr($string, 0, $maxLength) . ($maxLength < $fullLength ? "..." : "");
}
?>
