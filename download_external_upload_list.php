<?php
  if (move_uploaded_file($_FILES['file']['tmp_name'], "./external.list")) {
      echo "success";
      exec("chmod +x bash/*");
      exec("bash/download_external.sh");    
  }else{
      echo "fail";
  }
?>
<br>
<a href="/file_manage.php">file</a>
<a href="/">back</a>
