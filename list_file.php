<?php
$target_dir = "./uploads";
$out_dir = "./output";
$sep = "~~~~~~~~~";
echo $sep."uploads".$sep."<br>";
$output = shell_exec("ls ".$target_dir." | tee uploads.list");
handle_ls("u", $output);

exec("mkdir -p ".$out_dir);
echo $sep."output".$sep."<br>";
$output = shell_exec("ls ".$out_dir." | tee output.list");
handle_ls("o", $output);


//input is pure string
function handle_ls($output){
    $explode = explode("\n", $output);
    array_pop($explode);
    print_options($explode);
}

function print_options($prefix, $output){
//prefix: u: upload folder
//        o: output folder
/**mode
//1: no action
//2: nokia
//3: audio to db
//4: change format
//
//-1: user define command
*/

//post parameter:
//$i->option
//c$i->command/value
echo '<form action="/ffmpeg.php"  method="post">';
for($i = 0; $i < count($output); $i++){
    echo $output[$i].'<select name="'.$prefix.$i.'">
    <option value="1">no action</option>
    <option value="2">nokia</option>
    <option value="3">audio to db</option>
    <option value="4">change format</option>
    <option value="-1">command</option>
    <input type="text" name="c'.$i.'">
    </select><br>';
  }
  echo '<button type="submit">submit</button></form>';

}
?>
