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
   for($i = 0; !empty($_POST[$prefix.$i]); $i++){
     echo $i.":".$file_list[$i]."->".$_POST[$prefix.'c'.$i].'<br>';
     switch($_POST[$prefix.$i]){
       //case 1://no action
         //break;
       case 2://nokia
         $suffix = has_video($file_list[$i]) ? ".3gp" : ".mp3";
         $out_file = shell_exec("../bash/nokia_LY.sh ".$suffix.' "'.$file_list[$i].'" | tail -1');
         $out_file = str_replace("\n", "", $out_file);
         exec('mv "'.$out_file.'" ../output/');
         break;
       case 3://audio to db

         break;
       case 4://change format
         break;
       case -1:
         break;
     }
   }
}

  function has_video($file){
    return shell_exec("ffprobe -v error -select_streams v:0 -show_entries stream=codec_type -of csv=p=0 ".$file) === "";
  }
?>
