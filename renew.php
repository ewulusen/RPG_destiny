<?php
include_once("Scripts/db.php");
$GLOBALS['conn']->query("TRUNCATE karakterl");
$GLOBALS['conn']->query("TRUNCATE itemek");
$GLOBALS['conn']->query("TRUNCATE play_ab");
$GLOBALS['conn']->query("TRUNCATE enemy");
$GLOBALS['conn']->query("TRUNCATE chest");
$GLOBALS['conn']->query("TRUNCATE trap");
$GLOBALS['conn']->query("TRUNCATE game");
header("location:index.php");
?>