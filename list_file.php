<?php
$target_dir = "./uploads";
$out_dir = "./output";
$sep = "~~~~~~~~~";
echo $sep."uploads".$sep."<br>";
$output = shell_exec("ls ".$target_dir);
$output = explode("\n", $output);
echo '<form action="/ffmpeg.php"  method="post">';
for($i = 0; $i < count($output); $i++){
  echo '<input type="radio" name=".$i." value="radio">Fit Description<br>';
}
echo "</form>"
exec("mkdir -p ".$out_dir);
echo $sep."output".$sep."<br>";
$output = shell_exec("ls ".$out_dir);
echo str_replace("\n","<br>",$output);
?>
