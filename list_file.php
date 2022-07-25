$output = shell_exec("ls ".$target_dir);
echo str_replace("\n","<br>",$output);
