<?php
$cin = strtotime("2015/06/01");
$cout = strtotime("2015/06/16");

$date = abs($cout - $cin);

$days = $date / 86400;
echo $days;
?>