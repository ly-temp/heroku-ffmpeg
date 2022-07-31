<?php
exec("chmod +x bash/*.sh");
 //prefix u: upload folder
 //       o: output folder
call_ffmpeg("u");
call_ffmpeg("o");

function call_ffmpeg($prefix){
 $folder = $prefix == "u" ? "uploads/" : "output/";
 $file = $prefix == "u" ? "uploads.list" : "output.list";
 $file_list = explode("\n", shell_exec("cat ".$file));
 array_pop($file_list);
 chdir($folder);
   //for($i = 0; !empty($_POST[$prefix.$i]); $i++){
   $i = 0;
   while(!empty($_POST[$prefix.$i])){
     echo $i.":".$file_list[$i]."->".$_POST[$prefix.'c'.$i].'<br>';
     switch($_POST[$prefix.$i]){
       //case 1://no action
         //break;
       case 2://nokia
         $suffix = has_video($file_list[$i]) ? ".3gp" : ".mp3";
         //$out_file = shell_exec("../bash/nokia_LY.sh ".$suffix.' "'.$file_list[$i].'" | tail -1');
         exec("../bash/nokia_LY.sh ".$suffix.' "'.$file_list[$i].'" 2>&1 &');
         break;
       case 3://audio to db
         $out_file = shell_exec("../bash/to_db_LY.sh ".$suffix.' "'.$file_list[$i].'" | tail -1');

         break;
       case 4://change format
         break;
       case -1:
         break;
     }
     $i++;
   }
  chdir("../");
}

  function has_video($file){
    return !empty(shell_exec("ffprobe -v error -select_streams v:0 -show_entries stream=codec_type -of csv=p=0 ".$file));
  }
?>
