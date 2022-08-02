<?php
  $output_file = shell_exec("ls output/");
  $output_file = explode("\n", $output_file);
  array_pop($output_file);
  $folder="/output/";
  foreach($output_file as $file){
    $file_path = $folder.$file;
    echo '<a href="'.$file_path.'" target="_blank" download>'.$file.'</a>'
    echo "&#160;";
    echo '<a href="'.$file_path.'" target="_blank" download>preview</a>'
    echo '<br>';
  }
?>
