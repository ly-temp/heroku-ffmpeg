<?php
  for($i = 0; !empty($_POST[$i]); $i++){
    echo $i."->".$_POST['c'.$i].'<br>';
  }
?>
