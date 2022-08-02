<?php
  echo '~~~output~~~';
  echo_folder("output/");
  echo '~~~uploads~~~';
  echo_folder("uploads/");

  function echo_folder($folder){
    $output_file = shell_exec("ls ".$folder);
    $output_file = explode("\n", $output_file);
    array_pop($output_file);
    foreach($output_file as $file){
      $file_path = '/'.$folder.$file;
      echo '<a href="'.$file_path.'" target="_blank" download>'.$file.'</a>';
      echo '&#160;';
      echo '<a href="'.$file_path.'" target="_blank">preview</a>';
      echo '<br>';
    }
  }
?>
<br>
<a href="/">back</a>
