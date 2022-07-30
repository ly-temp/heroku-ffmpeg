<?php
$target_dir = "./uploads";
$out_dir = "./output";
$sep = "~~~~~~~~~";
echo $sep."uploads".$sep."<br>";
$output = shell_exec("ls | tee uploads.list".$target_dir);
handle_ls($output);

exec("mkdir -p ".$out_dir);
echo $sep."output".$sep."<br>";
$output = shell_exec("ls | tee output.list".$out_dir);
handle_ls($output);


//input is pure string
function handle_ls($output){
    print_options(explode("\n", $output));
}

function print_options($output){
/**mode
//0: no action
//1: nokia
//2: audio to db
//3: change format
//
//-1: user define command
*/

//post parameter:
//$i->option
//c$i->command/value
echo '<form action="/ffmpeg.php"  method="post">';
for($i = 0; $i < count($output); $i++){
    echo $output[$i].'<select name="'.$i.'">
    <option value="0">no action</option>
    <option value="1">nokia</option>
    <option value="2">audio to db</option>
    <option value="3">change format</option>
    <option value="-1">command</option>
    <input type="text" name="c'.$i.'">
    </select><br>';
  }
  echo '<input type="submit"></form>';

}
?>
