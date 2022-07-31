<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input name="upload[]" type="file" multiple />
  <input type="submit" value="Send files" />
</form>

<a href="send_ffmpeg.php">list file</a>
</body>
</html>
