<?php
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "fail";
}else{
    echo "success";
}

?>
