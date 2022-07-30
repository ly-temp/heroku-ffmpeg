<?php
$target_dir = "./uploads";
$out_dir = "./output";
$sep = "~~~~~~~~~";
echo $sep."uploads".$sep."<br>";
$output = shell_exec("ls ".$target_dir);
echo str_replace("\n","<br>",$output);
exec("mkdir -p ".$out_dir);
echo $sep."output".$sep."<br>";
?>
