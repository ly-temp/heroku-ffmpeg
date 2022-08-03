<?php
$target_dir = "./uploads";
$out_dir = "./output";
$options = '<option value="1">no action</option>
    <option value="2">nokia</option>
    <option value="3">audio to db</option>
    <option value="4">change format</option>
    <option value="-1">command</option>';
$sep = "~~~~~~~~~";
echo $sep."uploads".$sep."<br>";

?>
<select id="uploads_all" onchange="sync_all_select('u','uploads_all')">
all uploads:
<?php
    echo $options;
?>
<input type="text" id="uploads_all_c" onchange="sync_all_input('u','uploads_all_c')">
</select><br>
<?php
echo '<form action="/ffmpeg.php"  method="post">';
$output = shell_exec("ls ".$target_dir." | tee uploads.list");
handle_ls("u", $output);

exec("mkdir -p ".$out_dir);
echo $sep."output".$sep."<br>";
$output = shell_exec("ls ".$out_dir." | tee output.list");
handle_ls("o", $output);
echo  'timeout:<input type="text" name="timeout" value="60">';
echo '<button type="submit">submit</button></form>';

//input is pure string
function handle_ls($prefix, $output){
    $explode = explode("\n", $output);
    array_pop($explode);
    print_options($prefix, $explode);
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
for($i = 0; $i < count($output); $i++){
    echo $output[$i].'<select name="'.$prefix.$i.'" id="'.$prefix.$i.'">
    '.$GLOBALS['options'].'
    <input type="text" name="'.$prefix.'c'.$i.'">
    </select><br>';
  }

}
?>
<script>
	function sync_all_select(prefix, source_id){
		var index = document.getElementById(source_id).selectedIndex;
		var i = 0;
		var ele;
		while(ele = document.getElementById(prefix+i)){
		    ele.selectedIndex = index;
		    i++;
		};
	}
	function changeSelected(id, index){
		var element = document.getElementById(id);
		element.selectedIndex = index;
	}
	function sync_all_input(prefix, source_id){
		var value = document.getElementById(source_id).value;
		alert(value);
		var i = 0;
		var ele;
		while(ele = document.getElementById(prefix+'c'+i)){
		    ele.value = value;
		    i++;
		};	
	}
	function changeInputBox(id, value){
		var element = document.getElementById(id);
		element.value = value;	
	}	
</script>
