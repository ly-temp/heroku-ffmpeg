<head>
<meta http-equiv="refresh" content="0; url=/" />
</head>
<a href="/">manual redirect</a>

<?php
  $target_dir = "uploads/";
  $output_list = "external.list";

  $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=")+1);

  exec("chmod +x bash/*");
  exec('wget -O '.$output_list.' "'.$url.'"');
  exec("bash/download_external.sh >/dev/null 2>/dev/null &");

?>
