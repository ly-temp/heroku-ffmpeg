<?php
  $output=shell_exec("cat complete.list");
  if(shell_exec("echo ".$output." | wc -w") != 0){
    exec('> complete.list');
    $file = explode("\n", $output);
    array_pop($file);
    foreach($file as $f){
      if(file_exists('uploads/'.$f)){
        exec('mv "uploads/'.$f.'" output/ > /dev/null 2>/dev/null &');
        echo "uploads: ".$f."<br>";
      }else{
        echo "output: ".$f;
      }
    }
  }
?>
