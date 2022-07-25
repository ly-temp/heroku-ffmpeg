<?php
$target_dir = "./uploads/";
exec("mkdir -p ".$target_dir);

// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $target_dir . $_FILES['upload']['name'][$i];

    //Upload the file into the temp dir
    move_uploaded_file($tmpFilePath, $newFilePath);
  }
}
echo shell_exec("ls ".$target_dir);

?>
