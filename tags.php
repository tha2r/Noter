<?php
$usedtemplates="index,page";
include "global.php";

$t = htmlspecialchars($_GET['t']);
$TP->ass('title',"Tags $t - noter.ml");

$query=$DB->query("select * from notes where text like '%#".$t."%'");


$TP->print_page();
?>