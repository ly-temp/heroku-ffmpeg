<?php
$target_dir = "./uploads";
$out_dir = "./output";

$output = shell_exec("ls ".$target_dir);
echo str_replace("\n","<br>",$output);
exec("mkdir -p ".$out_dir);
echo shell_exec("ls");
?>
