<?php
  if (move_uploaded_file($_FILES['file']['tmp_name'], "./external.list")) {
      echo "fail";
  }else{
      echo "success";
      exec("chmod +x bash/*");
      exec("bash/download_external.sh");      
  }
?>
