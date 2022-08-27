<?php
  $target_dir = "uploads/";
  $output_list = "external.list";

  exec("mkdir -p ".$target_dir);
  exec("chmod +x bash/*");
  chdir($target_dir);
  exec('wget -i ../'.$output_list.' >/dev/null 2>/dev/null &');
?>
