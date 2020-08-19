<?php
$uptime = shell_exec('stress --cpu 2');
echo $uptime;
?>
