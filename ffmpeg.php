<head>
<meta http-equiv="refresh" content="0; url=/" />
</head>
<a href="/">home</a>

<?php
ob_start();
exec("chmod +x bash/*.sh");
 //prefix u: upload folder
 //       o: output folder
call_ffmpeg("u");
call_ffmpeg("o");
ob_flush();
flush();
sleep($_POST["timeout"]);
 
function call_ffmpeg($prefix){
 $folder = $prefix == "u" ? "uploads/" : "output/";
 $file = $prefix == "u" ? "uploads.list" : "output.list";
 $file_list = explode("\n", shell_exec("cat ".$file));
 array_pop($file_list);
 chdir($folder);
   //for($i = 0; !empty($_POST[$prefix.$i]); $i++){
   $i = 0;
   while(!empty($_POST[$prefix.$i])){
     //echo $i.":".$file_list[$i]."->".$_POST[$prefix.'c'.$i].'<br>';
     switch($_POST[$prefix.$i]){
       //case 1://no action
         //break;
       case 2://nokia
         //$suffix = has_video($file_list[$i]) ? ".3gp" : ".mp3";
         //$out_file = shell_exec("../bash/nokia_LY.sh ".$suffix.' "'.$file_list[$i].'" | tail -1');
         exec('../bash/nokia_LY.sh "'.$file_list[$i].'" "'.$suffix.'" > /dev/null 2>/dev/null &');
         break;
       case 3://audio to db
         exec('../bash/to_db_LY.sh "'.$file_list[$i].'" "'.$_POST[$prefix.'c'.$i].'" > /dev/null 2>/dev/null &');
         break;
       case 4://change format
         exec('../bash/change_format.sh "'.$file_list[$i].'" "'.$_POST[$prefix.'c'.$i].'" > /dev/null 2>/dev/null &');       
         break;
       case -1://user definied command
         break;
     }
     $i++;
   }
  chdir("../");
}

  function has_video($file){
    return shell_exec("ffprobe -v error -select_streams v:0 -show_entries stream=codec_type -of csv=p=0 ".$file." | wc -w") == 1;
  }
?>
