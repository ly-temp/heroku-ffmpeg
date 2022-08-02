<head>
meta http-equiv="refresh" content="0; url=/" />
</head>
<a href="/">manual redirect</a>

<?php
  $output_list = "external.list";
  exec("chmod +x bash/*");
  exec('wget -O '.$output_list.' "'.$_GET['url'].'"');
  chdir("uploads/");
  exec('../bash/get_external.sh '.$output_list);
?>
