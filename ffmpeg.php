<?php
  for($i = 0; isset($_POST[$i]); $i++){
    echo $i."->"$_POST['c'.$i].'<br>';
  }
?>
