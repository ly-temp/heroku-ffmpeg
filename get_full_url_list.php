<?php
  if(isset($_GET['type'])){
    $full_url = 'https://'.$_SERVER['SERVER_NAME'].'/'.$_GET['type'].'/';
    $list_file = $_GET['type'].'.list';
    exec('sed -i "s|^|'.$full_url.'|g" '.$list_file);
    echo '<head><meta http-equiv="refresh" content="0; url=/'.$list_file.'" /></head>';
    echo '<a href="/'.$list_file.'">manual redirect</a>';
  }else{
    echo "invalid dir as 'type'";
  }

?>
