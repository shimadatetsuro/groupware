<?php
require_once '../model/thread.php';

$threadToplist = new Thread();
$resultThreadToplist = $threadToplist->threadToplist();

?>