<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input name="upload[]" type="file" multiple />
  <input type="submit" value="Send files" />
</form>

<br>
<a href="send_ffmpeg.php">process file</a>
<br>
<a href="move_to_output.php">move output file</a>
<br>
<a href="file_manage.php">download / manage</a>
<br>
<a href="download_external.php">download_external.php?url=</a>
</body>
</html>
