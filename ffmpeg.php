<?php
 
  for($i = 0; !empty($_POST[$i]); $i++){
    echo $i."->".$_POST['c'.$i].'<br>';
    switch($_POST[$i]){
      //case 1://no action
        //break;
      case 2://nokia
        break;
      case 3://audio to db
        break;
      case 4://change format
        break;
      case -1:
        break;
    }
  }

  function has_video($file){
    return shell_exec("ffprobe -v error -select_streams v:0 -show_entries stream=codec_type -of csv=p=0 ".$file) === "";
  }
?>
