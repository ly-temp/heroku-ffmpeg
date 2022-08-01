<?php
  $output=shell_exec("cat complete.list");
  exec("echo > complete.list");
  $file = explode("\n", $output);
  array_pop($file);
  foreach($file as $f){
    exec('mv uploads/'.$f.' output/ > /dev/null 2>/dev/null &');
    echo $f."<br>";
  }
?>
